<?php
session_start();
require_once 'connection.php';
$id = $_GET['id'];

//Viết truy vấn
$sql_query = "SELECT * FROM employees WHERE id = :id";

$obj_select = $connection->prepare($sql_query);

$select = [
    ':id' => $id
];

$obj_select->execute($select);

$employee = $obj_select->fetch(PDO::FETCH_ASSOC);
?>

<div>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Update Record</h1>
        <hr>
        <p style="color: #ff253a"></p>
        <h3><b>Name</b></h3>
        <input type="text" name="name" value="<?php echo $employee['name'];?>">
        <!--        <h3><b>Image</b></h3>-->
        <!--        <input type="file" name="avatar">-->
        <h3><b>Description</b></h3>
        <textarea name="desc" cols="30" rows="6"><?php echo $employee['description']; ?></textarea>
        <h3><b>Salary</b></h3>
        <input type="text" name="salary" value="<?php echo $employee['salary'];?>">
        <h3><b>Gender</b></h3>
        <?php $checked_female = '';
        $checked_male = '';
        switch ($employee['gender']){
            case 0: $checked_female = 'checked'; break;
            case 1: $check_male = 'checked';
        }
        ?>
        <input type="radio" name="gender" value="1" <?php echo $checked_male;?> >Male
        <input type="radio" name="gender" value="0" <?php echo $checked_female;?> >Female
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
