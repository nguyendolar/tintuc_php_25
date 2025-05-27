
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('inc/head.php')?>
</head>

  <body>
    <!-- ##### Header Area Start ##### -->
    <?php include('inc/header.php')?>
    <!-- ##### Popular News Area Start ##### -->
    <?php
$id = $_GET["id"];
$sql = "
        SELECT *
        FROM nguoidung
        WHERE id = '".$id."'
    ";
$query = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($query);
?>
<?php
    if (isset($_GET['msg'])) {
    ?>
<div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
        swal({
            title: 'Bình luận thành công!',
            icon: 'success',
            timer: 3000,
            buttons: true,
            type: 'success'
        })
    </script>
</div>
    <?php } ?>
    <div class="popular-news-area section-padding-80-50">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="section-heading">
              <h6>Các bài viết của <?php echo $row['hoten'] ?></h6>
            </div>
            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-8">
                <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                        <?php 
                        $tintuc = "SELECT a.*, b.ten 
          FROM tintuc a 
          JOIN chude b ON a.chude_id = b.id 
          JOIN nguoidung c ON a.nguoidung_id = c.id 
          WHERE a.nguoidung_id = '$id' and a.trangthai = 1
          ORDER BY a.id DESC";
                        $resultbd = mysqli_query($connect, $tintuc);
                        while ($bd = mysqli_fetch_array($resultbd, MYSQLI_ASSOC)) {
                        ?>
                            <!-- Single Featured Post -->
                            <div class="single-blog-post small-featured-post d-flex">
                                <div class="post-thumb">
                                    <a href="chitiet.php?id=<?php echo $bd['id'] ?>"><img src="../admin/image/<?php echo $bd['anh'] ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="chude.php?id=<?php echo $bd['chude_id'] ?>" class="post-catagory"><?php echo $bd['ten'] ?></a>
                                    <div class="post-meta">
                                        <a href="chitiet.php?id=<?php echo $bd['id'] ?>" class="post-title">
                                            <h6><?php echo $bd['tieude'] ?></h6>
                                        </a>
                                    </div>
                                    <div class="post-meta align-items-center">
                                    <a href="#" class="post-comment"><img style="margin-left : -20px !important;width : 17px" src="https://thumbs.dreamstime.com/b/calendar-icon-line-style-design-simple-vector-perfect-illustration-calendar-icon-line-style-design-simple-symbol-perfect-vector-352068874.jpg" alt=""> <span><?php echo $bd['ngay'] ?></span></a>
                                </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
              </div>
              <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <!-- <div class="latest-posts-widget mb-50">
                           <img style="width : 100px;" src="https://cdn2.iconfinder.com/data/icons/blog-7/80/user_avatar_profile_login_button_account_member-512.png" alt="author" />
                        </div> -->
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ##### Popular News Area End ##### -->

    <!-- ##### Footer Add Area Start ##### -->
    <?php include('inc/footer.php')?>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
  </body>
</html>
