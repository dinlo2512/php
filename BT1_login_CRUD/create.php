<?php
session_start();
require_once 'connection.php';


$error = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $salary = $_POST['salary'];
    $birthday = $_POST['birthday'];
    $avt = $_FILES['avatar'];

    if (empty($name)) {
        $error = '*Tên không được để trống';
    }
    if ($avt['error'] == 0){
        $extension = pathinfo($avt['name'], PATHINFO_EXTENSION);
//
        $extension = strtolower($extension);

        $allows = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        $size_b = $avt['size'];
        $size_mb = $size_b/1024/1024;
        $size_mb = round($size_mb,2);
        if ($size_mb > 2){
            $error = 'File tải lên dung lượng quá lớn';
        }
    }

    if (empty($error)) {
        if ($avt['error'] == 0) {
            $dir_upload = 'upload';
        if (!file_exists($dir_upload)) {
            mkdir($dir_upload);
        }
        $img = time() . "" . $avt['name'];
        move_uploaded_file($avt['tmp_name'], "$dir_upload/$img");
    }
        $gender = $_POST['gender'];
        $sql_create = "INSERT INTO employees(name, image, description, salary, gender, birthday) VALUES('$name', '$img', '$desc', '$salary','$gender', STR_TO_DATE('$birthday','%d/%m/%Y'))" ;
        $is_create = mysqli_query($connection,$sql_create);

        if ($is_create){
            $_SESSION['success'] = 'Thêm thành công';
            header('Location: index.php');
            exit();
        }
        else{
            $error = 'Thêm thất bại';
        }
    }
}
?>
<div>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Create Record</h1>
        <hr>
        <p style="color: #ff253a"><?php echo $error; ?></p>
        <h3><b>Name</b></h3>
        <input type="text" name="name">
        <h3><b>Image</b></h3>
        <input type="file" name="avatar">
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
