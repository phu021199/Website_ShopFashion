<?php
$query = "select*from dathang where TrangThaiDH=" . $_GET['TrangThaiDH'];
$result = $connect->query($query);
?>
<div class="container">
	<h2 class="text-center">Đơn Hàng</h2>
	<table class="table align-middle table-hover text-center mt-3">
		<thead>
			<tr class="table-tr table-success">
				<td>Mã Số Đơn Hàng</td>
				<td>Mã Số Nhân Viên</td>
				<td>Mã Số Khách Hàng</td>
				<td>Ngày Đặt Hàng</td>
				<td>Ngày Giao Hàng</td>
				<td>Lựa chọn</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($result as $item): ?>
			<tr>
				<td>
					<?= $item['MSDH'] ?>
				</td>
				<td>
					<?= $item['MSNV'] ?>
				</td>
				<td>
					<?= $item['MSKH'] ?>
				</td>
				<td>
					<?= $item['NgayDH'] ?>
				</td>
				<td>
					<?= $item['NgayGH'] ?>
				</td>
				<td>
					<a class="btn btn-primary" href="?option=chitietdonhang&MSDH=<?= $item['MSDH'] ?>">
						Chi Tiết
					</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<?php include_once('footer.php'); ?>