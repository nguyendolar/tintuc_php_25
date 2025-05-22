<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('inc/head.php')?>
  <style>
.custom-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.4);
}

.custom-modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 10px;
    width: 90%;
    max-width: 400px;
    text-align: center;
}

.modal-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.modal-buttons button {
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-delete {
    padding: 6px 12px;
    background-color: crimson;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>

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
            title: 'Xóa thành công!',
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
            title: 'Xóa thành công!',
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
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered">
              <thead>
                <tr style="background-color : #6D6D6D; color: #fff;">
                  <th>STT</th>
                  <th>Tiêu đề</th>
                  <th>Chủ đề</th>
                  <th>Ngày đăng</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $userid = $_SESSION['id'];
                $query = "SELECT a.*, b.ten 
          FROM tintuc a 
          JOIN chude b ON a.chude_id = b.id 
          JOIN nguoidung c ON a.nguoidung_id = c.id 
          WHERE a.nguoidung_id = '$userid' 
          ORDER BY a.id DESC";
                $result = mysqli_query($connect, $query);
                $stt = 1;
                while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $idModelDel = "exampleModalDel".$arUser["id"];
                    $idModelDes = "exampleModalDes".$arUser["id"];
                    $idModelEdit = "exampleModalEdit".$arUser["id"];
                ?>
                <tr>
                  <td><?= $stt++ ?></td>
                  <td>
                    <a href="chitiet.php?id=<?= $arUser['id'] ?>" class="text-decoration-none text-primary" target="_blank">
    <?= htmlspecialchars($arUser['tieude']) ?>
</a>

                  </td>
                  <!-- <td><img style="width: 200px; height: 130px;" src="../admin/image/<?= $arUser['anh'] ?>"></td> -->
                  <td><?= $arUser["ten"] ?></td>
                  <td><?= date("d-m-Y", strtotime($arUser["ngay"])) ?></td>
                  <td>
                      <?php if ($arUser["trangthai"] == 0): ?>
                          <span class="badge bg-warning text-dark">Chờ phê duyệt</span>
                      <?php else: ?>
                          <span class="badge bg-success">Được phê duyệt</span>
                      <?php endif; ?>
                  </td>

                  <td>
                    <a class="btn btn-sm btn-primary" href="chinhsuabaiviet.php?id=<?= $arUser['id'] ?>">Sửa</a>
<!-- Nút Xoá -->
<?php if ($arUser['trangthai'] == 0): ?>
    <button class="btn-delete" onclick="openModal('modalXoa<?= $arUser['id'] ?>')">Xoá</button>

    <!-- Modal -->
    <div class="custom-modal" id="modalXoa<?= $arUser['id'] ?>">
        <div class="custom-modal-content">
            <h4>Bạn chắc chắn muốn xoá?</h4>
            <form action="xuly.php" method="post">
                <input type="hidden" name="id" value="<?= $arUser['id'] ?>">
                <div class="modal-buttons">
                    <button type="button" onclick="closeModal('modalXoa<?= $arUser['id'] ?>')">Huỷ</button>
                    <button type="submit" name="deletett" style="background-color:red;color:white;">Xoá</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>


                    
                  </td>
      

                </tr>
                <?php } ?>
              </tbody>
            </table>
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
    <script>
function openModal(id) {
    document.getElementById(id).style.display = 'block';
}

function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}
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
