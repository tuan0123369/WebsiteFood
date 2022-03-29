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
}
