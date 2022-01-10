<?php
session_start();
require_once "connection.php";

$error = '';
if (isset($_POST['submit'])){
    $register = $_POST['register'];

    if (empty($register)){
        $error = 'Không để trống?';
    }
    if (empty($error)){
        $query = "SELECT * FROM employees WHERE name LIKE '%$register%' ";
        $obj_select = mysqli_query($connection, $query);
        $value = mysqli_fetch_assoc($obj_select);

        if (empty($value['name'])){
            $query = "INSERT INTO employees(name) VALUES ('$register')";
            $is_insert = mysqli_query($connection,$query);

            if ($is_insert){
                $_SESSION['success'] = 'Thêm thành công';
                header('Location: index.php');
                exit();
            }
            else{
                $error = 'Thêm thất bại';
            }
        }else{
            $error = 'Đã tồn tại tên';
        }


    }
}
?>
<form action="" method="post">ĐĂng kí tài khoản <br>
    <h4 style="color: red"><?php echo $error;?></h4> <br>
<input type="text" name="register">
<input type="submit" name="submit" value="submit">
</form>
