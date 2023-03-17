<?php
$MSNV = $_SESSION['MSNV'];
if (isset($_POST['TrangThaiDH'])) {
	$TTDH = $_POST['TrangThaiDH'];
	if ($TTDH != 3 && $TTDH != 4) {
		$connect->query("update dathang set MSNV='$MSNV', TrangThaiDH=" . $_POST['TrangThaiDH'] . " where MSDH=" . $_GET['MSDH']);
		echo '<script>alert("Cập nhật trạng thái đơn hàng thành công!!! ");window.location="?option=order&TrangThaiDH=1";</script>';
		exit;
	} else {
		$date = date('Y') . "-" . date('m') . "-" . date('d');
		$connect->query("update dathang set MSNV='$MSNV', NgayGH='$date', TrangThaiDH=" . $_POST['TrangThaiDH'] . " where MSDH=" . $_GET['MSDH']);
		echo '<script>alert("Cập nhật trạng thái đơn hàng thành công!!! ");window.location="?option=order&TrangThaiDH=1";</script>';
		exit;
	}
}
?>
<?php
$tong = 0;
$query = "select a.HoTenKH, a.SoDienThoai as 'SoDienThoaiKhachHang', a.TenCongTy as 'TenCongTyKhachHang', b.*,
	c.TenHinhThucTT as 'tenthanhtoan'
	from khachhang a join dathang b on a.MSKH=b.MSKH join thanhtoan c on b.MaThanhToan=c.id where b.MSDH=" . $_GET['MSDH'];
$dat = mysqli_fetch_array($connect->query($query));
?>
<div class="container">
	<h2 class="mt-5 text-center">Chi Tiết Đơn Hàng</h2>
	<h5 class="mb-5 text-center">(Mã Đơn Hàng: <?= $dat['MSDH'] ?>)</h5>
	<h3>Ngày Đặt Hàng</h3>
	<table class="table table-hover">
		<tr>
			<td><b><i>Ngày Tạo Đơn: </i></b></td>
			<td><b>
					<?= $dat['NgayDH'] ?>
				</b></td>
		</tr>
		<tr>
			<td><b><i>Ngày Giao Hàng:</i></b></td>
			<td><b>
					<?= $dat['NgayGH'] ?>
				</b></td>
		</tr>
	</table>
	<h3 class="mt-5">Thông Tin Người Mua Hàng</h3>
	<table class="table table-hover">
		<tr>
			<td><b><i>Họ Tên: </i></b></td>
			<td><b>
					<?= $dat['HoTenKH'] ?>
				</b></td>
		</tr>
		<tr>
			<td><b><i>Số Điện Thoại: </i></b></td>
			<td><b>
					<?= $dat['SoDienThoaiKhachHang'] ?>
				</b></td>
		</tr>
		<tr>
			<td><b><i>Tên Công Ty: </i></b></td>
			<td><b>
					<?= $dat['TenCongTyKhachHang'] ?>
				</b></td>
		</tr>
		<tr>
			<td><b><i>Phương Thức Thanh Toán: </i></b></td>
			<td><b>
					<?= $dat['tenthanhtoan'] ?>
				</b></td>
		</tr>
		<tr>
			<td><b><i>Ghi Chú: </i></b></td>
			<td><b>
					<?= $dat['Ghichu'] ?>
				</b></td>
		</tr>
	</table>

	<?php
    $query = "select c.MSHH,b.SoLuong,b.GiaDatHang,c.TenHH,c.image from dathang a 
	join chitietdathang b on a.MSDH=b.MSDH join hanghoa c on b.MSHH=c.MSHH where a.MSDH=" . $_GET['MSDH'];
    $dathang = $connect->query($query);
    ?>
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
				<?php $tong+=$item['GiaDatHang']*$item['SoLuong'];?>
				<?php endforeach; ?>
				<tr class="mt-5">
					<td></td>
					<td><h4>Tổng Tiền:</h4></td>
					<td></td>
					<td><h4><?= number_format($tong, 0, ',', '.')?>vnđ</h4></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="mb-5">
			<h3>Trạng Thái Đơn Hàng:</h3>
			<div class="form-check ms-5 mt-3">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" name="TrangThaiDH" value="1" <?= $dat['TrangThaiDH'] == 1
                	? 'checked' : '' ?>>
					<b>Chưa Xử Lý</b>
				</label>
			</div>
			<div class="form-check ms-5">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" name="TrangThaiDH" value="2" <?= $dat['TrangThaiDH'] == 2
                	? 'checked' : '' ?>>
					<b>Đang Xử Lý</b>
				</label>
			</div>
			<div class="form-check ms-5">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" name="TrangThaiDH" value="3" <?= $dat['TrangThaiDH'] == 3
                	? 'checked' : '' ?>>
					<b>Đã Hủy</b>
				</label>
			</div>
			<div class="form-check ms-5">
				<label class="form-check-label" for="radio1">
					<input type="radio" class="form-check-input" name="TrangThaiDH" value="4" <?= $dat['TrangThaiDH'] == 4
                	? 'checked' : '' ?>>
					<b>Đang Giao</b>
				</label>
			</div>
		</div>
		<div class="text-center mb-5"><button class="btn btn-primary" type="submit" value="Cập Nhật Đơn Hàng">Cập Nhật
				Đơn Hàng</button></div>
				<?$_SESSION['tong']=$tong;?>
	</form>
	<?php include_once('footer.php'); ?>