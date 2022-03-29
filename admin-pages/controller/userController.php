<?php

use userControler as GlobalUserControler;

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

    public function createUser($email, $passwd, $user_name, $img, $phone, $address, $admin)
    {
        $user = new userDAO();
        $message = $user->createUser($email, $passwd, $user_name, $img, $phone, $address, $admin);
        return $message;
    }

    public function getAllUser()
    {
        $user = new userDAO();
        return $user->getAllUser();
    }

    public function getUserProfile($user_id)
    {
        $user = new userDAO();
        $user_prf = $user->getUserProfile($user_id);
        return $user_prf;
    }

    public function editUser($user_id, $user_name, $img, $phone, $address, $admin)
    {
        $user = new userDAO();
        $user->editUser($user_id, $user_name, $img, $phone, $address, $admin);
    }

    public function editPasswd($user_id, $pass)
    {
        $user = new userDAO();
        $user->editpasswd($user_id, $pass);
    }

    public function delUser($id)
    {
        $user = new userDAO();
        $user->delUser($id);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($_POST['action']) ? $action = $_POST['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case 'create':
        if (session_id() === '') {
            session_start();
        }
        $img = $_FILES['img'];
        $message = imgUpload::uploadFile($img);
        if ($message == '') {
            $email = $_POST['email'];
            $user_name = $_POST['userName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if (isset($_POST['admin']))
                $admin = $_POST['admin'];
            else $admin = 0;
            $passwd = $_POST['passwd'];
            $userControler = new userControler();
            $message = $userControler->createUser($email, $passwd, $user_name, $img['name'], $phone, $address, $admin);
        }
        if ($message == '') {
            $message = "Tạo tài khoản thành công";
            $_SESSION['message'] = $message;
            header('Location: ../controller/userController.php');
            exit();
        } else {
            $message = "Tài khoản đã tồn tại";
            $_SESSION['message'] = $message;
            include_once '../views/user-editor.php';
        }
        break;

    case 'login':
        $email = $_POST['email'];
        $pass = $_POST['passwd'];
        $userControler = new userControler();
        $user = $userControler->getUser($email, $pass);
        if (session_id() === '') {
            session_start();
        }
        if ($user == '' || $user->getAdministrator() == 0) {
            $message = "Wrong_userName_or_pass";
            setcookie("message", $message, time() + 600, "/");
            header('Location: ../views/login.html');
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
        header('Location: ../views/login.html');
        exit();
        break;

    case 'getUser':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_GET['id'];
        $userControler = new userControler();
        $user_prf = $userControler->getUserProfile($user_id);
        include_once '../views/user-editor.php';
        break;

    case 'editUser':
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_GET['id'];
        $img = $_FILES['img'];
        $message = imgUpload::uploadFile($img);
        if ($message == '') {
            $user_name = $_POST['userName'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $admin = $_POST['admin'];
            $userControler = new userControler();
            $user = $userControler->editUser($user_id, $user_name, $img['name'], $phone, $address, $admin);

            $_SESSION['message'] = "Cập nhập thành công";
            header('Location: ../controller/userController.php');
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
        $user_id = $_GET['id'];
        $pass = $_POST['passwd'];
        $userControler = new userControler();
        $userControler->editPasswd($user_id, $pass);
        $_SESSION['message'] = "Đổi mật khẩu thành công";
        header('Location: ../controller/userController.php');
        break;

    case "delUser":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_GET['id'];
        $userControler = new userControler();
        $userControler->delUser($user_id);
        $_SESSION['message'] = "Xóa thành công";
        header('Location: ../controller/userController.php');
        break;

    default:
        $userControler = new userControler();
        $list_user = $userControler->getAllUser();
        include_once '../views/user-list.php';
        break;
}
