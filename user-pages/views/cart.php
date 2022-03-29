<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
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
    <script src="assests/js/cartbutton.js"></script>


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
                    <div class="block">
                        <form action="../controllers/cartController.php?action=checkout" method="POST">
                            <div class="shopping-cart">
                                <!-- Title -->

                                <div class="title">
                                    Chi tiết giỏ hàng
                                </div>
                                <div class="item">
                                    <div class="images">

                                    </div>

                                    <div class="description">
                                        <span>
                                            <H5>Tên sản phẩm</H5>
                                        </span>
                                    </div>
                                    <div class="quantity">

                                        <span>
                                            <H5>Số lượng</H5>
                                        </span>

                                    </div>
                                    <div class="total-price">
                                        <H5>Đơn giá (VND)</H5>
                                    </div>
                                    <div class="buttons">

                                    </div>
                                </div>
                                <?php
                                foreach ($list_item as $product) {
                                    echo '
                                <!-- Product #1 -->
                                <div class="item">
                                    <div class="images">
                                        <img src="../../imgs/';
                                    if ($product->getImg() == '') {
                                        echo 'productDefault.png';
                                    } else {
                                        echo $product->getImg();
                                    }
                                    echo '"width="120" style="object-fit: contain; height: 80px" alt=""></img>
                                    </div>

                                    <div class="description">
                                        <span>
                                            <H5>' . $product->getFood_name() . '</H5>
                                        </span>
                                    </div>
                                    <div class="quantity">

                                        <input type="number" name="quantity' . $product->getId() . '" id="value1" value="1" style="width: 3em;" oninput="this.value = Math.abs(this.value)" min="1">

                                    </div>
                                    <div class="total-price">
                                        <H5>' . number_format($product->getPrice()) . ' đ</H5>
                                    </div>
                                    <div class="buttons">
                                        <a href="../controllers/cartController.php?action=deleteItem&id=' . $product->getId() . '">
                                        <span class="delete-btn"><i class="fa fa-trash"></i></span></a>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                            <div class="Cartcautio">
                                Kiểm tra số lượng trước khi thanh toán nhé
                            </div>
                            <hr>
                            <!-- <p style="float: right;">Tổng số tiền <span class="price" style="color:black"><b>12600$</b></span></p> -->
                            <div class="button text-right">
                                <input type="submit" value="Tiến hành thanh toán" class="btn btn-default">
                                <a class="btn btn-default" href="../index.php" onclick="window.history.back()">Tiếp tục mua hàng</a>
                            </div>
                        </form>
                    </div>
                    <hr class="">
                    <div class="description">
                    </div>
                </div>
                <!-- End of /.col-md-9 -->
            </div>
            <!-- End of /.blog-sidebar -->
        </div>
        <!-- End of /.col-md-3 -->
        </div>
        <!-- End of /.row -->
        </div>
        <!-- End of /.container -->
    </section>
    <!-- End of /#Blog -->




    <!-- Footer -->
    <?php
    include_once '../include/footer.php';
    ?>

    <a id="back-top" href="#"></a>
</body>

</html>


<style>
    .ads {
        float: right;
        margin-right: 6px;
        background-image: "../assests/images/ food - adss.jpg";
        width: 50%;
        max-width: 30%;
        min-width: 15%;
        height: 252px;
        overflow: hidden;
    }
</style>

<script>
    function itemUp(name) {
        var item = document.getElementById(name).value;
        value = item - 1 + 2;
        document.getElementById(name).value = value;
    }

    function itemDown(name) {
        var item = document.getElementById(name).value;
        if (item > 1) {
            value = item - 1;
            document.getElementById(name).value = value;
        }
    }

    function totalPriceItem() {

    }
</script>