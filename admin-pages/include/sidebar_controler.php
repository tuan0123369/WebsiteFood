<?php
include_once '../data/data_blog.php';
include_once '../data/data_food.php';
include_once '../data/data_recipe.php';
include_once '../data/data_user.php';


if (isset($_COOKIE['menu']))
    $menu = $_COOKIE['menu'];
if (isset($_COOKIE['item']))
    $item = $_COOKIE['item'];
if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
}

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    setcookie('menu', $menu);
}
if (isset($_GET['item'])) {
    $item = $_GET['item'];
    setcookie('item', $item);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    setcookie('id', $id);
}
