<?php
class Manufacture extends Db{
    public function getAllManu(){
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function checkProductsInManu($manu_id){
        $sql = self::$connection->prepare("SELECT *
        FROM `products`
        WHERE EXISTS
        (SELECT * FROM `manufactures` WHERE `products`.manu_id = `manufactures`.`manu_id`
         AND `manufactures`.`manu_id` = ?)");
        $sql->bind_param("i",$manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addManu($manu_name,$manu_image)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`, `manu_image`) 
        VALUES (?,?)");
        $sql->bind_param("ss",$manu_name,$manu_image);
        return $sql->execute(); //return an object
    }
    public function editManu($manu_name,$manu_image,$manu_id)
    {
        if($manu_image != ""){
            $sql = self::$connection->prepare("UPDATE `manufactures` 
            SET `manu_name`=?,`manu_image`=?
            WHERE `manu_id` = ?");
            $sql->bind_param("ssi",$manu_name,$manu_image,$manu_id);
        }
        else{
            $sql = self::$connection->prepare("UPDATE `manufactures` 
            SET `manu_name`=?
            WHERE `manu_id` = ?");
            $sql->bind_param("ssi",$manu_name,$manu_id);
        }
        return $sql->execute(); //return an object
    }
    public function delManu($manu_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id` = ?");
        $sql->bind_param("i",$manu_id);
        return $sql->execute(); //return an object
    }
    public function getManuByManuId($manu_id){
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE `manu_id` = ?");
        $sql->bind_param("i",$manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}