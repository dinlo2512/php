<?php
session_start();
//nhúng file
require_once 'connection.php';

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $error = '';
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['description'];

    if (empty($name) || empty($price)){
        $error = 'Tên và giá phải nhập';
    }
    elseif (!is_numeric($price)){
        $error = 'Giá nhập vào phải là số';
    }

    if (empty($error)){
        $sql_insert = "INSERT INTO product(name, price, description) VALUES('$name', $price ,'$desc')";
        $is_insert = mysqli_query($connection, $sql_insert);

        if ($is_insert){
            $_SESSION['success'] = 'Thêm sản phảm thành công';
            header('Location: index.php');
            exit();
        }
        else{
            $error = 'Thêm sản phẩm thất bại';
        }
    }
    }
?>
<h2>Form thêm mới sản phẩm</h2>
<h5 style="color: red"><?php echo $error; ?></h5>
<form action="" method="post">
    <table>
        <tr>
            <td>Tên sản phẩm: </td>
            <td><input type="text" name="name"> <br></td>
        </tr>
        <tr>
            <td> Giá:</td>
            <td><input type="text" name="price"><br></td>
        </tr>
        <tr>
            <td> Mô tả sản phẩm:</td>
            <td><textarea name="description" cols="20" rows="6">
    </textarea><br></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Thêm sản phẩm"> <br>
    <a href="index.php">Về danh sách</a>
</form>
