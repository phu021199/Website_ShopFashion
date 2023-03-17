<?php
	include_once('index.php');
?>
<!DOCTYPE html>
<html lang="vi">
<body>
<!-- Carousel -->
<div id="trinhchieu" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#trinhchieu" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#trinhchieu" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#trinhchieu" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="?option=shop"><img src="../image/bia1.jpg" href="#" alt="bia1" class="d-block" style="width:100%"></a>
      <div class="carousel-caption">
        <!-- <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p> -->
      </div>
    </div>
    <div class="carousel-item">
	<a href="?option=shop"><img src="../image/bia2.jpg" alt="bia2" class="d-block" style="width:100%"></a>
      <div class="carousel-caption">
        <!-- <h3>Chicago</h3>
        <p>Thank you, Chicago!</p> -->
      </div> 
    </div>
    <div class="carousel-item">
	<a href="?option=shop"><img src="../image/bia3.jpg" alt="bia3" class="d-block" style="width:100%"></a>
      <div class="carousel-caption">
        <!-- <h3>New York</h3>
        <p>We love the Big Apple!</p> -->
      </div>  
    </div>
  </div>
  <!-- Left and right controls/icons -->
	<button class="carousel-control-prev" type="button" data-bs-target="#trinhchieu" data-bs-slide="prev">
		<span class="carousel-control-prev-icon bg-dark"></span>
  	</button>
  	<button class="carousel-control-next" type="button" data-bs-target="#trinhchieu" data-bs-slide="next">
    	<span class="carousel-control-next-icon bg-dark"></span>
  	</button>
</div>
<div class="container">
	<h2 class="text-dark text-center pt-5 p-5">SẢN PHẨM HOT</h2>
		<div class="row">
				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=16"><img src="Image/f42123401__1__thumb_400x600.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=16">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=16">Đầm cotton màu đen cổ tròn tay bồng</a>
								<div class="pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=26"><b><?=number_format(299999,0,',','.')?>đ</b></a>
									<a class="p-prices" >670,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=17"><img src="Image/F42123305__1__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=17">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=17">Đầm cotton kẻ dáng dài qua gối cổ cao 3 cm tay ngắn</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=17"><b><?=number_format(199999,0,',','.')?>đ</b></a>
									<a class="p-prices" >670,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=18"><img src="Image/F45108202__1__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=18">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=18">Đầm dáng ôm, sát nách, xẻ xếp ly thân trước, dây đai đính cúc trang trí</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=18"><b><?=number_format(349999,0,',','.')?>đ</b></a>
									<a class="p-prices" >950,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=19"><img src="Image/F45142602_1080K__1__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=19">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=19">Đầm dáng ôm cổ tròn xẻ V đính cúc trang trí tay lỡ xếp ly</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=19"><b><?=number_format(399999,0,',','.')?>đ</b></a>
									<a class="p-prices" >1,080,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=20"><img src="Image/F45107301_2__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=20">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=20">Đầm sơ mi suông cổ đúc túi ốp họa tiết hình tim</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=20"><b><?=number_format(399999,0,',','.')?>đ</b></a>
									<a class="p-prices" >950,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=21"><img src="Image/F55124808_590K__1__F25160801_750K_thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=21">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=21">Áo sơ mi suông tay cộc kẹp ren cổ buộc nơ</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=21"><b><?=number_format(249999,0,',','.')?>đ</b></a>
									<a class="p-prices" >590,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=22"><img src="Image/F55122908_650K__1__F25156201_650K__1__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=22">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=22">Sơ mi suông cổ sen thêu V mở nẹp tay nhún măng sec</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=22"><b><?=number_format(299999,0,',','.')?>đ</b></a>
									<a class="p-prices" >650,000đ</a>
								</div>
						</div>
					</div>
				</div>

				<div class="col-6 col-lg-3 mb-3 ">
					<div class="product">
						<div class="mb-3 position-relative">
							<a href="?option=hienthi&MSHH=15"><img src="Image/F45126301__1__thumb.jpg" height="450px" width="290px"></a>
							<div class="product-overlay">
								<ul class="mb-0 list-inline">
									<li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="?option=hienthi&MSHH=15">Mua hàng</a></li>
								</ul>
							</div>
						</div>
						<div class="pt-3">
							<a class="p-name text-decoration-none text-dark" href="?option=hienthi&MSHH=15">Đầm dáng suông, cổ đức thêu phối zizac kẻ, tay lỡ</a>
								<div class="p-price pt-1">
									<a class="p-price text-decoration-none text-warning" href="?option=hienthi&MSHH=15"><b><?=number_format(399999,0,',','.')?>đ</b></a>
									<a class="p-prices" >1,080,000đ</a>
								</div>
						</div>
					</div>
				</div>
		</div>
</div>
	</body>
</html>
<?php include_once ('footer.php'); ?>