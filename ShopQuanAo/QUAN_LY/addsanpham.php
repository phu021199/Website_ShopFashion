<?php
if (isset($_POST['TenHH'])) {
	$MSHH = $_POST['MSHH'];
	$query = "select*from hanghoa where MSHH='$MSHH'";
	$result = $connect->query($query);
	if (mysqli_num_rows($result) == 1) {
		$alert = "Mã sản phẩm đã tồn tại!!!";
	} else {
		$TenHH = $_POST['TenHH'];
		// $MaLoaiHangid = $_POST['MaLoaiHangid'];
		$MaLoaiHangid=$MSHH;
		$QuyCach = $_POST['QuyCach'];
		$Gia = $_POST['Gia'];
		$SoLuongHang = $_POST['SoLuongHang'];
		$image = $_POST['image'];
		$MaLoaiHang=$_POST['MaLoaiHang'];
		$status = $_POST['status'];
		$query = "INSERT INTO `hanghoa`(`MSHH`, `MaLoaiHangid`, `TenHH`, `QuyCach`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `image`, `status`) VALUES ('$MSHH', '$MaLoaiHangid', '$TenHH', '$QuyCach', '$Gia', '$SoLuongHang', '$MaLoaiHang', '$image', '$status')";
		$connect->query($query);
		echo '<script>alert("Thêm sản phẩm thành công!!! ");</script>';
	}
}
?>
<div class="container">
	<h3 class="mt-2 text-center">Thêm Sản Phẩm</h3>
	<?= isset($alert) ? $alert : "" ?>
		<form method="post">
			<p class="mt-5" style="margin-left:100px;">Mã Số Hàng Hóa:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="MSHH">
			</p>
			<!-- <p style="margin-left:100px;">Mã Loại Hàng ID:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="MaLoaiHangid">
			</p> -->
			<p style="margin-left:100px;">Tên Sản Phẩm:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="TenHH">
			</p>
			<p style="margin-left:100px;">Quy Cách:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="QuyCach">
			</p>
			<p style="margin-left:100px;">Giá:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="Gia">
			</p>
			<p style="margin-left:100px;">Số Lượng Hàng:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="SoLuongHang">
			</p>
			<p style="margin-left:100px;">Mã Loại Hàng
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="MaLoaiHang">
			</p>
			<p style="margin-left:100px;">Hình Ảnh:
				<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="image">
			</p>
			<div class="mb-5" style="margin-left:100px;"><strong>Trạng thái:</strong>
				<div class="form-check ms-5 mt-3">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" value="1" name="status" checked>Đang bán
					</label>
				</div>
				<div class="form-check ms-5">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="0">Ngừng bán
					</label>
				</div>
			</div>
			<div class="text-center loaibtn mb-5"><button class="btn btn-primary" type="submit"
					value="Thêm sản phẩm">Thêm</button></div>
		</form>
</div>
<?php include_once('footer.php'); ?>