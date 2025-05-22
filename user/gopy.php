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
            title: 'Gửi góp ý thành công!',
            icon: 'success',
            timer: 3000,
            buttons: true,
            type: 'success'
        })
    </script>
</div>
    <?php } ?>
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="section-heading">
              <h6>Góp ý</h6>
            </div>

            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-12">
                <div class="contact-form-area">
                  <form action="xuly.php" method="post">
                    <div class="row">
                    <?php if (empty($_SESSION['taikhoan'])) { ?>
                      <div class="col-12 col-lg-6">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="hoten"
                          required
                          placeholder="Họ tên"
                        />
                      </div>
                      <div class="col-12 col-lg-6">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          required
                          placeholder="E-mail"
                        />
                      </div>
                      <?php }else{?>
                        <div class="col-12 col-lg-6">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="hoten"
                          required
                          value="<?php echo $_SESSION['hoten'] ?>"
                          placeholder="Họ tên"
                        />
                      </div>
                      <div class="col-12 col-lg-6">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          required
                          value="<?php echo $_SESSION['email'] ?>"
                          placeholder="E-mail"
                        />
                      </div>
                      <?php } ?>
                      <div class="col-12">
                        <input
                          type="text"
                          class="form-control"
                          id="subject"
                          name="tieude"
                          required
                          placeholder="Tiêu đề"
                        />
                      </div>
                      <div class="col-12">
                        <textarea
                          name="noidung"
                          class="form-control"
                          id="message"
                          cols="30"
                          rows="10"
                          required
                          placeholder="Nội dung góp ý"
                        ></textarea>
                      </div>
                      <div class="col-12 text-center">
                        <button
                          class="btn newspaper-btn mt-30 w-100"
                          type="submit"
                          name="gopy"
                        >
                          Gửi góp ý
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
