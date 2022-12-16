<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/manufacture.php";

if(isset($_GET['id'])){
    $product = new Product;
    $id = $_GET['id'];
    $product->delProduct($id);
    header('location:product.php');
}
elseif(isset($_GET['manu_id'])){
    $manufacture = new Manufacture;
    $manu_id = $_GET['manu_id'];
    if($manufacturecheckProductsInManu($manu_id) > 0){
        $error = "Can not delete. There are still product in this manufacture!!!";
        setcookie('error',$error,time()*3600*7);
    }
    else{
         $manufacture->delManu($manu_id);    
    } 
    header('location:manufacture.php');
}
elseif(isset($_GET['type_id'])){
    $protype = new Protype;
    $manu_id = $_GET['type_id'];
    $protype->delType($type_id);
    header('location:protype.php');
}