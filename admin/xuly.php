<?php
include('inc/connect.php');
//Đăng nhập
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau  = $_POST['matkhau'];
    $query = "SELECT * FROM nguoidung WHERE taikhoan='$taikhoan' AND vaitro = 1";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      header("Location: dangnhap.php?fail=1");
    } 
    else{
    
      $row = mysqli_fetch_array($result);
      if ($matkhau != $row['matkhau']) {
        header("Location: dangnhap.php?fail=1");
      }
      else{
        header("Location: index.php?msg=1");
      $_SESSION['taikhoanadmin'] = $taikhoan;
      $_SESSION['hoten'] = $row['hoten'];
      $_SESSION['id'] = $row['id'];
      }
    }
    }
    $adminid = $_SESSION['id'];
//Chủ đề
if(isset($_POST['addcd'])){
    $ten = $_POST['ten'];
    $query = "INSERT INTO chude (ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chude.php?msg=1");
    } 
    else {
        header("Location: chude.php?msg=2");
    }
}
if(isset($_POST['editcd'])){
    $ten = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `chude` 
        SET `ten`='{$ten}'
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        header("Location: chude.php?msg=1");
    } 
    else {
        header("Location: chude.php?msg=2");
    }
}
if(isset($_POST['deletecd'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM tintuc WHERE chude_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: chude.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM chude WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: chude.php?msg=1");
    }
}
//Tin tức
if(isset($_POST['addtt'])){
    $tieude = $_POST['tieude'];
    $noidung  = $_POST['noidung'];
    $chude = $_POST['chude'];
    //Upload ảnh
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    $image = $_FILES['image']['name'];
    $target = "./image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $query = "INSERT INTO tintuc ( chude_id, tieude, anh, noidung, nguoidung_id) 
    VALUES ( '{$chude}', '{$tieude}', '{$image}', '{$noidung}', '{$adminid}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: tintuc.php?msg=1");
    } 
    else {
        header("Location: tintuc.php?msg=2");
    }
}
if(isset($_POST['edittt'])){
    $tieude = $_POST['tieude'];
    $noidung  = $_POST['noidung'];
    $chude = $_POST['chude'];
    $id  = $_POST['id'];
    //Upload ảnh
    $file_name = $_FILES['image']['name'];
    if(empty($file_name)){
        $query = "UPDATE `tintuc` 
        SET `tieude`='{$tieude}',`chude_id`='{$chude}',`noidung`='{$noidung}'
        WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        if ($result) {
          header("Location: tintuc.php?msg=1");
        } 
        else {
            header("Location: tintuc.php?msg=2");
        }
    }
    else{
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$_FILES['image']['name']);
        $file_ext=strtolower(end($file_parts));
        $expensions= array("jpeg","jpg","png");
        $image = $_FILES['image']['name'];
        $target = "./image/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE `tintuc` 
        SET `tieude`='{$tieude}',`chude_id`='{$chude}',`noidung`='{$noidung}',`anh`='{$image}'
        WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        if ($result) {
          header("Location: tintuc.php?msg=1");
        } 
        else {
            header("Location: tintuc.php?msg=2");
        }
    }
    
}
if(isset($_POST['deletett'])){
    $id  = $_POST['id'];
    $queryxoa = "DELETE FROM binhluan WHERE `tintuc_id`='{$id}'";
    $resultxoa = mysqli_query($connect, $queryxoa);
    $query = "DELETE FROM tintuc WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: tintuc.php?msg=1");
}
if(isset($_POST['pheduyettt'])){
    $id  = $_POST['id'];
    $query = "UPDATE `tintuc` 
        SET trangthai = 1
        WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: tintuc.php?msg=1");
}
//Góp ý
if(isset($_POST['deletegy'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM gopy WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: gopy.php?msg=1");
}
//Người dùng
if(isset($_POST['deletend'])){
    $id  = $_POST['id'];
    $queryxoa = "DELETE FROM binhluan WHERE `nguoidung_id`='{$id}'";
    $resultxoa = mysqli_query($connect, $queryxoa);
    $query = "DELETE FROM nguoidung WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: nguoidung.php?msg=1");
}
//Bình luận
if(isset($_POST['deletebl'])){
    $id  = $_POST['id'];
    $query = "DELETE FROM binhluan WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: binhluan.php?msg=1");
}
?>
 