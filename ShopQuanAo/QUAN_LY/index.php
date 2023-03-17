<?php
include_once('footer.php');
$chuaxuly = mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=1"));
$dangxuly = mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=2"));
$daxuly = mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=3"));
$huydonhang = mysqli_num_rows($connect->query("select*from dathang where TrangThaiDH=4"));

?>
<!DOCTYPE html>
<html>

<head>
	<title>Fashion Admin</title>
	<meta charset='UTF-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../image/favicon/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/style.css" type="text/css">
	<!-- CDN create fas login user -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<!--<meta http-equiv="refresh" content="15;url=">-->
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

<body>
	<table class="bang">
		<tr class="">
			<td style="width:205px;" class="text-center">
				<a href="?option=loaihang">
					<img class="image" src="../image/fa2.jpg">
				</a>
			</td>
			<td class="pe-5 text-end border-1 border-bottom">
				<div class="dropdown">
					<div class="pr-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
						aria-expanded="true">
						<i class="fas fa-user-cog" style="font-size:18px;">&nbsp;
							<?php echo $_SESSION['HoTenNV']; ?>
						</i>
					</div>
					<div class="dropdown-menu  dropdown-menu-end dropstart">
						<div class="dropdown-header">
							<h6 class="text-overflow m-0" style="font-size:12px;">Xin chào</h6>
						</div>
						<a href="?option=profile" class="dropdown-item">
							<!-- <i class="ni ni-single-02"></i> -->
							<span><i class="fas fa-user" style="font-size:16px"></i>&nbsp;Thông tin</span>
						</a>
						<a class="dropdown-item" onclick="return confirm('Bạn có muốn đăng xuất?');"href="?option=logout">
							<!-- <i class="ni ni-user-run"></i> -->
							<span><i class="fa fa-sign-out"></i>&nbsp;Đăng xuất</span>
						</a>
					</div>
			</td>
		</tr>
		<tr>	
			<td class="d-grid mt-5">
				<a class="btn text-start" href="?option=loaihang"><i class="fas fa-tag" style="font-size:16px"></i>&nbsp;Loại Hàng</a>
				<a class="btn text-start" href="?option=qlsanpham"><i class="fas fa-tshirt" style="font-size:16px"></i>&nbsp;Sản Phẩm</a>
				<a class="btn text-start" href="?option=order&TrangThaiDH=1"><i class="fa fa-spinner" style="font-size:16px"></i>&nbsp;Đơn Hàng Chưa Xử Lý</a>
				<a class="btn text-start" href="?option=order&TrangThaiDH=2"><i class="fa fa-truck" style="font-size:16px"></i>&nbsp;Đơn Hàng Đang Xử Lý</a>
				<a class="btn text-start" href="?option=order&TrangThaiDH=3"><i class="fa fa-times" style="font-size:16px"></i>&nbsp;Đơn Hàng Đã Hủy</a>
				<a class="btn text-start" href="?option=order&TrangThaiDH=4"><i class="fa fa-check" style="font-size:16px"></i>&nbsp;Đơn Hàng Đã Giao</a>
			</td>
			<style>
				/*Style khác*/
				.admin {
					font-size: 30px;
					color: deepskyblue;
				}
				.donhang {
					margin-left: 50px;

				}
				.image {
					height: 70px;
				}
				.bang {
					width: 100%;
					height: 400px;
				}
			</style>
			<td>
				<?php
                if (isset($_GET['option'])) {
	                switch ($_GET['option']) {
		                case 'loaihang':
			                include "loaihang.php";
			                break;
		                case 'addloai':
			                include "addloai.php";
			                break;
		                case 'qlsanpham':
			                include "sanpham.php";
			                break;
		                case 'addqlsanpham':
			                include "addsanpham.php";
			                break;
		                case 'chitietdonhang':
			                include "chitietdonhang.php";
			                break;
		                case 'order':
			                include "hienthidonhang.php";
			                break;
		                case 'sualoai':
			                include "sualoai.php";
			                break;
		                case 'suasp':
			                include "suasp.php";
			                break;
		                case 'deleteloai':
			                $query = "select*from loaihang where MaLoaiHang=".$_GET['MaLoaiHang'];
			                $result = $connect->query($query);
			                if (mysqli_num_rows($result) != 0) 
				                $connect->query("delete from loaihang where MaLoaiHang=".$_GET['MaLoaiHang']);
							echo '<script>alert("Xóa loại hàng thành công!!! ");window.location="?option=loaihang"</script>';
			                break;
		                case 'deletesp':
			                $query = "select*from hanghoa where MSHH=".$_GET['MSHH'];
			                $result = $connect->query($query);
			                if (mysqli_num_rows($result) != 0) {
				                $connect->query("delete from hanghoa where MSHH=".$_GET['MSHH']);
			                }
			                header("location: ?option=qlsanpham");
			                break;
		                case "logout":
			                unset($_SESSION['MSNV']);
			                header("location:?option=signin");
			                break;
		                case "profile":
			                include "profile.php";
			                break;
						case"signin":
							include "signin.php";
							break;
	                }

                } ?>
			</td>
	</table>
</body>

</html>