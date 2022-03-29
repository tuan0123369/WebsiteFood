<?php

include_once '../models/DAO/cartDAO.php';
include_once '../models/DTO/cartDTO.php';
include_once '../models/DAO/productsDAO.php';
include_once '../models/DTO/productsDTO.php';
include_once '../models/DTO/categoriesDTO.php';

class cartController
{
    public function getCart($user_id)
    {
        $cartDAO = new cartDAO();
        return $cartDAO->getAllData($user_id);
    }

    public function add2Cart($id_user)
    {
        $cartDAO = new cartDAO();
        if ($cartDAO->getFromCart($_GET['id'], $id_user) == null)
            $cartDAO->insert2Cart($_GET['id'], $id_user);
    }

    public function clearCart($user_id)
    {
        $cartDAO = new cartDAO();
        $cartDAO->deleteAll($user_id);
    }

    public function order_Add($id_order, $id_product, $user_id)
    {
        $cartDAO = new cartDAO();
        $cartDAO->order_Add($id_order, $id_product, $user_id);
    }

    public function getMaxOrder()
    {
        $cartDAO = new cartDAO();
        return $cartDAO->order_Max();
    }

    public function delete_Item($id_product, $user_id)
    {
        $cartDAO = new cartDAO();
        $cartDAO->delete_Item($id_product, $user_id);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case "getCart":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $cartControl = new cartController();
        $itemCart = $cartControl->getCart($user_id);
        break;

    case "add2Cart":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $cartControl = new cartController();
        $cartControl->add2Cart($user_id);
        $itemCart = $cartControl->getCart($user_id);
        include_once '../controllers/productsController.php';
        break;

    case "deleteItem":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $cartControl = new cartController();
        $cartControl->delete_Item($_GET['id'], $user_id);

    case "payment":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $cartControl = new cartController();
        $itemCart = $cartControl->getCart($user_id);
        $list_item = [];
        foreach ($itemCart as $item) {
            $products = new productsDAO();
            $product = $products->getDataProduct($item->getId_product());
            array_push($list_item, $product);
        }
        include_once '../views/cart.php';
        break;

    case "checkout":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $cartControl = new cartController();
        $itemCart = $cartControl->getCart($user_id);
        $list_item = [];
        $total = 0;
        foreach ($itemCart as $item) {
            $quantity = $_POST['quantity' . $item->getId_product()];
            $products = new productsDAO();
            $product = $products->getDataProduct($item->getId_product());
            $product->setPrice($product->getPrice() * $quantity);
            $total = $total + $product->getPrice();
            $item = [];
            array_push($item, $product, $quantity);
            array_push($list_item, $item);
        }
        include_once '../views/checkout.php';
        break;

    case "finish":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];

        $cartControl = new cartController();
        $itemCart = $cartControl->getCart($user_id);
        $max_order = (int)$cartControl->getMaxOrder($user_id)[0]['MAX(id_order)'] + 1;
        foreach ($itemCart as $item) {
            $cartControl->order_Add($max_order, $item->getId_product(), $user_id);
        }
        $cartControl->clearCart($user_id);

        //Gửi email
        $to      = $user_email;
        $subject = 'Đơn hàng Hot&Tasty';
        $message = 'Cảm ơn bạn đã đặt hàng';
        $headers = 'From: Hot&Tasty@gmail.com'       . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        header('Location: ../views/index.php');
        break;
    default:
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $cartControl = new cartController();
        $itemCart = $cartControl->getCart($user_id);
        break;
}
