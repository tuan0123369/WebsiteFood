<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
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

	<!-- jS -->
	<script src="assests/js/jquery.min.js" type="text/javascript"></script>
	<script src="assests/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assests/js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script src="assests/js/owl.carousel.min.js" type="text/javascript"></script>
	<script src="assests/js/jquery.nicescroll.js"></script>
	<script src="assests/js/jquery.scrollUp.min.js"></script>
	<script src="assests/js/main.js" type="text/javascript"></script>
	<?php setcookie('cart', "", time() + 3600) ?>

</head>

<body>


	<!-- TOP HEADER Start
    ================================================== -->
	<?php include_once '../include/header.php' ?>








	<!-- SLIDER Start
    ================================================== -->


	<section id="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="slider" class="nivoSlider">
						<img src="assests/images/slider.jpg" alt="" />
						<img src="assests/images/slider1.jpg" alt="" />
						<img src="assests/images/slider2.jpg" alt="" />
					</div> <!-- End of /.nivoslider -->
				</div> <!-- End of /.col-md-12 -->
			</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</section> <!-- End of Section -->



	<!-- FEATURES Start
    ================================================== -->

	<section id="features">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class="fa fa-ambulance"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Miễn phí ship</h4>
								<p>Miễn ship cho đơn hàng từ 200k trở lên.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class=" fa fa-foursquare"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Giảm giá</h4>
								<p>Chương trình giảm giá mới hàng tuần.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="block">
						<div class="media">
							<div class="pull-left" href="#">
								<i class=" fa fa-phone"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Gọi ngay cho chúng tôi</h4>
								<p>Để nhận được sự phục vụ tận tinh.</p>
							</div> <!-- End of /.media-body -->
						</div> <!-- End of /.media -->
					</div> <!-- End of /.block -->
				</div> <!-- End of /.col-md-4 -->
			</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</section> <!-- End of section -->



	<!-- CATAGORIE Start
    ================================================== -->
	<!-- <section id="catagorie">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<!-- <div class="block-heading">
							<h2>Thực đơn của chúng tôi</h2>
						</div>
						<div class="row"> -->
	<?php
	include_once '../data/food_list.php';
	// $preValue = -1;
	// foreach ($food_list as $id_food) {
	// 	if ($id_food['id_cate'] < 3)
	// 		if ($id_food['id_cate'] != $preValue) {
	// 			$preValue = $id_food['id_cate'];
	// 			echo '	<div class="col-sm-6 col-md-4">
	// 	<div class="thumbnail">
	// 		<a class="catagotie-head" href="blog-single.php">
	// 			<img src="assests/images/category-image-1.jpg" alt="...">
	// 			<h3>'.$id_food['title'].'</h3>
	// 		</a>
	// 		<div class="caption">
	// 			<p>'.$id_food['decripsion'].'</p>
	// 			<p>
	// 				<a href="blog-single.php" class="btn btn-default btn-transparent" role="button">
	// 					<span>Xem chi tiết</span>
	// 				</a>
	// 			</p>
	// 		</div> <!-- End of /.caption -->
	// 	</div> <!-- End of /.thumbnail -->
	// </div> <!-- End of /.col-sm-6 col-md-4 -->';
	// 		}
	// }
	?>
	<!-- </div> End of /.row -->
	<!-- </div> End of /.block -->
	<!-- </div> <!-- End of /.col-md-12 -->
	<!-- </div> End of /.row -->
	<!-- </div> End of /.container -->
	<!-- </section> End of Section 




	<!-- PRODUCTS Start
    ================================================== -->

	<section id="products">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block-heading">
						<h2>Sản phẩm mới</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				$action = "getData";
				include '../controllers/productsController.php';
				$i = 0;
				foreach ($products as $prd) {
					$i++;
					if ($i < 9) {
						echo '<div class="col-md-3">
						<div class="products">
									<a href="../controllers/productsController.php?item=' . $prd->getCategoryDTO()->getId() . '&id=' . $prd->getId() . '&action=getSingleData">
							<img src="../../imgs/';
						if ($prd->getImg() == '') {
							echo 'productDefault.png';
						} else {
							echo $prd->getImg();
						}
						echo '" alt="" width="250px" style="object-fit: contain; height: 250px"></img>
						</a>
							
								<h4>' . $prd->getFood_name() . '</h4>
						
							<p class="price">' . number_format($prd->getPrice()) . ' đ</p>';
						if ($user_id == -1) {
							echo '
							<a data-toggle="modal" data-target="#myModal" href="#" class="view-link shutter">';
						} else {
							echo '
							<a class="view-link shutter" href="../controllers/cartController.php?id=' . $prd->getId() . '&action=add2Cart&item=' . $prd->getCategoryDTO()->getId() . '">';
						}
						echo '
							<i class="fa fa-plus-circle"></i>Thêm vào giỏ hàng</a>
						</div></div>';
					}
				}
				?>
			</div> <!-- End of /.col-md-3 -->
		</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</section> <!-- End of Section -->




	<!-- CALL TO ACTION Start
    ================================================== -->

	<section id="call-to-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Các đối tác của chúng tôi</h2>
						</div>
					</div> <!-- End of /.block -->
					<div id="owl-example" class="owl-carousel">
						<div> <img src="assests/images/company-1.png" alt=""></div>
						<div> <img src="assests/images/company-2.png" alt=""></div>
						<div> <img src="assests/images/company-3.png" alt=""></div>
						<div> <img src="assests/images/company-4.png" alt=""></div>
						<div> <img src="assests/images/company-5.png" alt=""></div>
						<div> <img src="assests/images/company-6.png" alt=""></div>
						<div> <img src="assests/images/company-8.png" alt=""></div>
						<div> <img src="assests/images/company-9.png" alt=""></div>
					</div> <!-- End of /.Owl-Slider -->
				</div> <!-- End of /.col-md-12 -->
			</div> <!-- End Of /.Row -->
		</div> <!-- End Of /.Container -->
	</section> <!-- End of Section -->



	<!-- Footer -->
	<?php
	include_once '../include/footer.php';
	?>

	<a id="back-top" href="#"></a>
</body>

</html>