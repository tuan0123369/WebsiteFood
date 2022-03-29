<?php

include_once '../database/config.php';
include_once '../models/DTO/productsDTO.php';
include_once '../models/DTO/categoriesDTO.php';

class productsDAO
{
    private $dbConn;

    public function getAllData()
    {
        $dbConn = new configuration();
        $query = 'select products.id,img,food_name,food_description,price,id_cate,categories.category_name from products JOIN categories on products.id_cate=categories.id ORDER BY id DESC';
        $param = array();
        $data = $dbConn->getData($query, $param);
        $listProduct = [];
        foreach ($data as $product) {
            $categoryDTO = new categoriesDTO($product['id_cate'], $product['category_name']);
            $listProduct[] = new productsDTO($product['id'], $product['img'], $product['food_name'], $product['food_description'], $product['price'], $categoryDTO);
        }
        return $listProduct;
    }


    public function getDataProduct($product_Id)
    {
        $dbConn = new configuration();
        $query = 'select products.id,img,food_name,food_description,price,id_cate,categories.category_name from products JOIN categories on products.id_cate=categories.id where products.id=:id';
        $param = array(':id' => $product_Id);
        $data = $dbConn->getData($query, $param);
        foreach ($data as $product) {
            $categoryDTO = new categoriesDTO($product['id_cate'], $product['category_name']);
            $dataValue = new productsDTO($product['id'], $product['img'], $product['food_name'], $product['food_description'], $product['price'], $categoryDTO);
        }
        return $dataValue;
    }
}
