<?php
session_start();
require_once 'connection.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = 'ID không hợp lệ';
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$sql_delete = "DELETE FROM product WHERE id= $id";
$is_delete = mysqli_query($connection, $sql_delete);

if ($is_delete){
    $_SESSION['success'] = "Xóa bản ghi id = $id thành công";
}else{
    $_SESSION['error'] = "Xóa bản ghi id = $id thất bại";
}
header('Location: index.php');
exit();