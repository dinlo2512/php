<?php
session_start();
setcookie('username','',time() + -1);
setcookie('password', '',time()+ -1);

unset($_SESSION['username']);
$_SESSION['success'] = 'Đăng xuất thành công!';

header('Location: login.php');
exit();
?>