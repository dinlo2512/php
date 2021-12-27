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
<form action="delete_multiple.php" method="get">
    <input type="submit" name="delete" value="Xóa nhiều bản ghi"
    onclick="return confirm('Bạn có chắc muốn xóa nhiều bản ghi này')">
    <br>
    <br>
<table border="1" cellpadding="1" cellpadding="9">
    <tr>
        <th><input type="checkbox" id="check-all"></th>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>CREATE_AT</th>
    </tr>
<?php foreach ($products as $value): ?>
    <tr>
        <td><input type="checkbox" name="checks[]" class="checkbox-item" value="<?php echo $value['id'];?>"></td>
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
</form>

<h4><a href="list.html">LIST AJAX</a></h4>
<script src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    //đảm bảo code js luôn chạy sau cùng.

    $(document).ready(function (){
    var selectorCheckall = $('#check-all');
    selectorCheckall.click(function (){
        //kiểm tra checked của check all
        var isChecked = $(this).prop('checked');
        if (isChecked){
            $('.checkbox-item').prop('checked',true);
        }else{
            $('.checkbox-item').prop('checked', false);
        }
    });
    })
</script>