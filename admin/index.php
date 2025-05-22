<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('inc/head.php') ?>
</head>
<?php
if (isset($_GET['msg'])) {
?>
  <div class="toast" data-delay="2000" style="position:fixed;top: 100PX; right: 10PX;z-index: 2000;width: 300px">
    <script>
      swal({
        title: 'Đăng nhập thành công!',
        icon: 'success',
        timer: 3000,
        buttons: true,
        type: 'success'
      })
    </script>
  </div>
<?php } ?>

<body class="sb-nav-fixed">
  <?php include('inc/header.php') ?>
  <div id="layoutSidenav">
    <?php include('inc/menu.php') ?>
    <div id="layoutSidenav_content">
      <main>
        <?php
        $sumbd = mysqli_query($connect, "SELECT COUNT(id) as 'tongso' 
        FROM tintuc 
        ");
        $artinhnk = mysqli_fetch_array($sumbd);
        $sumkh = mysqli_query($connect, "SELECT COUNT(id) as 'tongso' 
        FROM nguoidung 
        ");
        $artinhkh = mysqli_fetch_array($sumkh);
        $sumsp = mysqli_query($connect, "SELECT COUNT(id) as 'tongso' 
        FROM gopy 
        ");
        $artinhsp = mysqli_fetch_array($sumsp);
        $sumcd = mysqli_query($connect, "SELECT COUNT(id) as 'tongso' 
        FROM chude 
        ");
        $artinhcd = mysqli_fetch_array($sumcd);
        ?>
        <div class="container-fluid px-4">
          <div class="row mt-4">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                <div class="card-body">Tổng số tin tức : <strong> <?php echo $artinhnk['tongso'] ?></strong> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="tintuc.php">Xem chi tiết</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                <div class="card-body">Số lượng người dùng : <strong> <?php echo $artinhkh['tongso'] ?></strong> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="nguoidung.php">Xem chi tiết</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">Tổng số góp ý: <strong> <?php echo $artinhsp['tongso'] ?></strong></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="gopy.php">Xem chi tiết</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                <div class="card-body">Tổng số chủ đề : <strong> <?php echo number_format($artinhcd['tongso']) ?></strong> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="chude.php">Xem chi tiết</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-md-6">
              <img src="./image/index.jpg" alt="" style="width :100%">
            </div>
          </div>
        </div>

    </div>
    </main>
    <?php include('inc/footer.php') ?>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>