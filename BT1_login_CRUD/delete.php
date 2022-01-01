<?php
session_start();
require_once 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$sql_delete = "DELETE FROM employees WHERE id=$id";
$is_delete = mysqli_query($connection, $sql_delete);

if ($is_delete){
    $_SESSION['success'] = "Xóa thành công id = $id";
    header('Location: index.php');
    exit();
}

?>