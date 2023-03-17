<?php
$query = "select*from loaihang";
$result = $connect->query($query);
?>
<div class="container">
	<h2 class="text-center">Loại Hàng</h2>
	<div class="text-center">
		<a class="text-important text-decoration-none" href="?option=addloai">
			Thêm Loại Hàng
		</a>
	</div>
		<table class="table align-middle table-hover text-center mt-3">
			<thead>
				<tr class="table-tr table-success">
					<td>Mã Loại Hàng</td>
					<td>Tên Loại Hàng</td>
					<td>Trạng Thái</td>
					<td>Hành Động</td>

				</tr>
			</thead>
			<tbody>
				<?php foreach ($result as $item): ?>
				<tr>
					<td>
						<?= $item['MaLoaiHang'] ?>
					</td>
					<td>
						<?= $item['TenLoaiHang'] ?>
					</td>
					<td>
						<?= $item['status']==1 ? 'Hoạt động' : 'Ngưng hoạt động' ?>
					</td>
					<td>
						<a class="btn btn-primary" href="?option=sualoai&MaLoaiHang=<?= $item['MaLoaiHang'] ?>">
							Sửa
						</a>
						<a class="btn btn-primary" onclick="return confirm('Bạn có muốn xóa loại sản phẩm?');"
							href="?option=deleteloai&MaLoaiHang=<?= $item['MaLoaiHang'] ?>">
							Xóa
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</div>
<?php include_once('footer.php'); ?>