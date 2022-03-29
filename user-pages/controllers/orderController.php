<?php
include_once '../models/DAO/orderDAO.php';
include_once '../models/DTO/orderDTO.php';

class orderController
{
    public function getAllData($user_id)
    {
        $orderDAO = new orderDAO();
        return $orderDAO->getAllData($user_id);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case "getData":
        if (session_id() === '') {
            session_start();
        }
        $user_id = $_SESSION['user_id'];

        $order = new orderController();
        $list_order = $order->getAllData($user_id);
        include_once '../views/order.php';
        break;
    default:
        include_once '../views/index.php';
        echo '<script>alert("Cảm ơn bạn đã đánh giá\n Bạn đã đánh giá ' . $_GET['rating'] . ' sao")</script>';
        break;
}
