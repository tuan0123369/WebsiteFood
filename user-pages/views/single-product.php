<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

	<!-- Css -->
	<link rel="stylesheet" href="assests/css/nivo-slider.css" type="text/css" />
	<link rel="stylesheet" href="assests/css/owl.carousel.css">
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


</head>

<body>


	<!-- TOP HEADER Start
    ================================================== -->
	<?php
	include_once '../include/header.php';
	?>




	<!-- breadcrumb Start
    ================================================== -->

	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Chi tiết sản phẩm</h1>
					<p></p>
				</div> <!-- /.col-md-4 -->
			</div> <!-- /.row -->
		</div> <!-- /.container-->
	</section><!-- /Section -->




	<section id="single-product">
		<div class="container">

			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="../../imgs/<?php
											if ($product->getImg() == '') {
												echo 'productDefault.png';
											} else {
												echo $product->getImg();
											}
											?>" alt="" width="450px" style="object-fit: contain; height: 250px"></img>
					</div>
				</div> <!-- End of /.col-md-5 -->
				<div class="col-md-4">
					<div class="block">
						<div class="product-des">
							<?php
							include_once '../data/food_list.php';
							echo '<h4>' . $product->getFood_name() . '</h4>';
							echo '<p class="price">' . number_format($product->getPrice()) . 'đ</p>';
							echo '<h5><p>' . $product->getFood_descripsion() . '</p></h5>';
							if ($user_id == -1) {
								echo '
								<a class="view-link shutter" data-toggle="modal" data-target="#myModal" href="#">';
							} else {
								echo '<a class="view-link" href="../controllers/cartController.php?id=' . $product->getId() . '&action=add2Cart&item=' . $product->getCategoryDTO()->getId() . '">';
							}
							echo '
							<i class="fa fa-plus-circle"></i>Thêm vào giỏ hàng</a>';
							?>
						</div> <!-- End of /.product-des -->
						<div class="col-md-9">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="active"><a href="#home" data-toggle="tab">Thông tin thêm</a></li>
								<li><a href="#profile" data-toggle="tab">Bình luận</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="home">
									<p>Sản phẩm có X lượt đánh giá, đánh giá trung bình là X,X</p>
								</div>
								<div class="tab-pane" id="profile">
									<p>Hiện chưa có bình luận nào</p>
								</div>
							</div>
						</div> <!-- End of /.col-md-9 -->
					</div> <!-- End of /.block -->
				</div> <!-- End of /.col-md-4 -->


				<?php include_once '../controllers/categoriesController.php' ?>

			</div> <!-- End of /.Container -->
	</section> <!-- End of /.Single-product -->

	<!-- Footer -->
	<?php
	include_once '../include/footer.php';
	?>

	<a id="back-top" href="#"></a>
</body>

</html>