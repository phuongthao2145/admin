<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/manufacture.php";
if(isset($_POST['id'])){
    $product = new Product;
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $feature = isset($_POST['feature'])?1:0;
    $id = $_POST['id'];
    //xu ly cap nhat
    $product->editProduct($name,$manu_id,$type_id,$price,$image,$description,$feature,$id);
    //xu ly upload hinh
    $target_dir = "dist/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    header('location:product.php');
}
elseif(isset($_POST['manu_id'])){
    $manufacture = new Manufacture;
    $manu_name = $_POST['manu_name'];
    $manu_image = $_FILES['manu_image']['name'];
    $manu_id = $_POST['manu_id'];
     //xu ly cap nhat
     $manufacture->editManu($manu_name,$manu_image,$manu_id);
     //xu ly upload hinh
     $target_dir = "dist/img/";
     $target_file = $target_dir . basename($_FILES["manu_image"]["name"]);
     move_uploaded_file($_FILES["manu_image"]["tmp_name"], $target_file);
     header('location:manufacture.php');
}

