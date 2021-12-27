<?php
session_start();
require_once "connection.php";
echo "<pre>";
print_r($_GET);
echo "</pre>";

$check = $_GET['checks'];//mảng 1 chiều nhiều phần tử
$check_str = implode(',', $check);
//truy vấn xóa
$sql_delete = "DELETE FROM product WHERE id IN($check_str)";
$is_delete = mysqli_query($connection, $sql_delete);
if ($is_delete){
    $_SESSION['success'] = "Xóa bản ghi id = $check_str thành công";
}else{
    $_SESSION['error'] = "Xóa bản ghi id = $check_str thất bại";
}
header('Location: index.php');
exit();