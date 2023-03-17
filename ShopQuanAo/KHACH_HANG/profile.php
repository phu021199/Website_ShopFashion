<?php
$title = 'THÔNG TIN CÁ NHÂN';
include_once('index.php');
$makh = $_SESSION["makh"];
$sql_dh = "select * from KhachHang where MSKH='$makh'";
$ds_dh = $connect->query($sql_dh);
while ($row = $ds_dh->fetch_assoc()) {
  $pw = $row['PASSWORD'];
?>

<body>
  <div class="container main-ht">
    <div class="row mb-lg-4">
      <div class="col pview-product-content my-3 d-none d-lg-block">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">Thông tin cá nhân</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="border:0;"><b>|</b></a>
          </li>
          <li class="nav-item">
            <a class=nav-link data-bs-toggle="tab" href="#home1">Đổi mật khẩu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="border:0;"><b>|</b></a>
          </li>
          <li class="nav-item">
            <a class=nav-link data-bs-toggle="tab" href="#home2">Tra cứu đơn hàng</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="home" class="container tab-pane active mb-5"><br>
            <form action="" method="post">
              <span>Tên Đăng Nhập:</span>
              <input type="text" class="form-control mt-3" disabled value='<?php echo $row["USERNAMEKH"] ?>'>
              <hr class="solid">
              <span>Họ Tên:</span>
              <input type="text" class="form-control mt-3" name="hoten" value='<?php echo $row["HoTenKH"] ?>'>
              <hr class="solid">
              <span>Số Điện Thoại:</span>
              <input type="text" class="form-control mt-3" name="sdt" value='<?php echo $row["SoDienThoai"] ?>'>
              <hr class="solid">
              <span>Địa Chỉ:</span>
              <input type="text" class="form-control mt-3" name="dc" value='<?php echo $row["TenCongTy"] ?>'>
              <hr class="solid">
              <center><button class="btn btn-primary" type="submit" name="updateprofile" value="Cập nhật">Cập
                  Nhật</button></center>
            </form>
          </div>
          <div id="home1" class="container tab-pane fade"><br>
            <form action="" method="post">
              <span>Mật Khẩu Cũ:</span>
              <input type="password" class="form-control mt-3" id="password" name="mkc" placeholder=''
                onblur="CheckPass()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass"></span>
              </div>
              <hr class="solid">
              <span>Mật Khẩu Mới:</span>
              <input type="password" class="form-control mt-3" id="password1" name="mkm" placeholder=''
                onblur="CheckPass1()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass1"></span>
              </div>
              <hr class="solid">
              <span>Nhập Lại Mật Khẩu Mới:</span>
              <input type="password" class="form-control mt-3" id="password2" name="nlmk" placeholder=''
                onblur="CheckPass2()">
              <div class="col-lg-12">
                <span class="text-danger" id="mess_pass2"></span>
              </div>
              <hr class="solid">
              <center><button class="btn btn-primary" type="submit" value="Cập nhật" name="updatepw">Cập Nhật</button>
              </center>
            </form>
          </div>
          <div id="home2" class="container tab-pane fade"><br>
            <div class="container">
              <!-- HERO SECTION-->
              <div class="text-center mt-2 ">
                <h3>Lịch sử đặt hàng</h3>
              </div>
              <!-- Đơn hàng chờ xác nhận -->
              <section class="py-5">
                <h2 class="h5 text-uppercase mb-4">Đơn hàng chờ xác nhận</h2>
                <div class="row">
                  <div class="col-lg-12 col-md-12 mb-4 mb-lg-0 mt-2">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                      <table class=" table">
                        <thead class="bg-light">
                          <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng
                                tiền</strong></th>
                          </tr>
                        </thead>
                        <tbody class="list-cart">
                          <?php
  $makh = $_SESSION["makh"];
  $sql_dh = "select DatHang.MSDH, DatHang.NgayDH, ct.TongTien from DatHang inner join KhachHang on DatHang.MSKH= KhachHang.MSKH
                                                    inner join (select MSDH, sum(Soluong *GiaDatHang) as tongtien from chitietdathang
                                                                group by MSDH) ct 
                                                    on ct.MSDH= DatHang.MSDH
                                                  where KhachHang.MSKH='$makh' AND DatHang.TrangThaiDH='1';";
  $ds_dh = $connect->query($sql_dh);
  while ($row = $ds_dh->fetch_assoc()) {

                          ?>
                          <tr class="row-cart">
                            <th class="pl-0 border-0" scope="row">
                              <div class="media align-items-center">
                                <div class="media-body ml-3">
                                  <strong class="h6">
                                    <a class="reset-anchor animsition-link"
                                      href="?option=chitietpurchase&MSDH=<?php echo $row["MSDH"] ?>">
                                      <?php echo $row["MSDH"] ?>
                                    </a>
                                  </strong>
                                </div>
                              </div>
                            </th>
                            <td class="align-middle border-0">
                              <p class="price-cart mb-0 small ">
                                <?php echo $row["NgayDH"] ?>
                              </p>
                            </td>
                            <td class="align-middle border-0">
                              <div class="d-flex align-items-center justify-content-between px-3">
                                <p class="total-item-cart mb-0 small ">
                                  <?php echo $row["TongTien"] ?>
                                </p>
                              </div>
                            </td>
                          </tr>
                          <?php
  }

                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <!-- Đang giao -->
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3 mt-2">
                  <div class="row align-items-center text-center">
                    <div class="col-md-12 col-sm-12 col-12 mb-3 mb-md-0 text-md-left">
                      <a class="btn btn-link p-0 text-dark btn-sm" href="?option=shop"><i
                          class="fas fa-long-arrow-alt-left mr-2"> </i>Trở lại Cửa Hàng</a>
                    </div>
                  </div>
              </section>
              <section class="py-5">
                <h2 class="h5 text-uppercase mb-4">Đang giao</h2>
                <div class="row">
                  <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                      <table class=" table">
                        <thead class="bg-light">
                          <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng
                                tiền</strong></th>
                          </tr>
                        </thead>
                        <tbody class="list-cart">
                          <?php
  $makh = $_SESSION["makh"];
  $sql_dh = "select DatHang.MSDH, DatHang.NgayDH, DatHang.NgayGH, ct.TongTien from DatHang inner join KhachHang on DatHang.MSKH= KhachHang.MSKH
                                                    inner join (select MSDH, sum(Soluong *GiaDatHang) as tongtien from chitietdathang
                                                                group by MSDH) ct 
                                                    on ct.MSDH= DatHang.MSDH
                                                  where KhachHang.MSKH='$makh' AND DatHang.TrangThaiDH='2'; ";
  $ds_dh = $connect->query($sql_dh);
  while ($row = $ds_dh->fetch_assoc()) {

                          ?>
                          <tr class="row-cart">
                            <th class="pl-0 border-0" scope="row">
                              <div class="media align-items-center">
                                <div class="media-body ml-3">
                                  <strong class="h6">
                                    <a class="reset-anchor animsition-link"
                                      href="?option=chitietpurchase&MSDH=<?php echo $row["MSDH"] ?>">
                                      <?php echo $row["MSDH"] ?>
                                    </a>
                                  </strong>
                                </div>
                              </div>
                            </th>
                            <td class="align-middle border-0">
                              <p class="price-cart mb-0 small ">
                                <?php echo $row["NgayDH"] ?>
                              </p>
                            </td>
                            <td class="align-middle border-0">
                              <div class="d-flex align-items-center justify-content-between px-3">
                                <p class="total-item-cart mb-0 small ">
                                  <?php echo $row["TongTien"] ?>
                                </p>
                              </div>
                            </td>
                          </tr>
                          <?php
  }

                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Đơn hàng đã hủy -->
                  <!-- CART NAV-->
                  <div class="bg-light px-4 py-3 mt-2">
                    <div class="row align-items-center text-center">
                    </div>
              </section>
              <section class="py-5">
                <h2 class="h5 text-uppercase mb-4">Đơn hàng đã hủy</h2>
                <div class="row">
                  <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                      <table class=" table">
                        <thead class="bg-light">
                          <tr>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày hủy
                                hàng</strong></th>
                            <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng
                                tiền</strong></th>
                          </tr>
                        </thead>
                        <tbody class="list-cart">
                          <?php
  $makh = $_SESSION["makh"];
  $sql_dh = "select DatHang.MSDH, DatHang.NgayDH, DatHang.NgayGH, ct.TongTien from DatHang inner join KhachHang on DatHang.MSKH= KhachHang.MSKH
                                                    inner join (select MSDH, sum(Soluong *GiaDatHang) as tongtien from chitietdathang
                                                                group by MSDH) ct 
                                                    on ct.MSDH= DatHang.MSDH
                                                  where KhachHang.MSKH='$makh' AND DatHang.TrangThaiDH='3'; ";
  $ds_dh = $connect->query($sql_dh);
  while ($row = $ds_dh->fetch_assoc()) {

                          ?>
                          <tr class="row-cart">
                            <th class="pl-0 border-0" scope="row">
                              <div class="media align-items-center">
                                <div class="media-body ml-3">
                                  <strong class="h6">
                                    <a class="reset-anchor animsition-link"
                                      href="?option=chitietpurchase&MSDH=<?php echo $row["MSDH"] ?>">
                                      <?php echo $row["MSDH"] ?>
                                    </a>
                                  </strong>
                                </div>
                              </div>
                            </th>
                            <td class="align-middle border-0">
                              <p class="price-cart mb-0 small ">
                                <?php echo $row["NgayDH"] ?>
                              </p>
                            </td>
                            <td class="align-middle border-0">
                              <p class="price-cart mb-0 small ">
                                <?php echo $row["NgayGH"] ?>
                              </p>
                            </td>
                            <td class="align-middle border-0">
                              <div class="d-flex align-items-center justify-content-between px-3">
                                <p class="total-item-cart mb-0 small ">
                                  <?php echo $row["TongTien"] ?>
                                </p>
                              </div>
                            </td>
                          </tr>
                          <?php
  }

                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Đơn hàng đã giao-->
                  <section class="py-5">
                    <h2 class="h5 text-uppercase mb-4">Đơn hàng đã giao</h2>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
                        <!-- CART TABLE-->
                        <div class="table-responsive mb-4">
                          <table class=" table">
                            <thead class="bg-light">
                              <tr>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn
                                    hàng</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt
                                    hàng</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày giao
                                    hàng</strong></th>
                                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng
                                    tiền</strong></th>
                              </tr>
                            </thead>
                            <tbody class="list-cart">
                              <?php
  $makh = $_SESSION["makh"];
  $sql_dh = "select DatHang.MSDH, DatHang.NgayDH, DatHang.NgayGH, ct.TongTien from DatHang inner join KhachHang on DatHang.MSKH= KhachHang.MSKH
                                                    inner join (select MSDH, sum(Soluong *GiaDatHang) as tongtien from chitietdathang
                                                                group by MSDH) ct 
                                                    on ct.MSDH= DatHang.MSDH
                                                  where KhachHang.MSKH='$makh' AND DatHang.TrangThaiDH='4'; ";
  $ds_dh = $connect->query($sql_dh);
  while ($row = $ds_dh->fetch_assoc()) {

                              ?>
                              <tr class="row-cart">
                                <th class="pl-0 border-0" scope="row">
                                  <div class="media align-items-center">
                                    <div class="media-body ml-3">
                                      <strong class="h6">
                                        <a class="reset-anchor animsition-link"
                                          href="?option=chitietpurchase&MSDH=<?php echo $row["MSDH"] ?>">
                                          <?php echo $row["MSDH"] ?>
                                        </a>
                                      </strong>
                                    </div>
                                  </div>
                                </th>
                                <td class="align-middle border-0">
                                  <p class="price-cart mb-0 small ">
                                    <?php echo $row["NgayDH"] ?>
                                  </p>
                                </td>
                                <td class="align-middle border-0">
                                  <p class="price-cart mb-0 small ">
                                    <?php echo $row["NgayGH"] ?>
                                  </p>
                                </td>
                                <td class="align-middle border-0">
                                  <div class="d-flex align-items-center justify-content-between px-3">
                                    <p class="total-item-cart mb-0 small ">
                                      <?php echo $row["TongTien"] ?>
                                    </p>
                                  </div>
                                </td>
                              </tr>
                              <?php
  }

                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>
                  </section>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div></div></div></div></div>
</body>
<?php

}
if (isset($_POST["updateprofile"])) {
  $HoTenKH = $_POST['hoten'];
  $sdt = trim($_POST['sdt']);
  $TenCongTy = trim($_POST['dc']);
  $sql_update = "update KhachHang set HoTenKH='$HoTenKH', SoDienThoai='$sdt', TenCongTy='$TenCongTy' where MSKH='$makh'";
  if ($connect->query($sql_update)) {
    echo '<script>alert("Cập nhật thông tin thành công!!! ");window.location="?option=profile";</script>';
  } else
    echo '<script>alert("Cập nhật thất bại!!! ");</script>';
}
if (isset($_POST["updatepw"])) {
  $PASSWORD = md5($_POST['mkc']);
  $PASSWORDnew = md5($_POST['mkm']);
  $NLPASSWORD = md5($_POST['nlmk']);
  $tam = strlen($_POST['mkm']);
  if ($PASSWORD != $pw) {
    echo '<script>alert("Sai mật khẩu!!! ");</script>';
  } elseif ($PASSWORD == null || $PASSWORD == "" || $PASSWORDnew == NULL || $PASSWORDnew == "" || $NLPASSWORD == NULL || $NLPASSWORD == "") {
    echo '<script>alert("Vui lòng nhập đủ thông tin ");</script>';
  } elseif ($tam < 8 || $tam > 16) {
    echo '<script>alert("Password không được ít hơn 8 ký tự và bé hơn 16 ký tự!!! ");window.location="?option=profile";</script>';
  } elseif ($NLPASSWORD != $PASSWORDnew) {
    echo '<script>alert("Bạn phải nhập Mật khẩu giống nhau!!! ");window.location="?option=profile";</script>';
  } else {
    $query_update = "update KhachHang set PASSWORD='$PASSWORDnew' where MSKH='$makh'";
    $connect->query($query_update);
    echo '<script>alert("Cập nhật mật khẩu thành công!!!");window.location="?option=profile";</script>';
  }
}
?>
<script>
  function CheckPass() {
    var x = document.getElementById("password");
    if (!x.value) {
      mess_pass.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 7) {
        mess_pass.textContent = "Mật khẩu có độ dài từ 8 - 16 ký tự";
      } else {
        mess_pass.textContent = "";
      }
    }
  };

  function CheckPass1() {
    var x = document.getElementById("password1");
    if (!x.value) {
      mess_pass1.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 7) {
        mess_pass1.textContent = "Mật khẩu có độ dài từ 8 - 16 ký tự";
      } else {
        mess_pass1.textContent = "";
      }
    }
  };

  function CheckPass2() {
    var x = document.getElementById("password2");
    if (!x.value) {
      mess_pass2.textContent = "Vui lòng nhập mật khẩu";
    } else {
      if (x.value.length > 16 || x.value.length < 7) {
        mess_pass2.textContent = "Mật khẩu có độ dài từ 8 - 16 ký tự";
      } else {
        mess_pass2.textContent = "";
      }
    }
  };
</script>
<?php include_once('footer.php'); ?>