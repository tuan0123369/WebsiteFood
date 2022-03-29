<?php
global $data_recipe;
$data_recipe = array(
    array('id' => 0,'user'=>'nguyenvana' ,'phoneNum' => '0826601487', 'address' => '61/51 Phạm Hùng Bình Chánh', 'date' => '01/11/2021'),
    array('id' => 1,'user'=>'tranchivien' ,'phoneNum' => '0826601787', 'address' => '790/3 Trần Phú', 'date' => '02/11/2021'),
    array('id' => 2,'user'=>'chihung' ,'phoneNum' => '0937998656', 'address' => '47 Tôn Đức thắng', 'date' => '03/11/2021'),
);
//danh mục đơn hàng
//id: stt của đơn hàng (không được trùng id)
//user: Tên đăng nhập của khách hàng
//phoneNum: Số điện thoại của khách hàng
//address: địa chỉ giao hàng
//date: Ngày đặt hàng
global $recipe_detail;
$recipe_detail = array(
    array('id' => '0', 'name' => 'Gà truyền thống', 'quantity' => 1, 'price' => '79000'),
    array('id' => '0', 'name' => 'Gà sốt BBQ Hàn Quấc', 'quantity' => 2, 'price' => '83000'),
    array('id' => '0', 'name' => 'Gà Không xương style popeyes', 'quantity' => 1, 'price' => '80000'),
    array('id' => '1', 'name' => 'Burger bò cơ bản', 'quantity' => 1, 'price' => '59000'),
    array('id' => '1', 'name' => 'Burger tôm', 'quantity' => 2, 'price' => '63000'),
    array('id' => '1', 'name' => 'Gà Không xương style popeyes ', 'quantity' => 2, 'price' => '80000'),
    array('id' => '2', 'name' => 'Gà Không xương style popeyes', 'quantity' => 3, 'price' => '80000'),
    array('id' => '2', 'name' => 'Burger Thanh long Việt Nam', 'quantity' => 1, 'price' => '62000'),
    array('id' => '2', 'name' => 'Burger bò big size', 'quantity' => 2, 'price' => '82000'),
);
//danh mục món ăn của đơn hàng
//id: món trong đơn hàng nào thì mang id đơn hàng đó
//name: tên món ăn
//quantity: số lượng đặt của món
//price: giá món