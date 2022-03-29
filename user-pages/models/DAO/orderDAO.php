<?php
include_once '../database/config.php';
include_once '../models/DTO/orderDTO.php';

class orderDAO
{
    public function getAllData($user_id)
    {
        $dbConn = new configuration();
        $query = 'select * from order_details where id_user=:user_id order by id DESC';
        $param = array(':user_id' => $user_id);
        $data = $dbConn->getData($query, $param);
        $order = [];
        foreach ($data as $product) {
            $order[] = new orderDTO($product['id'], $product['id_order'], $product['id_user'], $product['id_product']);
        }
        return $order;
    }
}
