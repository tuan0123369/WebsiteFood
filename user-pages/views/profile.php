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
      <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Thông tin cá nhân</a></li>
          </ol>
        </nav>
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="../../imgs/<?php if ($user_prf->getImg() == '') {
                    echo 'avatarDefault.png';
                  } else echo $user_prf->getImg(); ?>" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?php echo $user_prf->getuser_name(); ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Họ Tên</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $user_prf->getUser_name(); ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $user_prf->getEmail(); ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Số điện thoại</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $user_prf->getPhone(); ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Địa chỉ</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $user_prf->getAddress(); ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <a class="btn btn-info " target="_self" href="../controllers/userController.php?action=editProfile">Chỉnh sửa thông tin</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </li>
    </ul> <!-- End of /.blog-zone -->


    </div> <!-- End of /.col-md-9 -->

    </div> <!-- End of /.row -->
    </div> <!-- End of /.container -->
  </section> <!-- End of /#Blog -->








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