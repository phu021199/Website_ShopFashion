<?php $loaihang1=mysqli_fetch_array($connect->query("select*from hanghoa where MSHH=".$_GET['MSHH']));
?>
<?php
	if(isset($_POST['TenHH'])){
		$TenHH=$_POST['TenHH'];
		$query="select*from hanghoa where TenHH='$TenHH' and MSHH!=".$loaihang1['MSHH'];
		if(mysqli_num_rows($connect->query($query))!=0){
			$alert="Tên loại hàng đã tồn tại!!!";
		}else{
			$gia=$_POST['Gia'];
			$QuyCach = $_POST['QuyCach'];
			$SoLuongHang = $_POST['SoLuongHang'];
			$image = $_POST['image'];
			$status=$_POST['status'];
			$connect->query("update hanghoa set TenHH='$TenHH', gia='$gia', QuyCach='$QuyCach', SoLuongHang='$SoLuongHang', image='$image', status='$status' where MSHH=".$loaihang1['MSHH']);
			header("location: ?option=qlsanpham");
		}
	}
?>
<div class="container">
	<h3 class="mt-2 text-center">Cập Nhật Sản Phẩm</h3>
	<?= isset($alert) ? $alert : "" ?>
		<form method="post">
			<p class="mt-5" style="margin-left:100px;">Tên Sản Phẩm:
			<input type="text" class="form-control mt-2 mb-3" name="TenHH" value="<?=$loaihang1['TenHH']?>"></p>
			<p style="margin-left:100px;">Giá:
			<input type="text" class="form-control mt-2 mb-3" name="Gia" value="<?=$loaihang1['Gia']?>"></p>
			<p style="margin-left:100px;">Quy Cách:
			<input type="text" class="form-control mt-2 mb-3" name="QuyCach" value="<?=$loaihang1['QuyCach']?>"></p>
			<p style="margin-left:100px;">Số Lượng Hàng:
			<input type="text" class="form-control mt-2 mb-3" name="SoLuongHang" value="<?=$loaihang1['SoLuongHang']?>"></p>
			<p style="margin-left:100px;">Hình Ảnh:
			<input type="text" class="form-control mt-2 mb-3" name="image" value="<?=$loaihang1['image']?>"></p>
			<div class="mb-5" style="margin-left:100px;"><strong>Trạng thái:</strong>
				<div class="form-check ms-5 mt-3">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="1" <?=$loaihang1['status']==1?'checked':''?>>Đang bán
					</label>
				</div>
				<div class="form-check ms-5">
					<label class="form-check-label" for="radio1">
						<input type="radio" class="form-check-input" name="status" value="0" <?=$loaihang1['status']==0?'checked':''?>>Ngừng bán
					</label>
				</div>
			</div>
			<div class="text-center loaibtn mb-5"><button class="btn btn-primary" type="submit" value="Thêm loại hàng">Cập Nhật</button></div>
		</form>
</div>
<?php include_once('footer.php');?>
