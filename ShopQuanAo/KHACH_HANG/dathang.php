<?php
if (isset($_SESSION['khachhang'])) {
	$query = "select*from khachhang where USERNAMEKH='" . $_SESSION['khachhang'] . "'";
	$khachhang = mysqli_fetch_array($connect->query($query));
} else {
	$khachhang['HoTenKH'] = '';
	$khachhang['TenCongTy'] = '';
	$khachhang['SoDienThoai'] = '';
}

if (isset($_POST['HoTenKH'])) {
	$HoTenKH = $_POST['HoTenKH'];
	$TenCongTy = $_POST['TenCongTy'];
	$SoDienThoai = $_POST['SoDienThoai'];
	$Ghichu = $_POST['Ghichu'];
	$MaThanhToan = $_POST['MaThanhToan'];
	$MSKH = $khachhang['MSKH'];
	$query = "insert dathang(MaThanhToan, HoTenKH, MSKH, TenCongTy, SoDienThoai, Ghichu)
			values($MaThanhToan,'$HoTenKH','$MSKH','$TenCongTy','$SoDienThoai','$Ghichu')";
	if ($connect->query($query))
		$MSDH = $connect->insert_id;
	$query = "select MaThanhToan from dathang order by MaThanhToan limit 1";
	foreach ($_SESSION['giohang'] as $key => $value) {
		$MSHH = $key;
		//$Value: Số lượng
		$query = "select Gia from hanghoa where MSHH=$key";
		$GiaDatHang = mysqli_fetch_array($connect->query($query));
		$GiaDatHang = $GiaDatHang['Gia'];
		$query = "insert chitietdathang(MSHH, MSDH, SoLuong, GiaDatHang) values($MSHH,'$MSDH',$value,'$GiaDatHang')";
		$connect->query($query);
		unset($_SESSION['giohang']);
		echo "<script type='text/javascript'>alert('Đặt Hàng Thành Công! Chúng Tôi Sẽ Liên Hệ Bạn Sớm Nhất!!');  location.href = '?option=shop'; </script>";

	}
}
?>
<div class="container">
	<form method="post">
		<h1 class="text-center">Thông tin giao hàng</h1>
		<div class="form-floating mb-3 mt-5">
			<input type="text" class="form-control" id="HoTenKH" placeholder="Enter HoTenKH" name="HoTenKH"
				value="<?= $khachhang['HoTenKH'] ?>">
			<label for="HoTenKH">Họ Tên:</label>
		</div>
		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="TenCongTy" placeholder="Enter TenCongTy" name="TenCongTy"
				value="<?= $khachhang['TenCongTy'] ?>">
			<label for="TenCongTy">Địa Chỉ:</label>
		</div>
		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="SoDienThoai" placeholder="Enter SoDienThoai" name="SoDienThoai"
				value="<?= $khachhang['SoDienThoai'] ?>">
			<label for="SoDienThoai">Số Điện Thoại:</label>
		</div>
		<div class="form-floating mb-3 mt-3">
			<input type="text" class="form-control" id="Ghichu" placeholder="Enter Ghichu" name="Ghichu">
			<label for="Ghichu">Ghi Chú:</label>
		</div>
		<h5 for="sel1" class="form-label mt-5">Phương Thức Giao Hàng:</h5>
		<?php
        $query = "select*from thanhtoan where Status";
        $result = $connect->query($query);
        ?>
			<select class="form-select" id="sel1" name="MaThanhToan">
				<?php foreach ($result as $item): ?>
				<option value="<?= $item['id'] ?>">
					<?= $item['TenHinhThucTT'] ?>
				</option>
				<?php endforeach; ?>
			</select>
			<div class="text-center mb-5"><input class="btn btn-primary" type="submit" value="Thanh Toán" style="margin-top: 20px"></div>
	</form>
</div>
<?php include_once('footer.php'); ?>