<?php
require "config.php";
require "models/db.php";
require "models/product.php";
if(isset($_POST['name'])){
    $product = new Product;
    $product = new Product;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = trim($_POST['description']);
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $feature = isset($_POST['feature'])?1:0;
    //xu ly them
    $product->addProduct($name,$manu_id,$type_id,$price,$image,$description,$feature);
    //xu ly upload hinh
    $target_dir = "dist/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:product.php');
}