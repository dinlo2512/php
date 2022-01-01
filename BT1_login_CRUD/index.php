<?php
session_start();
require_once 'connection.php';

//xử lý đăng nhập
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = '*Vui lòng đăng nhập!';
    header('Location: login.php');
    exit();
}

//xử lý SQL
$sql_select = "SELECT * FROM employees";
$obj_select = mysqli_query($connection, $sql_select);

$values = mysqli_fetch_all($obj_select, MYSQLI_ASSOC);


?>
<link rel="stylesheet" type="text/css" href="fontawesome-5.web/css/all.min.css">
<?php if (isset($_SESSION['success'])) {
    echo "<h3>{$_SESSION['success']}</h3>";
    unset($_SESSION['success']);
} ?>
<h1> Welcome <?php echo $_SESSION['username']; ?> to index.php</h1>
<div class="container">
    <h2> Employees List</h2>
    <button id="add"><a href="create.php">+ Add New Employee</a></button>
    <hr>
    <table border="1" cellpadding="9" cellspacing="0">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>Birthday</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
        <?php foreach ($values as $value): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo $value['salary']; ?></td>
                <td><?php if ($value['gender'] == 1) {
                        echo 'Male';
                    } else {
                        echo 'Female';
                    }; ?></td>
                <td><?php echo date('d-m-Y', strtotime($value['birthday']));?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($value['created_at']));?></td>
                <td><a href="view.php?id=<?php echo $value['id']; ?>"><i class="fas fa-eye"></i></a>
                    <a href="update.php?id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt"></i></a>
                    <a href="delete.php?id=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure ?')"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<br>
<br>
<a href="logout.php">Đăng xuất</a>
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
    #add a{
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
