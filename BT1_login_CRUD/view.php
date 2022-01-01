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

?>
<div>
        <h1>View Record</h1>
        <hr>

        <h3><b>ID</b></h3>
        <p class="items"><?php echo $value['id']; ?></p>
        <h3><b>Name</b></h3>
        <p class="items"><?php echo $value['name']; ?></p>
        <h3><b>Description</b></h3>
        <p class="items"><?php echo $value['description']; ?></p>
        <h3><b>Salary</b></h3>
        <p class="items"><?php echo $value['salary']; ?></p>
        <h3><b>Gender</b></h3>
        <p class="items"><?php echo $value['gender']; ?></p>
        <h3><b>Birthday</b></h3>
        <p class="items"><?php echo date('d-m-Y', strtotime($value['birthday']));?></p>
        <h3><b>Created_at</b></h3>
        <p class="items"><?php echo date('d-m-Y', strtotime($value['created_at']));?></p>


    <a href="index.php" id="button">Back </a>
</div>
<style>
    #button{
        text-decoration: none;
        border: solid 1px dodgerblue;
        background: dodgerblue;
        border-radius: 5px;
        font-size: 20px;
        color: white;
        padding: 6px 4px;
    }
</style>
