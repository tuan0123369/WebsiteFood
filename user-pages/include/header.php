<head>
	<?php
	if (session_id() === '') {
		session_start();
	}

	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$user_email = $_SESSION['user_email'];
		$admin = $_SESSION['admin'];
	} else {
		$user_id = -1;
	}

	if (isset($_SESSION['message'])) {
		echo '<script>alert("' . $_SESSION['message'] . '")</script>';
		unset($_SESSION['message']);
	}
	?>
</head>
<section id="top">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<p class="contact-action"><i class="fa fa-phone-square"></i>Gọi hỗ trợ, tư vấn <strong>099 8888 888</strong></p>
			</div>
			<div class="col-md-3 clearfix">
				<ul class="login-cart">
					<li>
						<?php
						if ($user_id == -1) {
							echo '
						<a data-toggle="modal" data-target="#myModal" href="#">
							<i class="fa fa-user"></i>
							Đăng nhập
						</a>';
						} else {
							echo '
						<div class="cart dropdown">
							<a data-toggle="dropdown" href="#"><i class="fa fa-user"></i> ' . $user_email . ' </a>
							<div class="dropdown-menu">
								<a href="../controllers/userController.php?action=logout" class="btn"> Đăng xuất</a>
							</div>
						</div>';
						}
						?>
					</li>
					<li>
						<div class="cart dropdown">
							<?php
							if ($user_id == -1) {
								echo '<a data-toggle="modal" data-target="#myModal" href="#">
								<i class="fa fa-shopping-cart"></i> Giỏ hàng </a>';
							} else {
								$action = 'getCart';
								require_once '../controllers/cartController.php';
								echo '
								<a href="../controllers/cartController.php?action=payment">
								<i class="fa fa-shopping-cart"></i> Giỏ hàng ';
								echo  isset($itemCart) ? '(' .  count($itemCart) . ')' : "";
								echo '</a>';
							}
							?>
						</div>
					</li>
				</ul>
			</div>
		</div> <!-- End Of /.row -->
	</div> <!-- End Of /.Container -->

	<!-- MODAL Start
    	================================================== -->



	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Đăng nhập mua sắm dễ dàng</h4>
				</div>
				<div class="modal-body clearfix">
					<form action="../controllers/userController.php" onsubmit="return loginValidate()" method="POST" id="login_form" class="std">
						<fieldset>
							<h3>Đăng nhập</h3>
							<div class="form_content">
								<p class="text">
									<label for="email">Địa chỉ E-mail</label>
									<span><input placeholder="E-mail address" type="email" id="email" name="email" value="" class="account_input"></span>
								</p>
								<p class="text">
									<label for="passwd">Mật Khẩu</label>
									<span><input placeholder="Password" type="password" id="passwd" name="passwd" value="" class="account_input"></span>
								</p>
								<p class="lost_password">
									<a href="#popab-password-reset" class="popab-password-link">Bạn quên mật khẩu?</a>
								</p>
								<div class="col-sm-12">
									<button type="submit" class="btn" value="login" name="action">Đăng nhập</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<a class="btn btn-info" data-toggle="modal" data-target="#createUser" href="#" style="background-color: #42b72a;">Tạo tài khoản mới</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Tham gia cùng chúng tôi</h4>
				</div>
				<div class="modal-body clearfix">
					<form onsubmit="return createUserValidate()" action="../controllers/userController.php" method="POST" id="create-account_form" class="std">
						<fieldset>
							<h3>Tạo tài khoản mới</h3>
							<div class="form_content clearfix">
								<p class="text">
									<label for="email_create">Địa chỉ E-mail</label>
									<span>
										<input placeholder="E-mail address" type="email" id="email_create" name="email_create" value="" class="account_input">
									</span>
								</p>

								<p class="text">
									<label for="passwd_create">Mật Khẩu</label>
									<span><input placeholder="Password" type="password" id="passwd_create" name="passwd_create" value="" class="account_input"></span>
								</p>

								<div class="col-sm-12">
									<button type="submit" class="btn" value="create" name="action">Tạo tài khoản</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="modal-footer">
					<h4>Đăng kí ngay để hưởng ưu đãi mới nhất</h4>
				</div>
			</div>
		</div>
	</div>
</section> <!-- End of /Section -->
<!-- LOGO Start
    ================================================== -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="#">
					<img src="assests/images/logo.png" alt="logo">
				</a>
			</div> <!-- End of /.col-md-12 -->
		</div> <!-- End of /.row -->
	</div> <!-- End of /.container -->
</header> <!-- End of /Header -->

<!-- MENU Start
    ================================================== -->

<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div> <!-- End of /.navbar-header -->

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav nav-main">
				<li><a href="../views/index.php">TRANG CHỦ</a></li>
				<li><a href="../controllers/productsController.php">SẢN PHẨM</a></li>
				<!-- <li><a href="../views/blog.php">BÀI VIẾT</a></li> -->
				<li><a href="../views/contact.php">LIÊN HỆ</a></li>
				<?php
				if ($user_id != -1) {
					echo '
				<li class="dropdown"><a href="#">QUẢN LÍ TÀI KHOẢN <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../controllers/userController.php?action=getProfile">THÔNG TIN CÁ NHÂN</a></li>
						<li><a href="../controllers/orderController.php?action=getData">ĐƠN HÀNG</a></li>';
					if ($admin != 0) {
						echo '
						<li><a href="../../admin-pages/index.php">TRANG QUẢN LÝ</a></li>';
					}
					echo '
					</ul>
				</li>';
				} 
				?>
			</ul> <!-- End of /.nav-main -->
		</div> <!-- /.navbar-collapse -->
	</div> <!-- /.container-fluid -->
</nav> <!-- End of /.nav -->

<script>
	$(document).ready(function() {
		var path = this.location.href.toLowerCase();
		$("ul.nav-main li:first-child").addClass("active");
		$("ul.nav-main li a").each(function() {
			if (path.indexOf((this).href.toLowerCase()) >= 0) {
				$("ul.nav-main li").removeClass("active")
				$(this).parent().addClass("active");
			}
		})
	});

	function createUserValidate() {
		email = document.getElementById('email_create').value;
		pass = document.getElementById('passwd_create').value;
		if (email == '') {
			alert('Email không hợp lệ');
			return false;
		}
		if (pass.length < 8) {
			alert('Mật khẩu phải có ít nhất 8 kí tự');
			return false;
		}
		return true;
	}

	function loginValidate() {
		email = document.getElementById('email').value;
		pass = document.getElementById('passwd').value;
		if (email == '') {
			alert('Email không hợp lệ');
			return false;
		}
		if (pass.length < 8) {
			alert('Mật khẩu phải có ít nhất 8 kí tự');
			return false;
		}
		return true;
	}
</script>