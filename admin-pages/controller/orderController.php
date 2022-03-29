<?php
include_once '../models/DAO/orderDAO.php';
include_once '../models/DTO/orderDTO.php';
include_once '../models/DAO/productsDAO.php';
include_once '../models/DAO/userDAO.php';

class orderController
{
    public function getAllData($user_id)
    {
        $orderDAO = new orderDAO();
        return $orderDAO->getAllData($user_id);
    }

    public function getAllDatas(){
        $orderDAO = new orderDAO();
        return $orderDAO->getAllDatas();
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($_POST['action']) ? $action = $_POST['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case "recipeDetail":
        $order = new orderController();
        $list_order = $order->getAllDatas();
        include_once '../views/recipe-detail.php';
        break;

    default:
        $order = new orderController();
        $list_order = $order->getAllDatas();
        include_once '../views/recipe-list.php';
        break;
}
