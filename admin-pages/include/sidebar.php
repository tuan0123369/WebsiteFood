<?php error_reporting(0) ?>
<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div> Hot & Tasty Admin
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <?php
                if (!isset($menu) || $menu == 'home')
                    echo ' <li class="active open">';
                else echo '<li>'; ?>
                <a href="../views/index.php?menu=home&item=-1">
                    <i class="fa fa-home"> </i> Trang chủ
                </a>
                </li>
                <?php
                if ($menu == 'user')
                    echo ' <li class="active open">';
                else echo '<li>'; ?>
                <a href="">
                    <i class="fa fa-table"></i> Quản lí người dùng <i class="fa arrow"></i>
                </a>
                <ul class="sidebar-nav">
                    <li>
                        <a href="../controller/userController.php?menu=user"> Danh sách người dùng </a>
                    </li>
                </ul>
                </li>
                <?php
                if ($menu == 'food')
                    echo ' <li class="active open">';
                else echo '<li>';
                echo '    <a href="">
                                    <i class="fa fa-th-large"></i> Danh mục thức ăn<i class="fa arrow"></i>
                                </a>
                                <ul class="sidebar-nav">';
                foreach ($list_cate as $value) {
                    if ($value->getId() == $item && $menu == 'food') echo ' <li class="active open">';
                    else echo '<li>';
                    echo '<a href=""><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;' . $value->getCategory_name() . ' <i class="fa arrow"></i>
                                        </a>
                                        <ul class="sidebar-nav">
                                            <li><a class="edit" href="../views/itemtittle-editor.php?menu=food&item=' . $value->getId() . '" onclick="<?php $_SESSION[\'menu\']=\'food\' ?>">
                                            <i class="fa fa-pencil"></i>&nbsp&nbsp&nbspChỉnh sửa danh mục </a>
                                            </li>
                                            <li><a class="remove" href="../controller/categoriesController.php?menu=food&item=' . $value->getId() . '&action=delCate"><i
                                                        class="fa fa-trash-o "></i>&nbsp&nbsp&nbspXoá danh mục </a></li>
                                            <li><a href="../controller/productsController.php?item=' . $value->getId() . '&menu=food"><i
                                                        class="fa fa-plus"></i>&nbsp&nbsp&nbspXem chi tiết </a></li>
                                        </ul>
                                    </li>';
                }
                if ($item == -1 && $menu == 'food')
                    echo ' <li class="active open">';
                else echo '<li>'; ?>
                <a href="../views/itemtittle-add.php?menu=food&item=-1"><i class="fa fa-plus"></i> &nbspThêm danh mục </a>
                </li>
            </ul>
            <?php if ($menu == 'recipe')
                echo ' <li class="active open">';
            else echo '<li>'; ?>
            <a href="">
                <i class="fa fa-table"></i> Quản lí đơn hàng <i class="fa arrow"></i>
            </a>
            <ul class="sidebar-nav">
                <li>
                    <a href="../controller/orderController.php?menu=recipe"> Danh sách đơn hàng </a>
                </li>
            </ul>
            </li>

            </ul>
            </li>
            </ul>
        </nav>
    </div>

    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4">
                                </div>
                                <div class="col-4">
                                    <label class="title">fixed</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">static</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Sidebar:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Header:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Footer:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="customize-item">
                            <ul class="customize-colors">
                                <li>
                                    <span class="color-item color-red" data-theme="red"></span>
                                </li>
                                <li>
                                    <span class="color-item color-orange" data-theme="orange"></span>
                                </li>
                                <li>
                                    <span class="color-item color-green active" data-theme=""></span>
                                </li>
                                <li>
                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                </li>
                                <li>
                                    <span class="color-item color-blue" data-theme="blue"></span>
                                </li>
                                <li>
                                    <span class="color-item color-purple" data-theme="purple"></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <a href="">
                    <i class="fa fa-cog"></i> Customize </a>
            </li>
        </ul>
    </footer>
</aside>