<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Thông tin liên hệ</title>
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
	<script src="https://kit.fontawesome.com/1bc4c0a11a.js" crossorigin="anonymous"></script>


</head>
<style>
	.ads {
		float: right;
		max-width: 30%;
		min-width: 15%;
		object-fit: contain;
	}
</style>

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
							Thông tin liên hệ
						</span>
					</h1>
					<h1 class="subtittle">
					</h1>
					<div class="block">
						<div class="">
							<b class="name ng-binding">Food Code d.o.o.</b>
						</div>
						<div class="">
							<i class="fas fa-map-marker"></i>
							<b>Địa chỉ:</b>180 Cao Lỗ, Phường 4, Quận 8, TPHCM
						</div>
						<div class="">
							<i class="fas fa-phone"></i>
							<b>Điện thoại:</b> (+386) 40 123 456
						</div>
						<div class="">
							<i class="fas fa-mobile"></i>
							<b>Hotline</b> (+386) 40 654 123 651
						</div>
						<div class="">
							<i class="fas fa-fax"></i>
							<b>Fax:</b> (08) 85 85 66 38
						</div>
						<div class="">
							<i class="fas fa-envelope"></i>
							<a href="mailto:info@runtime.vn" class="ng-binding">anhvucongtuan@gmail.com</a>
						</div>
					</div>
					<hr class="">
					<h3 class="title">Gửi thông tin liên hệ</h3>
					<div class="">
						Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
						sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
					</div>
					<div>
						<div><img src="assests/images/favicon.png" class="ads"></div>
						<div class="contact-feedback">
							<form ng-submit="sendContact()" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fas fa-user"></i></span>
									<input type="text" placeholder="Họ tên" ng-model="Name" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
									<input type="text" placeholder="Địa chỉ" ng-model="Address" class="form-control ng-pristine ng-untouched ng-valid">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fas fa-envelope"></i></span>
									<input type="email" placeholder="Email" ng-model="Email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" required="">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fas fa-phone-square"></i></span>
									<input type="text" placeholder="Điện thoại" ng-model="Phone" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fas fa-pen"></i></span>
									<input type="text" placeholder="Tiêu đề" ng-model="Title" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
								</div>
								<div class="form-group">
									<textarea placeholder="Nội dung" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" rows="3" ng-model="Content" required=""></textarea>
								</div>
								<a href="" class="btn btn-default btn-transparent pull-right" role="button">
									<span>Gửi</span>
								</a>
							</form>
						</div>
					</div>
				</div> <!-- End of /.col-md-9 -->

				<?php
				include_once '../controllers/categoriesController.php';
				?>

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