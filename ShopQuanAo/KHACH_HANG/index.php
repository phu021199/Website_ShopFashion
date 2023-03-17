<?php 
session_start();
$connect = new MySQLi('localhost','root','','quanlyquanao');
mysqli_set_charset($connect, 'UTF8');
ob_start();
if(isset($_SESSION['khachhang'])){
	$query="select*from khachhang where USERNAMEKH='".$_SESSION['khachhang']."'";
	$khachhang=mysqli_fetch_array($connect->query($query));}
?>
<!-- 240x320 -->
<!DOCTYPE html>
<html lang="vi">
<head>
<title>Shop Quần Áo Online</title>
	<meta charset='UTF-8'>
    <link rel="icon" type="image/x-icon" href="../image/favicon/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="./css/style.css" type="text/css">
	<link rel="stylesheet" href="./css/loginstyle.css" type="text/css">
	<link rel="stylesheet" href="./css/styleht.css" type="text/css">
	

	<!-- CDN create fas login user -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
	<!--<meta http-equiv="refresh" content="15;url=">-->	
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center" style="font-size:13px;">
		<div class="navbar-nav">
		<?php if(empty($_SESSION['khachhang'])): ?>
			<div class="nav-item dropdown">
				<div class="nav-link me-5" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Tra cứu đơn hàng
				</div>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item disabled text-dark">
						<pre class="text-break"><a class="text-decoration-none" href="?option=signin">Đăng nhập</a> để tra cứu đơn hàng.</pre>
					</a>
				</div>
		  	</div>
		  <?php else:?>
			<a class="nav-link me-5" href="?option=purchase">Tra cứu đơn hàng</a>
		  <?php endif;?>
		  <div class="nav-item">
			<a class="nav-link me-5" href="#">Email: phub1706628@gmail.com</a>
		  </div>
		  <div class="nav-item">
			<a class="nav-link me-5" href="#">Hotline: 0326567709</a>
		  </div>
		  <?php if(empty($_SESSION['giohang'])): ?>
			<div class="nav-item dropdown">
				<div class="nav-link me-5" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<i class="fas fa-shopping-cart"></i>
				</div>
				<div class="dropdown-menu  dropdown-menu-right " >
						<a class="dropdown-item disabled text-dark">
							<span>Giỏ hàng của bạn trống.</span>
						</a>
				</div>
		  	</div>
		  <?php else:?>
			<a href="?option=giohang" class="nav-link me-5" type="button" aria-haspopup="true" aria-expanded="true">
				<i class="fas fa-shopping-cart"></i></a>
		  <?php endif;?>
		  <div class="nav-item">
		 	<div class="nav-item dropdown">
            	<div class="nav-link pr-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<i class="fas fa-user"></i>
                </div>
                <div class="dropdown-menu  dropdown-menu-right " >
					<?php if(empty($_SESSION['khachhang'])): ?>
					<a href="?option=signin" class="dropdown-item">
                    	<span>Đăng nhập</span>
                    </a>
					<a href="?option=register" class="dropdown-item">
                    	<span>Đăng Ký</span>
                    </a>
					<?php else:?>
					<div class="dropdown-header ">
                        <h6 class="text-overflow m-0">Xin chào: <b class="text-dark"><?=$khachhang['HoTenKH']?></b></h6> 
                    </div>
                    <a href="?option=profile" class="dropdown-item">
                        <!-- <i class="ni ni-single-02"></i> -->
                    	<span>Thông tin</span>
                    </a>
                    <a class="dropdown-item" onclick="return confirm('Bạn có muốn đăng xuất?');" href="?option=logout" >
                        <!-- <i class="ni ni-user-run"></i> -->
                        <span>Đăng xuất</span>
                    </a>
					<?php endif;?>
            	</div>
			</div>
		</div>
	  </nav>
	  <!-- Đây là thanh điều hướng -->
	  <nav class="navbar navbar-expand-sm justify-content-center">
        <div class="container-fluid">
          <a class="navbar-brand" href="?option=home"><img src="../image/fa2.jpg" alt="Avatar Logo" style="width:40px;" class="rounded-pill"> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
			  <li class="nav-item">
                <a class="nav-link" href="?option=shop"><b>Sản Phẩm</b></a>
              </li>
			  <li class="nav-item">
                <a class="nav-link"><b>|</b></a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="?option=shop&maloaihang=2&page=1"><b>Nam</b></a>
              </li>
			  <li class="nav-item">
                <a class="nav-link"><b>|</b></a>
              </li>
			  <li class="nav-item">
			  	<a class="nav-link" href="?option=shop&maloaihang=1&page=1"><b>Nữ</b></a>
              </li>
            </ul>
            <form class="d-flex" >
			<input type="hidden" name="option" value="search">
              <input class="form-control me-2" type="text" placeholder="Tìm kiếm" name="TenHH">
              <button class="btn btn-dark" style="search; width:130px;" type="submit">Tìm kiếm</button>
            </form>
          	</div>
        </div>
    </nav>
<section class="body">
	<?php 
	if(isset($_GET['option'])){
		switch($_GET['option']){
			case'home':
				include"home.php";
			break;
			case'baiviet':
				include"baiviet.php";
			break;
			case'giohang':
				include"giohang.php";
			break;
			case"signin":
				include"signin.php";
			break;
			case"register":
				include"register.php";
			break;
			case"search":
				include"timkiemtheoloai.php";
			break;
			case"hienthi":
				include"hienthi.php";
			break;
			case"lienhe":
				include"lienhe.php";
			break;
			case"thanhtoan":
				include"thanhtoan.php";
			break;
			case"dathang":
				include"dathang.php";
			break;
			case"shop":
				include"shop.php";
			break;
			case"purchase":
				include"purchase.php";
			break;
			case"chitietpurchase":
				include"chitietdonhang.php";
			break;
			case"profile":
				include"profile.php";
			break;
			case"logout":
				unset($_SESSION['khachhang']);
				header("location:?option=signin");
			break;
		}
	}
	?>
	</section>
</body>
</html>