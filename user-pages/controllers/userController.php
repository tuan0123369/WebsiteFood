<?php

include_once '../models/DAO/userDAO.php';
include_once '../models/DTO/userDTO.php';
include_once '../models/untils/imgUpload.php';

class userControler
{
    public function getUser($email, $pass)
    {
        $user = new userDAO();
        return $user->getUser($email, $pass);
    }

    public function createUser($email, $pass)
    {
        $user = new userDAO();
        $message = $user->createUser($email, $pass);
        return $message;
    }

    public function getUserProfile($user_id)
    {
        $user = new userDAO();
        $user_prf = $user->getUserProfile($user_id);
        return $user_prf;
    }

    public function editUser($user_id, $user_name, $img, $phone, $address)
    {
        $user = new userDAO();
        $user->editUser($user_id, $user_name, $img, $phone, $address);
    }

    public function editPasswd($user_id, $pass)
    {
        $user = new userDAO();
        $user->editpasswd($user_id, $pass);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($_POST['action']) ? $action = $_POST['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case 'create':
        $userControler = new userControler();
        $email = $_POST['email_create'];
        $pass = $_POST['passwd_create'];
        $message = $userControler->createUser($email, $pass);
        if ($message == '') {
            $message = "Tạo tài khoản thành công";
        } else $message = "Tài khoản đã tồn tại";
        if (session_id() === '') {
            session_start();
        }
        $_SESSION['message'] = $message;
        header('Location: ../index.php');
        exit();
        break;

    case 'login':
        $email = $_POST['email'];
        $pass = $_POST['passwd'];
        $userControler = new userControler();
        $user = $userControler->getUser($email, $pass);
        if (session_id() === '') {
            session_start();
        }
        if ($user == '') {
            $message = "Sai tên đăng nhập hoặc mật khẩu";
            $_SESSION['message'] = $message;
            header('Location: ../index.php');
            exit();
        } else {
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_email'] = $user->getEmail();
            $_SESSION['admin'] = $user->getAdministrator();
            $message = "Đăng nhập thành công";
            $_SESSION['message'] = $message;
            header('Location: ../index.php');
            exit();
        }
        break;

    case 'logout':
        if (session_id() === '') {
            session_start();
        }
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        $message = "Đăng xuất thành công";
        $_SESSION['message'] = $message;
        header('Location: ../index.php');
        exit();
        break;

    case 'getProfile':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $userControler = new userControler();
        $user_prf = $userControler->getUserProfile($user_id);
        include_once '../views/profile.php';
        break;

    case 'editProfile':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $userControler = new userControler();
        $user_prf = $userControler->getUserProfile($user_id);
        include_once '../views/profile-edit.php';
        break;

    case 'editUser':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $img = $_FILES['img'];
        $message = imgUpload::uploadFile($img);
        if ($message == '') {
            $user_name = $_POST['userName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $userControler = new userControler();
            $user = $userControler->editUser($user_id, $user_name, $img['name'], $phone, $address);

            $user_prf = $userControler->getUserProfile($user_id);
            include_once '../views/profile.php';
        } else {
            $_SESSION['message'] = $message;
            $userControler = new userControler();
            $user_prf = $userControler->getUserProfile($user_id);
            include_once '../views/profile-edit.php';
        }
        break;

    case 'editPasswd':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $oldPass = md5($_POST['passwd1']);
        $userControler = new userControler();
        $user_prf = $userControler->getUserProfile($user_id);
        if ($oldPass == $user_prf->getPassword()) {
            $newPass = $_POST['passwd2'];
            $userControler->editPasswd($user_id, $newPass);
            $_SESSION['message'] = "Đổi mật khẩu thành công";
            include_once '../views/profile-edit.php';
        } else {
            $_SESSION['message'] = "Mật khẩu cũ không đúng";
            include_once '../views/profile-edit.php';
        }
        break;
}
