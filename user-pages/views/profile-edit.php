<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Thông tin cá nhân</title>
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
	include_once '../include/header.php'
	?>





	<!-- Breadcrumbs Start
    ================================================== -->

	<section id="blog">
		<div class="container">
			<!-- Breadcrumb -->
			<nav aria-label="breadcrumb" class="main-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item"><a href="profile.php">Thông tin cá nhân</a></li>
					<li class="breadcrumb-item"><a href="javascript:void(0)">Sửa thông tin cá nhân</a></li>
				</ol>
			</nav>
			<!-- /Breadcrumb -->
			<div class="main-body">
				<div class="row">
					<form action="#" method="post" onsubmit="return checkPass()" enctype="multipart/form-data">
						<div class="col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-column align-items-center text-center">
										<img src="../../imgs/<?php if ($user_prf->getImg() == '') {
																echo 'avatarDefault.png';
															} else echo $user_prf->getImg(); ?>" alt="Admin" class="rounded-circle" width="150">
										<div class="mt-3">
											<h4><?php echo $user_prf->getUser_name(); ?></h4>
											<input type="file" name="img" id="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Họ Tên</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" value="<?php echo $user_prf->getUser_name(); ?>" name="userName" id="userName">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Email</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" value="<?php echo $user_prf->getEmail(); ?>" readonly name="email">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Số điện thoại</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="number" class="form-control" value="<?php echo $user_prf->getPhone(); ?>" name="phone">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Địa chỉ</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<input type="text" class="form-control" value="<?php echo $user_prf->getAddress(); ?>" name="address" id="address">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-sm-3">
											<h6 class="mb-0">Mật khẩu</h6>
										</div>
										<div class="col-sm-9 text-secondary">
											<a data-toggle="modal" data-target="#changePass" href="#"><span> Thay đổi mật khẩu</span> </a>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3"></div>
										<div class="col-sm-9 text-secondary">
											<button type="submit" class="btn btn-primary px-4" value="editUser" name="action">Lưu thay đổi</button>
										</div>
									</div>

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Thay đổi mật khẩu</h4>
					</div>
					<div class="modal-body clearfix">
						<form action="../controllers/userController.php" onsubmit="return passValidate()" method="POST" id="login_form" class="std">
							<fieldset>
								<h3></h3>
								<div class="form_content">
									<p class="text">
										<label for="passwd">Mật khẩu cũ</label>
										<span><input placeholder="Mật khẩu cũ" type="password" id="passwd1" name="passwd1" value="" class="account_input"></span>
									</p>
									<p class="text">
										<label for="passwd">Mật khẩu mới</label>
										<span><input placeholder="Mật khẩu mới" type="password" id="passwd2" name="passwd2" value="" class="account_input"></span>
									</p>
									<p class="text">
										<label for="passwd">Xác nhận mật khẩu</label>
										<span><input placeholder="Xác nhận mật khẩu" type="password" id="passwd3" name="" value="" class="account_input"></span>
									</p>

									<div class="col-sm-12">
										<button type="submit" class="btn" value="editPasswd" name="action">Thay đổi mật khẩu</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- End of /#Blog -->
	<script>
		function passValidate() {
			pass1 = document.getElementById('passwd1').value;
			pass2 = document.getElementById('passwd2').value;
			pass3 = document.getElementById('passwd3').value;
			if (pass1.length < 8) {
				alert('Mật khẩu phải có ít nhất 8 kí tự');
				return false;
			} else if (pass2.length < 8) {
				alert('Mật khẩu phải có ít nhất 8 kí tự');
				return false;
			} else if (pass2 != pass3) {
				alert('Mật khẩu nhập lại không khớp');
				return false;
			}
			return true;
		}
	</script>







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
<script>
	function checkPass() {
		userName = document.getElementById('userName').value;
		address = document.getElementById('address').value;

		pattern = /^[^a-z][^A-Z]\S$/;
		pattern2 = /^\W\S$/;
		if (userName.match(pattern)) {
			alert('Họ tên chỉ chứa chữ');
			return false;
		} else if (address.match(pattern2)) {
			alert('Địa chỉ bao gồm kí tự chữ và số');
			return false;
		}
		return true;
	}
</script>