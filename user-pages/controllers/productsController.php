<?php

include_once '../models/DAO/productsDAO.php';
include_once '../models/DTO/productsDTO.php';

class productsController
{
    public function getFood()
    {
        $productDAO = new productsDAO();
        return $productDAO->getAllData();
    }
    public function getSingleFood()
    {
        $productDAO = new productsDAO();
        return $productDAO->getDataProduct($_GET['id']);
    }
}

isset($_GET['action']) ? $action = $_GET['action'] : '';
isset($action) ? $action : $action = -1;
switch ($action) {
    case "getData":
        $product = new productsController();
        $products = $product->getFood();
        break;
    case "getSingleData":
        $product = new productsController();
        $product = $product->getSingleFood();
        include_once '../views/single-product.php';
        break;
    default:
        $product = new productsController();
        $products = $product->getFood();
        include_once '../views/products.php';
        break;
}
