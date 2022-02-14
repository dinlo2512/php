<?php
//Demo PDO.php
/*
 * Sử dụng thư viện PDO trong PHP
 * PHP Data Object : kết nối tới cơ sở dữ liệu
 *
 * - Hỗ trợ kết nối tới nhiều cơ sở dữ liệu khác: MySQL, MongoDB, SQL lite,...
 * - MySQLi chỉ kết nối tới mysql
 * - PDO viết hoàn toàn từ OOP
 * (Docker.. )
 *
 */

//tạo 1 CSDL truy vấn SQL
// CREATE DATABASE if NOT EXISTS php0721e_pdo CHARACTER SET utf8 COLLATE utf8_general_ci

//tạo 1 bảng product: id, name, price, created_at
/*
 * CREATE TABLE IF NOT EXISTS products(
id int(11) AUTO_INCREMENT,
name varchar(50) NOT NULL,
price int DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY(id)
)*/

//Kết nối cơ sở dữ liệu theo PDO
//Khởi tạo kết nối
// Khởi tạo hằng số DSN - Data Source Name
const DB_DSN = "mysql:host=localhost;dbname=php0721e_pdo;port=3306;charset=utf8";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try{
    $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);

}catch(PDOException $e){
    die("Lỗi kết nối: " . $e->getMessage());
}//bắt các lỗi ngoại lệ
echo "Kết nối CSDL thành công";

//Insert PDO: products: id, name, price, created_at
// - viết truy vấn dạng tham số (param): chống được lỗi bảo mật SQL Injection
$sql_insert = "INSERT INTO products(name, price) VALUES(:name, :price)";

// - Chuẩn bị đối tượng truy vấn: prepare
$obj_insert = $connection->prepare($sql_insert);
echo "<pre>";
print_r($obj_insert);
echo "</pre>";

// - Tùy chọn: [Optional] truyền giá trị thật cho tham số của câu truy vấn
// Tạo 1 mảng có sôt phần tử đúng bằng số lượng tham số: bind param
$insert = [
  ':name' => 'Tivi',
  ':price' => '1000'
];

//Thực thi đối tượng truy vấn: INSERT, UPDATE, DELETE kết quả trả về là boolean
//$is_insert = $obj_insert->execute($insert);
//var_dump($is_insert);

//- SELECT PDO:
//- SELECT 1 bản ghi:
// Tạo truy vấn dạng tham số:
$sql_select_one = "SELECT * FROM products WHERE id = :id";
//Đối tượng truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
//[Optional] Tạo mảng để truyền giá trị thật cho tham số truy vấn
$selects = [
  ':id' => 1
];
//Thực thi truy vấn, với select thì không cần sử dụng kết quả trả về sau khi thực thi
$obj_select_one->execute($selects);
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($product);
echo "</pre>";


//- SELECT nhiều bản ghi:
//Viết truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";//truy vấn không có tham số
//Chuẩn bị đối tượng truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
//Câu truy vấn không có tham số nên [Optional] bỏ qua
//Thực thi truy vấn, Không cần thao tác với kết quả trả về
$obj_select_all->execute();
//trả về mảng dữ liệu
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";

//UPDATE:
//Viết truy vấn:
$sql_update = "UPDATE products SET name = :name, price = :price WHERE id = :id";
//chuẩn bị đối tượng:
$obj_update = $connection->prepare($sql_update);
//[Optional]
$updates = [
  ':name' => 'Tủ lạnh' ,
  ':price'=> 3000 ,
  ':id' => 3
];
//thực thi - kết quả trả về Boolean
$is_update = $obj_update->execute($updates);
//$obj_update->debugDumpParams();//Debug
var_dump($is_update);

//DELETE:
//Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id = :id";
//Chuẩn bị obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
//[Optional]
$deletes = [
  ':id' => '8'
];
//thực thi
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);