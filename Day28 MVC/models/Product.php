<?php
require_once 'models/Model.php';
class Product extends Model{

    public function insertData($arrs)
    {
        //Viết truy vấn dạng tham số

        $sql_insert = "INSERT INTO products(name, price) VALUES(:name, :price)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
          ':name' => $arrs['name'],
          ':price' => $arrs['price']
        ];

        return $obj_insert->execute($inserts)  ;
    }

}