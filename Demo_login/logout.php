<?php
session_start();
//đăng xuất phải xóa cookie
setcookie('username','', time() - 1);
setcookie('password','', time() - 1);
unset($_SESSION['username']);
$_SESSION['success'] = 'đăng xuất thành công';
header('Location: login.php');
exit();