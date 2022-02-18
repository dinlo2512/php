<?php
session_start();
require_once 'connection.php';



//VIết truy vấn:
$sql_query = "SELECT * FROM employees ORDER BY created_at DESC";

$obj_select = $connection->prepare($sql_query);

$obj_select->execute();
$employees = $obj_select->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($employees);
echo "</pre>";
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<h1>Danh sách nhân viên</h1>
<div class="container">
    <h2> Employees List</h2>
    <button id="add"><a href="create.php">+ Add New Employee</a></button>
    <button id="add"><a href="register.php">+ Add New Login</a></button>
    <hr>
    <table border="1" cellpadding="9" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
        <?php foreach($employees as $employee):?>
        <tr>
            <td><?php echo $employee['id'];?></td>
            <td><?php echo $employee['name'];?></td>
            <td><?php echo $employee['description'];?></td>
            <td><?php echo number_format($employee['salary'],0,'.','.');?> $ </td>
            <td><?php $gender_text = '';
                switch ($employee['gender']){
                    case 0: $gender_text = 'Female'; break;
                    case 1: $gender_text = 'Male';
                }
                echo $gender_text;
                ?></td>
            <td><?php echo date('d-m-Y H:i:s', strtotime($employee['created_at'])); ?></td>
            <td>
                <a href="update.php?id=<?php echo $employee['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete.php?id=<?php echo $employee['id']; ?>" onclick="return confirm('Are you sure ?')"><i
                        class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
</div>
<br>
<br>
<style>
    .container {
        width: 95%;
        margin: auto;
    }

    #add {
        background: green;
        color: white;
        border-radius: 8px;
        margin-left: 100px;
        padding: 6px;
    }

    h2 {
        display: inline;
    }

    #add a {
        text-decoration: none;
        color: white;
    }

    a {
        margin-right: 15px;
    }

    h3 {
        color: chartreuse;
    }
</style>
