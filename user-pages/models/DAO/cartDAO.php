<?php

include_once '../models/DTO/cartDTO.php';
include_once '../database/config.php';

class cartDAO
{
    private $dbConn;

    public function getAllData($id)
    {
        $dbConn = new configuration();
        $query = 'select * from cart where id_user=:id';
        $param = array(':id' => $id);
        $data = $dbConn->getData($query, $param);
        $cart = [];
        foreach ($data as $product) {
            $cart[] = new cartDTO($product['id'], $product['id_user'], $product['id_product']);
        }
        return $cart;
    }

    public function getFromCart($id_product, $id_user)
    {
        $dbConn = new configuration();
        $query = 'select * from cart where id_product=:id and id_user=:id_user';
        $param = array(':id' => $id_product, ':id_user' => $id_user);
        $data = $dbConn->getData($query, $param);
        $cart = [];
        foreach ($data as $product) {
            $cart[] = new cartDTO($product['id'], $product['id_user'], $product['id_product']);
        }
        return $cart;
    }

    public function insert2Cart($id, $id_user)
    {
        $dbConn = new configuration();
        $query = 'insert into cart(id_user,id_product) values (:id_user,:id_product)';
        $param = array(':id_product' => $id, ':id_user' => $id_user);
        $dbConn->insertData($query, $param);
    }

    public function deleteAll($user_id)
    {
        $dbConn = new configuration();
        $query = 'delete from cart where id_user=:user_id';
        $param = array(':user_id' => $user_id);
        $dbConn->deleteData($query, $param);
    }

    public function order_Add($id_order, $id_product, $user_id)
    {
        $dbConn = new configuration();
        $query = 'insert into order_details(id_order,id_product,id_user) values (:id_order,:id_product,:user_id)';
        $param = array(':id_order' => $id_order, ':id_product' => $id_product, ':user_id' => $user_id);
        $dbConn->insertData($query, $param);
    }

    public function order_Max()
    {
        $dbConn = new configuration();
        $query = 'select MAX(id_order) from order_details';
        $param = array();
        return  $dbConn->getData($query, $param);
    }

    public function delete_Item($id, $user_id)
    {
        $dbConn = new configuration();
        $query = 'delete from cart where id_product=:id and id_user=:user_id';
        $param = array(":id" => $id, ":user_id" => $user_id);
        $dbConn->deleteData($query, $param);
    }
}
