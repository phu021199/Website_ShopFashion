<?php
include_once('index.php');
$MSHH = $_GET['MSHH'];
$query = "select*from hanghoa where MSHH='$MSHH'";
$result = $connect->query($query);
$item = mysqli_fetch_array($result);
?>
<html>

<body>
	<div class="container main-ht">
		<div class="row mb-lg-4">
			<div class="col-12 col-lg-6 pview-img">
				<div class="d-none d-lg-block">
					<img src="Image\<?= $item['image'] ?>" width="450px" height="700px">
				</div>
				<div class="row pview-product-content my-3 d-none d-lg-block">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#home">Chi tiết sản phẩm</a>
						</li>
						<li class="nav-item">
							<a class=nav-link data-bs-toggle="tab" href="#home1">Đánh giá</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="home" class="container tab-pane active mb-5"><br>
							<p>
								<?= $item['QuyCach'] ?>
							</p>
						</div>
						<div id="home1" class="container tab-pane fade"><br>
							<!-- <p><h2><strong><i>Đánh giá của bạn:</strong></i></h2>
							<div class="stars">
								<form action="">
									<input class="star star-5" id="star-5" type="radio" name="star" />
									<label class="star star-5" for="star-5"></label>
									<input class="star star-4" id="star-4" type="radio" name="star" />
									<label class="star star-4" for="star-4"></label>
									<input class="star star-3" id="star-3" type="radio" name="star" />
									<label class="star star-3" for="star-3"></label>
									<input class="star star-2" id="star-2" type="radio" name="star" />
									<label class="star star-2" for="star-2"></label>
									<input class="star star-1" id="star-1" type="radio" name="star" />
									<label class="star star-1" for="star-1"></label>
								</form>
							</div>
							<br>
							<label><i><strong class="cmt">Bình luận sản phẩm:</i></strong> </label><input class="binhluan" type="text"
								name="HoTenKH">
							<br>
							<input class="sent" type="button" value="Gửi Đi"
								onclick="alert('Thông tin đóng góp của quý khách đã được ghi lại. Cảm ơn quý khách đã phản hồi !!!')"></p> -->
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6 pview-right">
				<form method="post" action="?option=giohang&action=add&MSHH=<?= $item['MSHH'] ?>">
					<h2 class="h1-ht">
						<?= $item['TenHH'] ?>
					</h2>
					<hr class="solid">
					<div class="d-flex"><span><strong>
								<?php
                    if ($item["SoLuongHang"] == 0)
	                    echo 'Hết hàng';
                    else {
	                    echo 'Đang bán';
                    }
                    ?>
							</strong></span></div>
					<hr class="solid">
					<div><strong>Kích cỡ:</strong>
						<div class="form-check">
							<label class="form-check-label" for="radio1">
								<input type="radio" class="form-check-input" id="radio1" name="size" value="XL"
									checked>XL
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label" for="radio2">
								<input type="radio" class="form-check-input" id="radio2" name="size" value="L">L
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label" for="radio3">
								<input type="radio" class="form-check-input" id="radio3" name="size" value="M">M
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label" for="radio4">
								<input type="radio" class="form-check-input" id="radio4" name="size" value="S">S
							</label>
						</div>
					</div>
					<hr class="solid">
					<div class="p-price text-decoration-none text-warning">
						<?= number_format($item['Gia'], 0, ',', '.') ?>đ
					</div>
					<hr class="solid">
					<div class="border d-flex align-items-center  bg-white border-white">
						<span class="text-uppercase no-select">Số lượng</span>
						<a class="button-minus p-0"><i class="fa fa-chevron-circle-left ms-5"></i></a>
						<input name="soluong" class="form-control amount d-flex border-0" id="num-cart-input" value="1">
						<a class="button-plus p-0"><i class="fa fa-chevron-circle-right"></i></a>
					</div>
					<hr class="solid">
					<center><button class="btn btn-dark" type="submit" value="Thêm giỏ hàng" id="add-cart">Thêm Giỏ
							Hàng</button></center>
				</form>
			</div>
		</div>
	</div>

</body>
<script src="./js/amount.js"></script>

</html>
<?php include_once('footer.php'); ?>