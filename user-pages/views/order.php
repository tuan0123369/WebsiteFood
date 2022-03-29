<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đơn hàng</title>
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


</head>

<style>
    /****** Style Star Rating Widget *****/

    #rating>label {
        border: none;
        font-size: x-large;
        width: 18%;
    }

    /*ẩn input radio*/
    #rating>input[type=radio] {
        display: none;
    }

    #rating>input[type=submit] {
        font-size: 2em;
        background-color: #01BAEF;
        width: 100%;
        border: none;
        color: white;
    }

    /*1 ngôi sao*/
    #rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    /*0.5 ngôi sao*/
    #rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    #rating>label {
        color: #ddd;
        float: right;
    }

    /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
    #rating>input:checked~label,
    #rating:not(:checked)>label:hover,
    #rating:not(:checked)>label:hover~label {
        color: #FFD700;
        margin-top: 5px;
    }

    /* Hover vào các sao phía trước ngôi sao đã chọn*/
    #rating>input:checked+label:hover,
    #rating>input:checked~label:hover,
    #rating>label:hover~input:checked~label,
    #rating>input:checked~label:hover~label {
        color: #FFED85;
    }
</style>

<body>


    <!-- TOP HEADER Start
    ================================================== -->
    <?php include_once '../include/header.php' ?>

    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-9 clearfix">
                    <div class="block">
                        <div class="title">
                            Danh sách đơn hàng
                        </div>



                        <div class="shopping-cart">
                            <!-- Title -->

                            <!-- Product #1 -->
                            <?php
                            $preOder = -1;
                            foreach ($list_order as $order) {
                                if ($order->getId_order() != $preOder) {
                                    $preOder = $order->getId_order();
                                    echo '
                            <div class="item">
                                <div class="images">
                                    <img src="assests/images/favicon.png"  width="100"> </img>
                                </div>

                                <div class="description">
                                    <span>
                                        <H5>Đơn hàng số ' . $order->getId_order() . '</H5>
                                    </span>
                                </div>
                                <div class="quantity">
                                    <H5></H5>
                                </div>

                                <div class="total-price">
                                    <H5></H5>
                                </div>

                            </div>
                            <div class="button text-right">
                                <a class="btn btn-primary" data-target="#review' . $order->getId_order() . '" data-toggle="modal" href="#">Đánh giá</a>
                            </div>';
                                }
                            }

                            ?>


                            <?php
                            $orders = [];
                            foreach ($list_order as $order) {
                                array_push($orders, $order->getId_order());
                            }
                            $list = array_unique($orders);

                            ?>

                            <?php
                            include_once '../models/DAO/productsDAO.php';
                            foreach ($list as $id) {
                                echo '
                            <div class="modal fade" id="review' . $id . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Đánh giá đơn hàng</h4>
                                        </div>
                                        <div class="modal-body clearfix">';
                                foreach ($list_order as $order) {
                                    if ($order->getID_order() == $id) {
                                        $productDAO = new productsDAO();
                                        echo '
                                            <div>
                                                <div class="item">
                                                    <div class="images">
                                                    <img src="../../imgs/';
                                        if ($productDAO->getDataProduct($order->getId_product())->getImg() == '') {
                                            echo 'productDefault.png';
                                        } else {
                                            echo $productDAO->getDataProduct($order->getId_product())->getImg();
                                        }
                                        echo '" alt="" width="120px" style="object-fit: contain; height: 100px"> </img>
                                                    </div>
                                                    <div class="description">
                                                        <span>
                                                            <H5>' . $productDAO->getDataProduct($order->getId_product())->getFood_name() . '</H5>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>';
                                    }
                                }

                                echo '
                                            <hr>
                                            <div>
                                                <form action="../controllers/orderController.php?action=rating&id=' . $id . '" method="GET" id="rating">
                                                    <div id="rating">

                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label class="full" for="star5" title="Tuyệt vời - 5 sao"></label>

                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label class="full" for="star4" title="Khá tốt - 4 sao"></label>

                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label class="full" for="star3" title="Bình thường - 3 sao"></label>

                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label class="full" for="star2" title="Tệ - 2 sao"></label>

                                                        <input type="radio" id="star1" name="rating" value="1" checked />
                                                        <label class="full" for="star1" title="Rất tệ - 1 sao"></label>
                                                    </div>
                                                    <input type="submit" value="Đánh giá" style="float:right;">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                            ?>

                        </div>
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