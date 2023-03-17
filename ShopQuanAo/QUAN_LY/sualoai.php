<?php $loaihang1=mysqli_fetch_array($connect->query("select*from loaihang where MaLoaiHang=".$_GET['MaLoaiHang']));
?>
<?php
	if(isset($_POST['TenLoaiHang'])){
		$TenLoaiHang=$_POST['TenLoaiHang'];
		$query="select*from loaihang where TenLoaiHang='$TenLoaiHang' and MaLoaiHang!=".$loaihang1['MaLoaiHang'];
		if(mysqli_num_rows($connect->query($query))!=0){
				$alert="Tên loại hàng đã tồn tại!!!";
		}else{
				$status=$_POST['status'];
				$connect->query("update loaihang set TenLoaiHang='$TenLoaiHang', status='$status' where MaLoaiHang=".$loaihang1['MaLoaiHang']);
				echo '<script>alert("Cập nhật thành công!!! ");window.location="?option=loaihang"</script>';
		}
	}
?>
<div class="container">
	<h3 class="mt-2 text-center">Cập Nhật Loại Hàng</h3>
	<?= isset($alert) ? $alert : "" ?>
		<form method="post">
			<p class="mt-5" style="margin-left:100px;">Tên Loại Hàng:
			<input type="text" class="form-control mt-2 mb-3" style="width:500px;" name="TenLoaiHang" value="<?=$loaihang1['TenLoaiHang']?>"></p>
			<div class="mb-5" style="margin-left:100px;"><strong>Trạng thái:</strong>
				<div class="form-check ms-5 mt-3">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="1" <?=$loaihang1['status']==1?'checked':''?>>Hoạt động
					</label>
				</div>
				<div class="form-check ms-5">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="0" <?=$loaihang1['status']==0?'checked':''?>>Ngừng hoạt động
					</label>
				</div>
			</div>
			<div class="text-center loaibtn"><button class="btn btn-primary" type="submit" value="Thêm loại hàng">Cập Nhật</button></div>
		</form>
</div>
<?php include_once('footer.php');?>






