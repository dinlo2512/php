<?php
session_start();
require_once 'connection.php';
//Cập nhật sản phẩm thep id bắt buộc id phải là số

//Lấy id từ url
$id = $_GET['id'];
//VIết truy vấn
$sql_select_one = "SELECT * FROM product WHERE id = $id";
//truy vấn select trả về obj trung gian
$obj_select_one = mysqli_query($connection, $sql_select_one);
//trả về mảng kết hợp 1 chiều
$product = mysqli_fetch_assoc($obj_select_one);

//valitdate tham số url:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
    $_SESSION['error'] = 'ID không hợp lệ';
    header('Location: index.php');
    exit();
}


//validate submit form
$error = '';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];

    if (empty($name) || empty($price)){
        $error = 'Tên và giá phải nhập';
    }
    elseif (!is_numeric($price)){
        $error = 'Giá nhập vào phải là số';
    }

    if (empty($error)) {
        $sql_update = "UPDATE product SET name = '$name',price = $price, description= '$desc' WHERE id=$id";
        $is_update = mysqli_query($connection, $sql_update);

        if ($is_update) {
            $_SESSION['success'] = "Cập nhật bản ghi id = $id thành công";
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
    }


}

?>
<h2>Form cập nhật sản phẩm</h2>
<h5 style="color: red"><?php echo $error; ?></h5>
<form action="" method="post">
    <table>
        <tr>
            <td>Tên sản phẩm: </td>
            <td><input type="text" name="name" value="<?php echo $product['name']?>"> <br></td>
        </tr>
        <tr>
            <td> Giá:</td>
            <td><input type="text" name="price" value="<?php echo $product['price']?>"><br></td>
        </tr>
        <tr>
            <td> Mô tả sản phẩm:</td>
            <td><textarea name="description" cols="20" rows="6" ><?php echo $product['description'];?>
                </textarea><br></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Cập nhật sản phẩm"> <br>
    <a href="index.php">Về danh sách</a>
</form>