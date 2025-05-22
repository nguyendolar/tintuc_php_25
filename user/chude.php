<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('inc/head.php')?>
  </head>

  <body>
    <!-- ##### Header Area Start ##### -->
    <?php include('inc/header.php')?>
    <?php if(isset($_GET["id"])){
      $id = $_GET["id"];
      $sqlloai = "
        SELECT * 
        FROM chude
        WHERE id = '".$id."'
    ";
$queryloai = mysqli_query($connect, $sqlloai);
$row = mysqli_fetch_array($queryloai);
    }
?>
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area section-padding-80-50">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="section-heading">
              <h6>Danh sách tin tức của chủ đề : <?php echo $row['ten'] ?></h6>
            </div>
            <div class="row">
                        <?php 
                            $tintuc = "SELECT a.*, b.ten 
                            FROM tintuc as a, chude as b
                            WHERE a.chude_id = b.id
                            AND a.chude_id = '".$id."'
                            ORDER BY a.id DESC";
                            $resultbd = mysqli_query($connect, $tintuc);
                            while ($bd = mysqli_fetch_array($resultbd, MYSQLI_ASSOC)) {
                            ?>
                        <!-- Single Post -->
                        <div class="col-12 col-md-4">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="chitiet.php?id=<?php echo $bd['id'] ?>"><img style="width: 100%;height: 250px;" src="../admin/image/<?php echo $bd['anh'] ?>" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="chude.php?id=<?php echo $bd['chude_id'] ?>" class="post-catagory"><?php echo $bd['ten'] ?></a>
                                    <a href="chitiet.php?id=<?php echo $bd['id'] ?>" class="post-title">
                                        <h6><?php echo $bd['tieude'] ?></h6>
                                    </a>
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-comment"><img style="margin-left : -20px !important" src="img/core-img/chat.png" alt=""> <span><?php echo $bd['ngay'] ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>

            <!-- <nav aria-label="Page navigation example">
              <ul class="pagination mt-50" style="float: right;">
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
              </ul>
            </nav> -->
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
