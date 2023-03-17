<?php
if (isset($_POST['TenLoaiHang'])) {
	$TenLoaiHang = $_POST['TenLoaiHang'];
	if(!$TenLoaiHang==""){
		$query = "select*from loaihang where TenLoaiHang='$TenLoaiHang'";
		$result = $connect->query($query);
		if (mysqli_num_rows($result) == 1) {
			$alert = "Tên loại hàng đã tồn tại!!!";
		} else {
			$status = $_POST['status'];
			$query = "insert loaihang(TenLoaiHang,status) value('$TenLoaiHang','$status')";
			$connect->query($query);
			echo '<script>alert("Thêm loại hàng thành công!!! ");window.location="?option=loaihang"</script>';
		}
	}else{
			echo '<script>alert("Bạn cần nhập vào tên loại hàng ");</script>';
		}
}
?>
<div class="container">
	<h3 class="mt-2 text-center">Thêm Loại Hàng</h3>
	<?= isset($alert) ? $alert : "" ?>
		<form method="post">
			<p class="mt-5" style="margin-left:100px;">Tên Loại Hàng:
			<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="TenLoaiHang"></p>
			<div class="mb-5" style="margin-left:100px;"><strong>Trạng thái:</strong>
				<div class="form-check ms-5 mt-3">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" value="1" name="status" checked>Hoạt động
					</label>
				</div>
				<div class="form-check ms-5">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="0">Ngừng hoạt động
					</label>
				</div>
			</div>
			<div class="text-center loaibtn"><button class="btn btn-primary" type="submit" value="Thêm loại hàng">Thêm</button></div>
		</form>
</div>
<?php include_once('footer.php'); ?>