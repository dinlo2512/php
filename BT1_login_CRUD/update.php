<?php
session_start();
require_once 'connection.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$sql_select = "SELECT * FROM employees WHERE id = $id";
$obj_select = mysqli_query($connection, $sql_select);
$value = mysqli_fetch_assoc($obj_select);

//validate form
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
    if ($avt['error'] == 0) {
        $extension = pathinfo($avt['name'], PATHINFO_EXTENSION);
//
        $extension = strtolower($extension);

        $allows = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allows)) {
            $error = 'File upload phải là ảnh';
        }
        $size_b = $avt['size'];
        $size_mb = $size_b / 1024 / 1024;
        $size_mb = round($size_mb, 2);
        if ($size_mb > 2) {
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

        if (empty($error)) {
            $gender = $_POST['gender'];
            $sql_update = "UPDATE employees SET name = '$name',image = '$img',description= '$desc', salary= '$salary',gender='$gender' , birthday= STR_TO_DATE('$birthday','%d/%m/%Y') WHERE id=$id";
            $is_update = mysqli_query($connection, $sql_update);

            if ($is_update) {
                $_SESSION['success'] = "Cập nhật bản ghi id = $id thành công";
                header('Location: index.php');
                exit();
            }
            $error = 'Cập nhật thất bại';
        }

    }
}
?>
<div>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Update Record</h1>
        <hr>
        <p>Please eidt the input values and submit to update the record.</p>
        <p style="color: #ff253a"><?php echo $error; ?></p>
        <h3><b>Name</b></h3>
        <input type="text" name="name" value="<?php echo $value['name']; ?>">
        <h3><b>Image</b></h3>
        <input type="file" name="avatar">
        <img src="upload/<?php echo $value['image']; ?>" width="150px" height="150px" <?php if (empty($value['image'])){echo 'hidden';}?> >
        <h3><b>Description</b></h3>
        <textarea name="desc" cols="30" rows="6"><?php echo $value['description']; ?>
    </textarea>
        <h3><b>Salary</b></h3>
        <input type="text" name="salary" value="<?php echo $value['salary']; ?>">
        <h3><b>Gender</b></h3>

        <input type="radio" name="gender" value="1" <?php if ($value['gender'] == 1) {
            echo "checked";
        } ?> >Male
        <input type="radio" name="gender" value="0" <?php if ($value['gender'] == 0) {
            echo "checked";
        } ?> >Female
        <h3><b>Birthday</b></h3>
        <input type="text" name="birthday" value="<?php echo date('d/m/Y', strtotime($value['birthday'])); ?>">
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

