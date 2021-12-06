<?php
//Khai báo hàm để session hoạt động
session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    echo isset($_SESSION['name']) ? $_SESSION['name']: '';
//    echo $_SESSION['name'];

echo $_COOKIE['fullname'];
echo isset($_COOKIE['fullname']) ? $_COOKIE['fullname']: '';
?>
