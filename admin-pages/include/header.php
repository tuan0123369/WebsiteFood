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
        header('Location: ../views/login.html');
    }

    if (isset($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '")</script>';
        unset($_SESSION['message']);
    }

    include_once '../include/food_controler.php';

    ?>
</head>

<header class="header">
    <div class="header-block header-block-collapse d-lg-none d-xl-none">
        <button class="collapse-btn" id="sidebar-collapse-btn">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            <li class="profile dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')">
                    </div>
                    <span class="name"> <?php echo $user_email ?> </span>
                </a>
                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="../../user-pages/index.php">
                        <i class="fa fa-group"></i> Trang người dùng </a>
                    <a class="dropdown-item" href="../controller/userController.php?action=logout">
                        <i class="fa fa-power-off icon"></i>   Đăng xuất </a>
                </div>
            </li>
        </ul>
    </div>
</header>