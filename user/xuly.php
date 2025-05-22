<?php
include('../admin/inc/connect.php');
//Đăng nhập
if(isset($_POST['dangnhap'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau  = $_POST['matkhau'];
    $query = "SELECT * FROM nguoidung WHERE taikhoan='$taikhoan' AND vaitro = 2";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      header("Location: dangnhap.php?faillg=1");
    } 
    else {
    
      $row = mysqli_fetch_array($result);
      if ($matkhau != $row['matkhau']) {
        header("Location: dangnhap.php?faillg=1");
      }
      else{
        header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $taikhoan;
      $_SESSION['hoten'] = $row['hoten'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['vaitro'] = $row['vaitro'];
      }
    }
    }
//Đăng ký
if(isset($_POST['dangky'])){
      $hoten = $_POST['hoten'];
      $email  = $_POST['email'];
      $taikhoan = $_POST['taikhoan'];
      $matkhau  = $_POST['matkhau'];
      $check = "SELECT * FROM nguoidung WHERE taikhoan='$taikhoan'";
      $excute = mysqli_query($connect, $check);
      $row = mysqli_num_rows($excute);
      $checks = "SELECT * FROM nguoidung WHERE email='$email'";
      $excutes = mysqli_query($connect, $checks);
      $rows = mysqli_num_rows($excutes);
      if($row > 0 || $rows > 0)
      {
          header("Location: dangnhap.php?fail=2");
      }else{
      $query = "INSERT INTO nguoidung ( `hoten`, `email`, `taikhoan`, `matkhau`, `vaitro`) 
    VALUES ( '{$hoten}', '{$email}', '{$taikhoan}', '{$matkhau}', 2) ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: dangnhap.php?msg=1");
    } 
    else {
        header("Location: dangnhap.php?fail=2");
    }
  }
}
//Góp ý
if(isset($_POST['gopy'])){
  $hoten = $_POST['hoten'];
  $email  = $_POST['email'];
  $tieude = $_POST['tieude'];
  $noidung  = $_POST['noidung'];
  $query = "INSERT INTO gopy ( `hoten`, `email`, `tieude`, `noidung`) 
VALUES ( '{$hoten}', '{$email}', '{$tieude}', '{$noidung}') ";
$result = mysqli_query($connect, $query);
if ($result) {
  header("Location: gopy.php?msg=1");
} 
else {
    header("Location: gopy.php?msg=2");
}
}
//Bình luận
if(isset($_POST['binhluan'])){
  $noidung = $_POST['noidung'];
  $nguoidung = $_POST['idnguoidung'];
  $baidang  = $_POST['idbaidang'];
  $query = "INSERT INTO binhluan ( `nguoidung_id`, `tintuc_id`, `noidung`) 
VALUES ( '{$nguoidung}', '{$baidang}', '{$noidung}') ";
$result = mysqli_query($connect, $query);
if ($result) {
  header("Location: chitiet.php?id=$baidang&&msg=1");
} 
else {
    header("Location: chitiet.php?id=$baidang&&msg=2");
}
}
if(isset($_POST['dangbai'])){
    $tieude = $_POST['tieude'];
    $noidung  = $_POST['noidung'];
    $chude = $_POST['chude'];
    $userid = $_SESSION['id'];
    //Upload ảnh
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts =explode('.',$_FILES['image']['name']);
    $file_ext=strtolower(end($file_parts));
    $expensions= array("jpeg","jpg","png");
    $image = $_FILES['image']['name'];
    $target = "../admin/image/".basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
    $query = "INSERT INTO tintuc ( chude_id, tieude, anh, noidung, nguoidung_id,trangthai) 
    VALUES ( '{$chude}', '{$tieude}', '{$image}', '{$noidung}', '{$userid}',0) ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: dangbai.php?msg=1");
    } 
        header("Location: dangbai.php?msg=2");
  }
if(isset($_POST['deletett'])){
    $id  = $_POST['id'];
    $queryxoa = "DELETE FROM binhluan WHERE `tintuc_id`='{$id}'";
    $resultxoa = mysqli_query($connect, $queryxoa);
    $query = "DELETE FROM tintuc WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    header("Location: danhsachbaiviet.php?msg=1");
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
          SET `tieude` = '{$tieude}', 
              `chude_id` = '{$chude}', 
              `noidung` = '{$noidung}', 
              `trangthai` = 0
          WHERE `id` = '{$id}'";
        $result = mysqli_query($connect, $query);
        if ($result) {
          header("Location: chinhsuabaiviet.php?id=$id&msg=1");
        } 
        else {
            header("Location: chinhsuabaiviet.php?id=$id&msg=2");
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
        $target = "../admin/image/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $query = "UPDATE `tintuc` 
        SET `tieude`='{$tieude}',`chude_id`='{$chude}',`noidung`='{$noidung}',`anh`='{$image}',`trangthai` = 0
        WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        if ($result) {
          header("Location: chinhsuabaiviet.php?id=$id&msg=1");
        } 
        else {
            header("Location: chinhsuabaiviet.php?id=$id&msg=2");
        }
    }
    
}
 ?> 