
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
        SELECT a.*, b.ten 
        FROM tintuc as a, chude as b
        WHERE a.chude_id = b.id
        AND a.id = '".$id."'
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
              <h6>Chi tiết tin tức</h6>
            </div>
            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-8">
                <div class="blog-posts-area">
                  <!-- Single Featured Post -->
                  <div class="single-blog-post featured-post single-post">
                    <div class="post-thumb">
                      <a href="#"><img style="width: 100%;height: 400px;" src="../admin/image/<?php echo $row['anh'] ?>" alt="" /></a>
                    </div>
                    <div class="post-data">
                      <a href="#" class="post-catagory"><?php echo $row['ten'] ?></a>
                      <a href="#" class="post-title">
                        <h6>
                        <?php echo $row['tieude'] ?>
                        </h6>
                      </a>
                      <div class="post-meta">
                        <p class="post-author">
                          Đăng lúc  <a><?php echo $row['ngay'] ?></a>
                        </p>
                        <p>
                        <?php echo $row['noidung'] ?>
                        </p>
                        <div
                          class="newspaper-post-like d-flex align-items-center justify-content-between"
                        >
                          <!-- Tags -->

                          <!-- Post Like & Post Comment -->
                          <div
                            class="d-flex align-items-center post-like--comments"
                          >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div
                    class="pager d-flex align-items-center justify-content-between"
                  >
                   
                  </div>

                  <!-- Comment Area Start -->
                  <div class="comment_area clearfix">
                    <h5 class="title">Danh sách bình luận</h5>

                    <ol>
                    <?php 
                        $binhluan = "SELECT a.* , b.hoten
                        FROM binhluan as a, nguoidung as b
                        WHERE a.nguoidung_id = b.id AND a.tintuc_id = '".$id."'
                        ORDER BY a.id DESC";
                        $rsbl = mysqli_query($connect, $binhluan);
                        while ($bluan = mysqli_fetch_array($rsbl, MYSQLI_ASSOC)) {
                        ?>
                      <!-- Single Comment Area -->
                      <li class="single_comment_area">
                        <!-- Comment Content -->
                        <div class="comment-content d-flex">
                          <!-- Comment Author -->
                          <div class="comment-author">
                            <img src="https://cdn2.iconfinder.com/data/icons/blog-7/80/user_avatar_profile_login_button_account_member-512.png" alt="author" />
                          </div>
                          <!-- Comment Meta -->
                          <div class="comment-meta">
                            <a href="#" class="post-author"
                              ><?php echo $bluan['hoten'] ?></a
                            >
                            <a href="#" class="post-date"><?php echo $bluan['ngay'] ?></a>
                            <p>
                            <?php echo $bluan['noidung'] ?>
                            </p>
                          </div>
                        </div>
                      </li>
                      <?php } ?>
                    </ol>
                  </div>
                  <?php if (isset($_SESSION['taikhoan'])) { ?>
                  <div class="post-a-comment-area section-padding-80-0">
                    <h4>Bình luận của bạn</h4>
                    <!-- Reply Form -->
                    <div class="contact-form-area">
                      <form action="xuly.php" method="post">
                      <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="idnguoidung">
                      <input type="hidden" value="<?php echo $_GET["id"];?>" name="idbaidang">
                        <div class="row">
                          <div class="col-12">
                            <textarea
                              name="noidung"
                              class="form-control"
                              id="message"
                              cols="30"
                              rows="10"
                              placeholder="Nhập bình luận tại đây"
                              required
                            ></textarea>
                          </div>
                          <div class="col-12 text-center">
                            <button
                              class="btn newspaper-btn mt-30 w-100"
                              type="submit"
                              name="binhluan"
                            >
                              Bình luận
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Latest Posts Widget -->
                        <div class="latest-posts-widget mb-50">
                        <?php 
                        $tintuc = "SELECT a.*, b.ten 
                        FROM tintuc as a, chude as b
                        WHERE a.chude_id = b.id
                        AND a.id != '".$id."' ORDER BY a.id DESC ";
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
                                </div>
                            </div>
                        <?php } ?>
                        </div>
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
