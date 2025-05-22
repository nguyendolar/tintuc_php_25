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
            title: 'Đăng ký thành công!',
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
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="section-heading">
              <h6>Đăng ký</h6>
            </div>

            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-12">
                <div class="contact-form-area">
                  <form action="xuly.php" method="post">
                    <div class="row">
                      <div class="col-12 col-lg-12">
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          name="hoten"
                          placeholder="Họ tên"
                          required
                        />
                      </div>
                      <div class="col-12 col-lg-12">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email"
                          required
                        />
                      </div>
                      <div class="col-12">
                        <input
                          type="text"
                          class="form-control"
                          id="subject"
                          name="taikhoan"
                          placeholder="Tài khoản"
                          required
                        />
                      </div>
                      <div class="col-12">
                        <input
                          type="password"
                          class="form-control"
                          id="subject"
                          name="matkhau"
                          placeholder="Mật khẩu"
                          required
                        />
                      </div>
                      <div class="col-12 text-center">
                        <button
                          class="btn newspaper-btn mt-30 w-100"
                          type="submit"
                          name="dangky"
                        >
                          Đăng ký
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="section-heading">
              <h6>Đăng nhập</h6>
            </div>

            <div class="row">
              <!-- Single Post -->
              <div class="col-12 col-lg-12">
                <div class="contact-form-area">
                  <form action="xuly.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <input
                              type="text"
                              class="form-control"
                              id="subject"
                              name="taikhoan"
                              placeholder="Tài khoản"
                              required
                            />
                          </div>
                          <div class="col-12">
                            <input
                              type="password"
                              class="form-control"
                              id="subject"
                              name="matkhau"
                              placeholder="Mật khẩu"
                              required
                            />
                          </div>
                      <div class="col-12 text-center">
                        <button
                          class="btn newspaper-btn mt-30 w-100"
                          type="submit"
                          name="dangnhap"

                        >
                          Đăng nhập
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
