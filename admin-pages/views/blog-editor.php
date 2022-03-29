<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include_once '../include/sidebar_controler.php'; ?>
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


</head>

<body>
    <div class="main-wrapper">
        <div class="app" id="app">
            <header class="header">
                <div class="header-block header-block-collapse d-lg-none d-xl-none">
                    <button class="collapse-btn" id="sidebar-collapse-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="header-block header-block-search">
                    <form role="search">
                        <div class="input-container">
                            <i class="fa fa-search"></i>
                            <input type="search" placeholder="Search">
                            <div class="underline"></div>
                        </div>
                    </form>
                </div>
                <div class="header-block header-block-nav">
                    <ul class="nav-profile">
                        <li class="notifications new">
                            <a href="" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <sup>
                                    <span class="counter">8</span>
                                </sup>
                            </a>
                            <div class="dropdown-menu notifications-dropdown-menu">
                                <ul class="notifications-container">
                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="img-col">
                                                <div class="img" style="background-image: url('assets/faces/3.jpg')">
                                                </div>
                                            </div>
                                            <div class="body-col">
                                                <p>
                                                    <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>.
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="img-col">
                                                <div class="img" style="background-image: url('assets/faces/5.jpg')">
                                                </div>
                                            </div>
                                            <div class="body-col">
                                                <p>
                                                    <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>.
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="notification-item">
                                            <div class="img-col">
                                                <div class="img" style="background-image: url('assets/faces/8.jpg')">
                                                </div>
                                            </div>
                                            <div class="body-col">
                                                <p>
                                                    <span class="accent">Andy Nouman</span> deployed new version of
                                                    <span class="accent">NodeJS REST Api V3</span>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer>
                                    <ul>
                                        <li>
                                            <a href=""> View All </a>
                                        </li>
                                    </ul>
                                </footer>
                            </div>
                        </li>
                        <li class="profile dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')">
                                </div>
                                <span class="name"> John Doe </span>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-user icon"></i> Profile </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-bell icon"></i> Notifications </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-gear icon"></i> Settings </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html">
                                    <i class="fa fa-power-off icon"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <!-- sidebar start -->
            <?php
            include_once '../include/sidebar.php';
            ?>
            <!-- sidebar end -->
            <div class="sidebar-overlay" id="sidebar-overlay"></div>
            <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
            <div class="mobile-menu-handle"></div>
            <article class="content item-editor-page">
                <div class="title-block">
                    <h3 class="title"> Bài viết <span class="sparkline bar" data-type="bar"></span>
                    </h3>
                </div>
                <form name="itemBlog" method="POST" onsubmit="return formBlog_Validate();" action="../include/blog_controler.php">
                    <div class="card card-block">
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Tiêu đề: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control boxed" placeholder="Nhập tiêu đề" name="title" value="<?php if ($id < count($blog_list)) echo $blog_list[$id]['title']; ?>">
                                <span class="has-warning" id="title-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Nội dung: </label>
                            <div class="col-sm-10">
                                <div class="wyswyg">
                                    <textarea name="content" rows="5" class="form-control boxed" placeholder="Nhập nội dung"><?php if ($id < count($blog_list)) echo $blog_list[$id]['content']; ?></textarea>
                                </div>
                                <span class="has-warning" id="content-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row has-warning">
                            <label class="col-sm-2 form-control-label text-xs-right"> Tác giả: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control boxed" name="author" placeholder="Nhập tác giả bài viết" value="<?php if ($id < count($blog_list)) echo $blog_list[$id]['author']; ?>">
                                <span class="has-warning" id="author-warning"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 form-control-label text-xs-right"> Đính kèm ảnh: </label>
                            <div class="col-sm-10">
                                <div class="images-container">
                                    <div class="image-container">
                                        <div class="controls">
                                            <a href="" class="control-btn move">
                                                <i class="fa fa-arrows"></i>
                                            </a>
                                            <a href="" class="control-btn star">
                                                <i class="fa"></i>
                                            </a>
                                            <a href="#" class="control-btn remove" data-toggle="modal" data-target="#confirm-modal">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                        <div class="image" style="background-image:url('https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg')">
                                        </div>
                                    </div>
                                    <a href="#" class="add-image" data-toggle="modal" data-target="#modal-media">
                                        <div class="image-container new">
                                            <div class="image">
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary" name=""> Đăng bài viết </button>
                                <button type="button" class="btn btn-secondary-outline" name=""><a href="blog-list.php" style="text-decoration: none;"> Quay lại </a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </article>
            <footer class="footer">
                <div class="footer-block buttons">
                    <!-- <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe> -->
                </div>
                <div class="footer-block author">
                    <ul>
                        <li> created by <a href="https://github.com/modularcode">ModularCode</a>
                        </li>
                        <li>
                            <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a>
                        </li>
                    </ul>
                </div>
            </footer>
            <div class="modal fade" id="modal-media">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Thư viện ảnh</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <div class="modal-body modal-tab-container">
                            <ul class="nav nav-tabs modal-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link in active" href="#gallery" data-toggle="tab" role="tab">Thư viện</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#upload" data-toggle="tab" role="tab">Tải lên</a>
                                </li>
                            </ul>
                            <div class="tab-content modal-tab-content">
                                <div class="tab-pane fade in active show" id="gallery" role="tabpanel">
                                    <div class="images-container">
                                        <div class="row">
                                            <div class="col-6 col-sm-4 col-md-4 col-lg-3">
                                                <div class="image-container">
                                                    <div class="image" style="background-image:url('assets/demo.png')">
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
                                <div class="tab-pane fade in" id="upload" role="tabpanel">
                                    <div class="upload-container">
                                        <div id="dropzone">
                                            <form action="/" onsubmit="" name="imgUpload" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                <div class="dz-message-block">
                                                    <div class="dz-message needsclick"> Thả file hoặc click vào để tải ảnh lên </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary" onclick="getImg();">Tải ảnh lên</button>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="modal fade" id="confirm-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-warning"></i> Cảnh báo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Bạn có chắc muốn xóa?</p>
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
    <script src="js/formValidate.js"></script>
</body>

</html>