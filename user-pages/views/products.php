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
	<script src="assests/js/product.js" type="text/javascript"></script>

	<?php
	require '../data/food_list.php';
	?>
</head>

<body>


	<!-- TOP HEADER Start
    ================================================== -->
	<?php include_once '../include/header.php' ?>





	<section id="topic-header">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Danh sách sản phẩm</h1>
					<p></p>
				</div> <!-- End of /.col-md-4 -->
			</div> <!-- End of /.row -->
		</div> <!-- End of /.container -->
	</section> <!-- End of /#Topic-header -->



	<!-- PRODUCTS Start
    ================================================== -->

	<section id="shop">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="block-heading">
						<h2>
							<?php
							isset($_GET['item']) ? ($item = $_GET['item']) : ($item = 1);
							foreach ($products as $product)
								if ($product->getCategoryDTO()->getId() == $item) {
									echo $product->getCategoryDTO()->getCategory_name();
									break;
								}
							?>
						</h2>
					</div> <!-- End of /.Products-heading -->
					<div class="product-grid">
						<ul>
							<?php
							foreach ($products as $product) {
								if ($product->getCategoryDTO()->getId() == $item) {
									echo '<li>
								<div class="products" >
									<a href="productsController.php?item=' . $product->getCategoryDTO()->getId() . '&id=' . $product->getId() . '&action=getSingleData">
									<img src="../../imgs/';
									if ($product->getImg() == '') {
										echo 'productDefault.png';
									} else {
										echo $product->getImg();
									}
									echo '" alt="" width="250px" style="object-fit: contain; height: 250px"></img>
									</a>
									
										<h4 name="sp">' . $product->getFood_name() . '</h4>
									
									<p class="price" name="price">' . number_format($product->getPrice()) . 'đ</p>
									<div>';
									if ($user_id == -1) {
										echo '
										<a class="view-link shutter" data-toggle="modal" data-target="#myModal" href="#">';
									} else {
										echo '
										<a class="view-link shutter" href="../controllers/cartController.php?id=' . $product->getId() . '&action=add2Cart&item=' . $product->getCategoryDTO()->getId() . '" >';
									}
									echo '	<i class="fa fa-plus-circle" ></i>Thêm vào giỏ hàng</a>
									</div>
								</div>
								</li>';
								}
							}
							?>
							<!--  ... -->
						</ul>
					</div> <!-- End of /.products-grid -->

					<!-- Pagination -->

					<!-- <div class="pagination-bottom">
						<ul class="pagination">
							<li class="disabled"><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1 <span class="sr-only"></span></a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">»</a></li>
						</ul> 
						</div><!-- End of /.pagination -->

				</div>

				<?php
				include_once '../controllers/categoriesController.php'
				?>


			</div> <!-- End of /.container -->
	</section> <!-- End of Section -->

	<!-- Footer -->
	<?php
	include_once '../include/footer.php';
	?>

	<a id="back-top" href="#"></a>
</body>

</html>