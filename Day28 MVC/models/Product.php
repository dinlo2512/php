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

    public function getData()
    {
        //Viết truy vấn dạng tham số
        $sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();

        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getOne($id)
    {
        //Viết truy vấn
        $sql_select_one = "SELECT * FROM products WHERE id = :id";
        $obj_select = $this->connection->prepare($sql_select_one);
        $selects = [
            ':id' => $id
        ];
        $obj_select->execute($selects);
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($data)
    {
        //Viết truy vấn
        $sql_update = "UPDATE products SET name = :name, price = :price WHERE id = :id";
        $obj_update = $this->connection->prepare($sql_update);
        $updates = [
          ':name' => $data['name'],
          ':price' => $data['price'],
            'id' => $data['id']
        ];

        return $obj_update->execute($updates);
    }


    public function delete($id)
    {
        $sql_delete = "DELETE FROM products WHERE id = :id";
        $obj_delelte = $this->connection->prepare($sql_delete);
        $delete   = [
          ':id'=> $id
        ];

        return $obj_delelte->execute($delete);
    }



}