<?php
$title = 'LỊCH SỬ ĐẶT HÀNG';
include_once('index.php')
  ?>

<div class="container">
  <!-- HERO SECTION-->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 px-0 mt-2">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="?option=home">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lịch sử đặt hàng</li>
    </ol>
  </nav>
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
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng tiền</strong></th>
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
          <a class="btn btn-link p-0 text-dark btn-sm" href="?option=shop"><i class="fas fa-long-arrow-alt-left mr-2">
            </i>Trở lại Cửa Hàng</a>
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
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng tiền</strong></th>
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
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày hủy hàng</strong></th>
                <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng tiền</strong></th>
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
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Mã đơn hàng</strong>
                    </th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày đặt hàng</strong>
                    </th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Ngày giao hàng</strong>
                    </th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Tổng tiền</strong></th>
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
    </div></div></div></div></div>
    <?php include_once('footer.php'); ?>