<?php
/**
 *      /connection.php
 *      /index.php
 *      /create.php
 *      /update.php
 *      /delete.php
 *
 *
 */

const DB_DSN = 'mysql:host=localhost;dbname=bt1;port=3306;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
    $connection = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
}catch (PDOException $e){
    die("Lỗi kết nối". $e->getMessage());
}
echo "kết nối CSDL thành công";
