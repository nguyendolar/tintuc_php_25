<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('inc/head.php')?>
  </head>
  <body>
    <!-- ##### Header Area Start ##### -->
    <?php include('inc/header.php')?>
    <?php
    if (isset($_GET['msg'])) {
    ?>
<div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
        swal({
            title: 'Đăng bài thành công!',
            icon: 'success',
            timer: 3000,
            buttons: true,
            type: 'success'
        })
    </script>
</div>
    <?php } ?>
    <?php
    if (isset($_GET['dx'])) {
    ?>
<div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
        swal({
            title: 'Đăng xuất thành công!',
            icon: 'success',
            timer: 3000,
            buttons: true,
            type: 'success'
        })
    </script>
</div>
    <?php } ?>
    <?php
    if (isset($_GET['faillg'])) {
    ?>
<div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
        swal({
            title: 'Tài khoản hoặc mật khẩu không đúng!',
            icon: 'error',
            timer: 3000,
            buttons: true,
            type: 'error'
        })
    </script>
</div>
    <?php } ?>
    <?php
    if (isset($_GET['fail'])){
    ?>
<div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
        swal({
            title: 'Tài khoản hoặc email đã tồn tại!',
            icon: 'error',
            timer: 3000,
            buttons: true,
            type: 'error'
        })
    </script>
</div>
    <?php } ?>
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
      <div class="container">
      <div class="row justify-content-center">
      <div class="col-12 col-lg-9">
            <div class="section-heading">
              <h6>Đăng bài viết</h6>
            </div>

            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-12">
                <div class="contact-form-area">
                <form action="xuly.php" method="post" enctype="multipart/form-data">
  <div class="row">
    <!-- Chủ đề -->
    <div class="col-12 col-lg-12">
      <select class="form-control" name="chude" required>
        <option value="">-- Chọn chủ đề --</option>
        <?php
                                                                     $lsp = mysqli_query($connect, "SELECT * FROM chude");
                                                                     while ($arLsp = mysqli_fetch_array($lsp, MYSQLI_ASSOC)) {
                                                                    ?>
                                                                    <option value="<?php echo $arLsp['id'] ?>" ><?php echo $arLsp['ten'] ?></option>
                                                                    <?php } ?>
      </select>
    </div>

    <!-- Tiêu đề -->
    <div class="col-12 col-lg-12 mt-3">
      <input
        type="text"
        class="form-control"
        name="tieude"
        placeholder="Tiêu đề bài viết"
        required
      />
    </div>

    <!-- Ảnh -->
    <div class="col-12 col-lg-12 mt-3">
      <input
        type="file"
        class="form-control"
        name="image"
        accept="image/*"
        required
      />
    </div>

    <!-- Nội dung -->
    <div class="col-12 col-lg-12 mt-3">
      <textarea
        class="form-control"
        id="editor"
        name="noidung"
        rows="6"
        placeholder="Nhập nội dung bài viết..."
        required
      ></textarea>
    </div>

    <!-- Nút gửi -->
    <div class="col-12 text-center mt-4">
      <button
        class="btn newspaper-btn w-100"
        type="submit"
        name="dangbai"
      >
        Đăng bài viết
      </button>
    </div>
  </div>
</form>

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
    <script>
    CKEDITOR.replace("editor");
    </script>
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
