<?php
if (isset($_GET['MSHH'])) {
	$MSHH = $_GET['MSHH'];
	$hanghoa = $connect->query("select*from hanghoa where MaLoaiHangid=$MSHH");
	// if(mysqli_num_rows($hanghoa)!=0){
	// 	$connect->query("update loaihang set status=0 where MaLoaiHang=$MaLoaiHang");
	// }else{
	// 	$connect->query("delete from loaihang where MaLoaiHang=$MaLoaiHang");
	// }

}
?>
<?php
$query = "select*from hanghoa";
$result = $connect->query($query);
?>
<div class="container">
	<h2 class="text-center mt-4">Danh Sách Sản Phẩm</h2>
	<div class="text-center">
		<a class="text-important text-decoration-none" href="?option=addqlsanpham">
			Thêm Sản Phẩm
		</a>
	</div>
	<table class="table align-middle table-hover text-center mt-3">
		<thead>
			<tr class="table-tr table-success">
				<td style="width:5%;">
					MSHH
				</td>
				<td style="width:15%;">
					Tên Hàng Hóa
				</td>
				<td style="width:15%;">
					Giá Sản Phẩm
				</td>
				<td style="width:40%;">
					Ảnh Sản Phẩm
				</td>
				<td style="width:10%;">
					Trạng Thái
				</td>
				<td style="width:10%;">
					Lựa chọn
				</td>
			</tr>
		</thead>
		<?php foreach ($result as $item): ?>
		<tr>
			<td>
				<?= $item['MSHH'] ?>
			</td>
			<td>
				<?= $item['TenHH'] ?>
			</td>
			<td>
				<p>
					<?= number_format($item['Gia'], 0, ',', '.') ?> vnđ
				</p>
			</td>
			<td>
				<img src="../KHACH_HANG/Image/<?= $item['image'] ?>" width="25%">
			</td>
			<td>
				<?= $item['status']==1 ? 'Đang bán' : 'Ngừng bán' ?>
			</td>
			<td>
				<a class="btn btn-primary" href="?option=suasp&MSHH=<?= $item['MSHH'] ?>">
					Sửa
				</a>
				<a class="btn btn-primary" onclick="return confirm('Bạn có muốn xóa sản phẩm?');"
					href="?option=deletesp&MSHH=<?= $item['MSHH'] ?>">
					Xóa
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php include_once('footer.php'); ?>