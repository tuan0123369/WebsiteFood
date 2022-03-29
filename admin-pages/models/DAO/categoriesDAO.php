<?php

include_once '../models/DTO/categoriesDTO.php';
include_once '../database/config.php';

class categoriesDAO
{
    private $dbConn;

    public function getAllData()
    {
        $dbConn = new configuration();
        $query = 'select * from categories';
        $param = array();
        $data = $dbConn->getData($query, $param);
        $listCate = [];
        foreach ($data as $product) {
            $listCate[] = new categoriesDTO($product['id'], $product['category_name']);
        }
        return $listCate;
    }

    public function updateCate($id, $category_name)
    {
        $dbConn = new configuration();
        $query = 'UPDATE categories SET category_name=:category_name WHERE id=:id';
        $param = array(':id' => $id, ':category_name' => $category_name);
        $dbConn->updateData($query, $param);
    }

    public function delCate($id)
    {
        $dbConn = new configuration();
        $query = 'DELETE FROM categories WHERE  id=:id';
        $param = array(':id' => $id);
        $dbConn->deleteData($query, $param);
    }

    public function addCate($cate_name)
    {
        $dbConn = new configuration();
        $query = 'INSERT INTO categories(category_name) VALUES (:cate_name)';
        $param = array(':cate_name' => $cate_name);
        $dbConn->insertData($query, $param);
    }
}
