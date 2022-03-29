<?php


include_once '../models/DAO/categoriesDAO.php';
include_once '../models/DTO/categoriesDTO.php';

class categoriesController
{
    public function getCate()
    {
        $cate_DAO = new categoriesDAO();
        $list_cate = $cate_DAO->getAllData();
        include_once '../include/sidebar.php';
    }
}


$product = new categoriesController();
$product->getCate();
