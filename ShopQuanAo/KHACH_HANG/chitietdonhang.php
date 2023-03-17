<?php
$query = "select c.MSHH,b.SoLuong,b.GiaDatHang,c.TenHH,c.image from dathang a 
	join chitietdathang b on a.MSDH=b.MSDH join hanghoa c on b.MSHH=c.MSHH where a.MSDH=" . $_GET['MSDH'];
$dathang = $connect->query($query);
$tong = 0;
?>
<section class="body">
<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 px-0 mt-2">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="?option=home">Home</a></li>
      <li class="breadcrumb-item" aria-current="page"><a class="text-decoration-none" href="?option=purchase">Tra Cứu Đơn Hàng</a></li>
      <li class="breadcrumb-item active" aria-current="page">Mã Đơn Hàng: <?= $_GET['MSDH']?></li>
    </ol>
  </nav>
    <form method="post">
        <table class="table mt-5 table-hover align-middle text-center">
            <thead>
                <tr class="table-tr table-success">
                    <th>MSHH</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Ảnh Thông Tin Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dathang as $item): ?>
                <tr>
                    <td width="7%"><b>
                            <?= $item['MSHH'] ?>
                        </b></td>
                    <td width="15%"><b>
                            <?= $item['TenHH'] ?>
                        </b></td>
                    <td width="30%"><img src="../KHACH_HANG/Image/<?= $item['image'] ?>" width="25%"></td>
                    <td width="12%"><b>
                            <?= number_format($item['GiaDatHang'], 0, ',', '.') ?> vnđ
                        </b></td>
                    <td width="10%"><b>
                            <?= $item['SoLuong'] ?>
                        </b></td>
                </tr>
                <?php $tong += $item['GiaDatHang'] * $item['SoLuong']; ?>
                <?php endforeach; ?>
                <tr class="mt-5">
                    <td></td>
                    <td>
                        <h4>Tổng Tiền:</h4>
                    </td>
                    <td></td>
                    <td>
                        <h4>
                            <?= number_format($tong, 0, ',', '.') ?>vnđ
                        </h4>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="text-center mt-5 mb-5"><a class="btn btn-primary" href="?option=purchase">Trở Lại</a></div>
    </form>
</div>
                </section>
<?php include_once("footer.php")?>