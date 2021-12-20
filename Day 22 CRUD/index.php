<?php
//CRUD 4 chức năng nền tảng
//CREATE READ UPDATE DELETE

/**
 * DAY22 CRUD: /
 *             /connection.php: kết nối CSDL dùng mysqli
 *             /create.php:
 *             /update.php:
 *             /delete.php:
 *             /index.php: Read (LIST)
 */
session_start();
require_once 'connection.php';
$sql_select_all = "SELECT * FROM product ORDER BY create_at desc";
$obj_select_all = mysqli_query($connection, $sql_select_all);

$products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
//echo "<pre>";
//print_r($products);
//echo "</pre>";
if (isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<a href="create.php">Thêm mới sản phẩm</a>
<h2>Danh sách sản phẩm</h2>
<table border="1" cellpadding="1" cellpadding="9">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>CREATED_AT</th>
    </tr>
    <tr>
        <td>1</td>
        <td>name 1</td>
        <td>1.000.000 vnđ</td>
        <td>des1</td>
        <td>20/12/2021 21:50:32</td>
        <td>
            <a href="#">Sửa</a>
            <a href="#" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
<?php foreach ($products as $value): ?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo number_format($value['price'], 0, '.','.');?> vnđ</td>
        <td><?php echo $value['description'];?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($value['create_at']));?>
        </td>
        <td>
            <a href="update.php?id=<?php echo $value['id'];?>">Sửa</a>
            <a href="delete.php?id=<?php echo $value['id'];?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a>
        </td>
    </tr>
<?php endforeach;?>
</table>
