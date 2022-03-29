<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Thanh toán</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="assests/css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="assests/css/owl.carousel.css">
	<link rel="stylesheet" href="assests/css/owl.theme.css">
	<link rel="stylesheet" href="assests/css/bootstrap.min.css">
	<link rel="stylesheet" href="assests/css/font-awesome.min.css">
	<link rel="stylesheet" href="assests/css/style.css">
	<link rel="stylesheet" href="assests/css/responsive.css">
	<link rel="stylesheet" type="assests/css/stylecheckout.css">

	<!-- jS -->
	<script src="assests/js/jquery.min.js" type="text/javascript"></script>
	<script src="assests/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assests/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="assests/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="assests/js/jquery.nicescroll.js"></script>
	<script src="assests/js/jquery.scrollUp.min.js"></script>
	<script src="assests/js/main.js" type="text/javascript"></script>
	<script src="https://kit.fontawesome.com/1bc4c0a11a.js" crossorigin="anonymous"></script>


</head>

<body>


	<!-- TOP HEADER Start
    ================================================== -->
	<?php
	include_once '../include/header.php'
	?>


	<section id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-9 clearfix">
					<h1 class="title">
						<span>
							Thanh toán
						</span>
					</h1>
					<form action="../controllers/cartController.php?action=finish" method="POST">
						<div class="row">
							<div class="col-75">
								<div class="container-checkout">

									<div class="row1">
										<div class="col-50">
											<h3>Thông Tin Giao hàng</h3>
											<label for="fname"><i class="fa fa-user"></i> Họ Tên</label>
											<input type="text" id="fname" name="fullname" placeholder="Lê Văn A" required>
											<label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ nhận hàng</label>
											<input type="text" id="adr" name="address" placeholder="61/52 Phạm Hùng" required>
										</div>
										<div class="col-50">
											<h3>Payment</h3>
											<label>
												<input type="radio" name="rad1" onclick="paycheck(1)" checked="checked"> Thanh Toán bằng thẻ
												<br>
												<input type="radio" name="rad1" onclick="paycheck(0)"> Thanh Toán tiền mặt khi nhận hàng
											</label>

											<label for="fname">Chấp nhận thanh toán những thẻ sau đây</label>
											<div class="icon-container">
												<i class="fa fa-cc-visa" style="color:navy;"></i>
												<i class="fa fa-cc-mastercard" style="color:red;"></i>
											</div>
											<div id="paytexbox">
												<label for="cname">Tên Trên Thẻ</label>
												<input type="text" id="cname" name="cardname" placeholder="Soeng Souy" required>
												<label for="ccnum">Số thẻ</label>
												<input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
												<label for="expmonth">Exp Month</label>
												<input type="text" id="expmonth" name="expmonth" placeholder="September" required>
												<div class="row">
													<div class="col-50">
														<label for="expyear">Exp Year</label>
														<input type="text" id="expyear" name="expyear" placeholder="2021" required>
													</div>
													<div class="col-50">
														<label for="cvv">CVV</label>
														<input type="text" id="cvv" name="cvv" placeholder="352" required>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-25">
								<div class="container-checkout">
									<h4>Những món trong giỏ hàng <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo count($list_item) ?></b></span></h4>
									<?php foreach ($list_item as $product) {
										echo '
									<p><h5>' . $product[0]->getFood_name() . '<span class="pricee">' . number_format($product[0]->getPrice()) . ' đ</span><span style="float: right; padding-right: 10%;">x'.$product[1].'</span><h5></p>';
									} ?>
									<hr>
									<p>
									
									<h3> Tổng số tiền <span class="pricee"><?php echo number_format($total); ?> đ</span></h3>
									</p>
								</div>
							</div>
						</div><input type="submit" value="Thanh toán" class="btn">
						<a class="btn btn-info " target="__blank" href="../controllers/cartController.php?action=payment">Quay lại giỏ hàng</a>
					</form>
				</div> <!-- End of /.col-md-9 -->
				<div class="col-md-3">
					<div class="blog-sidebar">
					</div> <!-- End of /.blog-sidebar -->
				</div> <!-- End of /.col-md-3 -->
			</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</section> <!-- End of /#Blog -->




	<!-- Footer -->
	<?php
	include_once '../include/footer.php';
	?>
	<a id="back-top" href="#"></a>
</body>

</html>


<script>
	function paycheck(x) {
		if (x != 0) document.getElementById("paytexbox").style.display = 'block';
		else
			document.getElementById("paytexbox").style.display = 'none';
		return;
	}
</script>

<style>
</style>