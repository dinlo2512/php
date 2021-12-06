<?php
session_start();
echo "<pre>";
print_r($_SESSION);
if (!isset($_SESSION['username'])){
    $_SESSION['error'] = 'chưa đăng nhập nên không thể truy cập';
    header('Location: login.php');
    exit();
}
echo "</pre>";
echo "<h1>{$_SESSION['success']}</h1>";
echo "<p>Chào mừng trở lại: {$_SESSION['username']}</p>";
echo "<p>Thời gian đăng nhập: </p>".time();
echo "<a href='logout.php'>Đăng xuất</a>";
?>
<!--userchua đăng nhập thì không cho truy cập url-->