<?php
class Protype extends Db{
    public function getAllProtype(){
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function delType($type_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id` = ?");
        $sql->bind_param("i",$type_id);
        return $sql->execute(); //return an object
    }
    public function addType($type_name,$type_image)
    {
        $sql = self::$connection->prepare("INSERT INTO `protypes`(`manu_name`, `manu_image`) 
        VALUES (?,?)");
        $sql->bind_param("ss",$type_name,$type_image);
        return $sql->execute(); //return an object
    }
    public function editType($type_name,$type_image,$type_id)
    {
        if($type_image != ""){
            $sql = self::$connection->prepare("UPDATE `protypes` 
            SET `type_name`=?,`type_image`=?
            WHERE `type_id` = ?");
            $sql->bind_param("ssi",$type_name,$type_image,$type_id);
        }
        else{
            $sql = self::$connection->prepare("UPDATE `typefactures` 
            SET `type_name`=?
            WHERE `type_id` = ?");
            $sql->bind_param("ssi",$type_name,$type_id);
        }
        return $sql->execute(); //return an object
    }
}