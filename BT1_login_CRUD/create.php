<?php
session_start();
require_once 'connection.php';


$error = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $birthday = $_POST['birthday'];

    if (empty($name)) {
        $error = '*Tên không được để trống';
    }

    if (empty($error)) {
        $gender = $_POST['gender'];
        $sql_create = "INSERT INTO employees(name, description, salary, gender, birthday) VALUES('$name', '$desc', '$salary','$gender', STR_TO_DATE('$birthday','%d/%m/%Y'))" ;
        $is_create = mysqli_query($connection,$sql_create);

        if ($is_create){
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
<div>
    <form action="" method="post">
        <h1>Update Record</h1>
        <hr>
        <p style="color: #ff253a"><?php echo $error; ?></p>
        <h3><b>Name</b></h3>
        <input type="text" name="name">
        <h3><b>Description</b></h3>
        <textarea name="desc" cols="30" rows="6">
    </textarea>
        <h3><b>Salary</b></h3>
        <input type="text" name="salary">
        <h3><b>Gender</b></h3>

        <input type="radio" name="gender" value="1" checked>Male
        <input type="radio" name="gender" value="0">Female
        <h3><b>Birthday</b></h3>
        <input type="text" name="birthday" placeholder="dd/mm/yy">
        <br><br>

        <input type="submit" name="submit" value="Save">
        <button><a href="index.php" id="cancel">Cancel</a></button>
    </form>

</div>
<style>
    input[type="submit"] {
        padding: 6px 4px;
        background: dodgerblue;
        border-radius: 5px;
        color: white;
    }

    input[type="text"] {
        width: 240px;
    }

    button {
        background: white;
        border-radius: 5px;
        padding: 6px 4px;
    }

    #cancel {
        text-decoration: none;
        display: inline;
    }
</style>
