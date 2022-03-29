<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Hot & Tasty Admin page </title>
    <link rel="shortcut icon" type="image/png" href="assets/icon/favicon.png">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="css/vendor.css">
    <!-- Theme initialization -->
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};
        var themeName = themeSettings.themeName || '';
        if (themeName) {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        } else {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
    <script type="js/scriptt.js"></script>
    <link rel="stylesheet" type="text/css" href="../">
    <script src="https://kit.fontawesome.com/1bc4c0a11a.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <?php
    include_once '../include/sidebar_controler.php'
    ?>
</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app">

            <?php
            include_once '../include/header.php';
            include_once '../controller/categoriesController.php';
            ?>
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Món ăn <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                <form name="itemFood" method="POST" onsubmit="return formFood_Validate();" action="../controller/productsController.php<?php if (isset($prd)) {
                                                                                                                                            echo '?id=' . $prd->getId();
                                                                                                                                        } else {
                                                                                                                                            echo '';
                                                                                                                                        } ?>" enctype="multipart/form-data">
                    <div class="card card-block">
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Tên món ăn: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control boxed" placeholder="Nhập tên món" name="title" value="<?php if (isset($prd)) {
                                                                                                                                    echo $prd->getFood_name();
                                                                                                                                } else {
                                                                                                                                    echo '';
                                                                                                                                } ?>">
                                <span class="has-warning" id="title-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Mô tả: </label>
                            <div class="col-sm-10">
                                <div class="wyswyg">
                                    <textarea name="decripsion" rows="5" class="form-control boxed" placeholder="Nhập nội dung"><?php if (isset($prd)) {
                                                                                                                                    echo $prd->getFood_descripsion();
                                                                                                                                } else {
                                                                                                                                    echo '';
                                                                                                                                } ?></textarea>
                                </div>
                                <span class="has-warning" id="decripsion-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Giá: </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control boxed" name="price" placeholder="VND" min="0" value="<?php if (isset($prd)) {
                                                                                                                                    echo $prd->getPrice();
                                                                                                                                } else {
                                                                                                                                    echo '';
                                                                                                                                } ?>">
                                <span class="has-warning" id="price-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Đính kèm ảnh: </label>
                            <input type="file" name="img">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name="action" value="<?php if (isset($prd)) {
                                                                                                        echo 'editProduct';
                                                                                                    } else {
                                                                                                        echo 'insertProduct';
                                                                                                    } ?>"> Đăng món ăn </button>
                                <button type="button" class="btn btn-secondary-outline" name=""><a href="../controller/productsController.php" style="text-decoration: none;"> Quay lại </a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </article>
            <footer class="footer">
                <div class="footer-block buttons">
                </div>
                <div class="footer-block author">
                </div>
            </footer>
            <div class="modal fade" id="modal-media">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Media Library</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body modal-tab-container">
                            <ul class="nav nav-tabs modal-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                </li>
                            </ul>
                            <div class="tab-content modal-tab-content">
                                <div class="tab-pane fade" id="gallery" role="tabpanel">
                                    <div class="images-container">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                    <div class="upload-container">
                                        <div id="dropzone">
                                            <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                <div class="dz-message-block">
                                                    <div class="dz-message needsclick"> Drop files here or click to
                                                        upload. </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Insert Selected</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="modal fade" id="confirm-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to do this?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
    <!-- Reference block for JS -->
    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-80463319-4', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="js/vendor.js"></script>
    <script src="js/app.js"></script>
    <script src="js/formValidate.js"></script>
</body>

</html>