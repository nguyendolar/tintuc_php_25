<?php 
include('../admin/inc/connect.php');
?>
<header class="header-area">
<!-- Top Header Area -->
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                    </div>

                    <!-- Login Search Area -->
                    <div class="login-search-area d-flex align-items-center">
                        <!-- Login -->
                        <?php if (empty($_SESSION['taikhoan'])) { ?>
                        <div class="login d-flex">
                            <a href="dangnhap.php">Đăng nhập</a>
                            <a href="dangnhap.php">Đăng ký</a>
                        </div>
                        <?php }else{?>
                            <div class="login">
    <ul class="d-flex" style="list-style: none; gap: 15px; padding: 0; margin: 0;">
        <li><a href="#">Xin chào, <?php echo $_SESSION['hoten']; ?></a></li>
        <li><a href="dangbai.php">Đăng bài viết</a></li>
        <li><a href="danhsachbaiviet.php">Danh sách bài đăng</a></li>
        <li><a href="dangxuat.php">Đăng xuất</a></li>
    </ul>
</div>
                        <?php } ?>
                        <!-- Search Form -->
                        <div class="search-form">
                            <form action="timkiem.php" method="post">
                                <input type="search" name="keyword" class="form-control" placeholder="Nhập từ khóa muốn tìm kiếm">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar Area -->
<div class="newspaper-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="newspaperNav">

                <!-- Logo -->
                <div class="logo">
                    <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                </div>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li ><a href="index.php">Trang chủ</a></li>
                            <?php
                            $chude = mysqli_query($connect, "SELECT * FROM chude");
                            while ($chudes = mysqli_fetch_array($chude, MYSQLI_ASSOC)) {
                            ?>
                            <li ><a href="chude.php?id=<?php echo $chudes['id'] ?>"><?php echo $chudes['ten'] ?></a></li>
                            <?php } ?>    
                            <li ><a href="gopy.php">Góp ý</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
</header>