<?php
session_start();
require_once 'connection.php';


echo "<pre>";
print_r($_POST);
echo "</pre>";

$error = '';
if  (isset($_POST["submit"])){
    $name = $_POST["name"];
    $description = $_POST["desc"];

    if (isset($_POST["gender"])){
        $gender = $_POST["gender"];
    }
    $salary = $_POST["salary"];

    if  (empty($error)){
        //truy vấn dạng có tham số
        $sql_insert = "INSERT INTO employees(name, description, gender, salary)
        VALUES(:name, :description, :gender, :salary)";
        //chuẩn bị đối tượng
        $obj_insert = $connection->prepare($sql_insert);
        //Tạo mảng truyền giá trị tham số truy vấn
        $inserts = [
          ':name' => $name,
          ':description' => $description,
            ':gender' => $gender,
            ':salary' => $salary
        ];
        //thực thi đối tượng truy vấn
        $is_insert = $obj_insert->execute($inserts);
        if ($is_insert){
            $_SESSION['success'] = 'Thêm thành công';
            header('Location: index.php');
            exit();
        }
    }

}


?>
<div>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Create Record</h1>
        <hr>
        <p style="color: #ff253a"></p>
        <h3><b>Name</b></h3>
        <input type="text" name="name">
<!--        <h3><b>Image</b></h3>-->
<!--        <input type="file" name="avatar">-->
        <h3><b>Description</b></h3>
        <textarea name="desc" cols="30" rows="6"></textarea>
        <h3><b>Salary</b></h3>
        <input type="text" name="salary">
        <h3><b>Gender</b></h3>

        <input type="radio" name="gender" value="1" checked>Male
        <input type="radio" name="gender" value="0">Female
<!--        <h3><b>Birthday</b></h3>-->
<!--        <input type="text" name="birthday" placeholder="dd/mm/yy">-->
<!--        <br><br>-->
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
