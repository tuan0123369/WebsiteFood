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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <script type="js/submitformforitemlist.js"></script>
    <script src="https://kit.fontawesome.com/1bc4c0a11a.js" crossorigin="anonymous"></script>
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
            <article class="content items-list-page">
                <div class="title-search-block">
                    <div class="title-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="title"><?php
                                                    foreach ($products as $prd) {
                                                        if ($prd->getCategoryDTO()->getId() == $item) {
                                                            echo $prd->getCategoryDTO()->getCategory_name();
                                                            break;
                                                        }
                                                    }
                                                    ?> <a href="../views/item-editor.php?menu=food&item=<?php echo $item ?>" class="btn btn-primary btn-sm rounded-s"> Thêm món ăn</a>
                                    <!--
				 -->

                                </h3>
                                <p class="title-description"> Danh sách món ăn </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card items">
                    <ul class="item-list striped">
                        <li class="item item-list-header">
                            <div class="item-row">
                                <div class="item-col fixed item-col-check">
                                    <label class="item-check" id="select-all-items">
                                        <input type="checkbox" class="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="item-col item-col-header fixed item-col-img md">
                                    <div>
                                        <span>Hình</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-title">
                                    <div>
                                        <span>Tên</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-title">
                                    <div class="no-overflow">
                                        <span>Mô Tả</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header item-col-date">
                                    <div>
                                        <span>Giá (VND)</span>
                                    </div>
                                </div>
                                <div class="item-col item-col-header fixed item-col-actions-dropdown">
                                </div>
                            </div>
                        </li>

                        <li class="item">
                            <?php
                            foreach ($products as $prd) {
                                if ($prd->getCategoryDTO()->getId() == $item) {
                                    echo '       <div class="item-row">
                                <div class="item-col fixed item-col-check">
                                    <label class="item-check" id="select-all-items">
                                        <input type="checkbox" class="checkbox">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="item-col fixed item-col-img md">
                                    <a>
                                        <div class="item-img rounded" style="background-image: url(../../imgs/';

                                    if ($prd->getImg() == '') {
                                        echo 'producDefault.png';
                                    } else {
                                        echo $prd->getImg();
                                    }
                                    echo '   )">
                                       
                                        </div>
                                    </a>
                                </div>
                                <div class="item-col fixed pull-left item-col-title">
                                    <div class="item-heading"></div>
                                    <div>
                                        <a href="../controller/productsController.php?action=getProduct&id=' . $prd->getId() . '" class="">
                                            <h4 class="item-title"> ' . $prd->getFood_name() . ' </h4>
                                        </a>
                                    </div>
                                </div>
                                <div class="item-col fixed pull-left item-col-title">
                                    <div class="item-heading">Mô tả</div>
                                    <div class="no-overflow">
                                        ' . $prd->getFood_descripsion() . '
                                    </div>
                                </div>
                                <div class="item-col item-col-date">
                                    <div class="item-heading">Giá</div>
                                    <div class="no-overflow"> <span><h5>' . number_format($prd->getPrice())  . ' đ</h5></span> </div>
                                </div>
                                <div class="item-col fixed item-col-actions-dropdown">
                                    <div class="item-actions-dropdown">
                                        <a class="item-actions-toggle-btn">
                                            <span class="inactive">
                                                <i class="fa fa-cog"></i>
                                            </span>
                                            <span class="active">
                                                <i class="fa fa-chevron-circle-right"></i>
                                            </span>
                                        </a>
                                        <div class="item-actions-block">
                                            <ul class="item-actions-list">
                                                <li>
                                                    <a class="remove" href="#" onclick="deletePrd(' . $prd->getId() . ')">
                                                        <i class="fa fa-trash-o "></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="edit" href="../controller/productsController.php?action=getProduct&id=' . $prd->getId() . '">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                                }
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <nav class="text-right">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href=""> Prev </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href=""> 1 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> 2 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> 3 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> 4 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> 5 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> Next </a>
                        </li>
                    </ul>
                </nav>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                    <div class="upload-container">
                                        <div id="dropzone">
                                            <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                <div class="dz-message-block">
                                                    <div class="dz-message needsclick"> Drop files here or click to upload. </div>
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
                            <p>Bạn có muốn xóa?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Có</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
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
    <script>
        function deletePrd(id) {
            if (confirm("Bạn có muốn xóa ?") == true) {
                window.location.replace("../controller/productsController.php?action=delProduct&id=" + id);
            } else {}
        }
    </script>
</body>

</html>