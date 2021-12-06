<?php
session_start();
//Nếu đã đăng nhập thì không thể truy cập lại trang này nữa
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Đã thực hiện đăng nhập';
    header('Location: welcome.php');
    exit();
}

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $_SESSION['success'] = 'Đã ghi nhớ đăng nhập';
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: welcome.php');
    exit();
}
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$error = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    if (empty($username) || empty($pass)) {
        $error = 'Username,Password không được để trống';
    } elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'Username phải có định dạng email';
    } elseif (strlen($pass) < 2) {
        $error = 'Password phải lớn hơn 2 ký tự';
    }

    if (empty($error)) {
        //giả sử mật khẩu = 123465 thành công, chuyển hướng về trang welcome
        if ($pass == '123456') {
            //Nếu đăng nhập thành công và tích vào remember me thì mới xử lý ghi nhớ đăng nhập
            //Lưu username và password vào cookie
            if (isset($_POST['remember_me'])){
            setcookie('username', $username,time() + 3600);
            setcookie('password', $pass,time() + 3600);
            }


            //tạo session lưu lại phiên làm việc cho user
            $_SESSION['username'] = $username;
            $_SESSION['success'] = 'Đăng nhập thành công';
            //chuyển hướng sang trang web khác

            header('Location: welcome.php');
            exit();//kết thúc header luôn là hàm exit();
        } else {
            $error = 'Sai username hoặc password';
        }
    }

}
?>
<?php
if (isset($_SESSION['error'])) {
    echo "<h3>{$_SESSION['error']}</h3>";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "<h3>{$_SESSION['success']}</h3>";
    unset($_SESSION['success']);
}
?>
<h3 style="color: #c21212"> <?php echo $error; ?></h3>
<div class="container">
<form action="" method="post">
    <table>
        <tr>
            <td>User Name: </td>
            <td> <input type="text" name="username" ></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td> <input type="checkbox" name="remember_me" value="0"> Remember me</td>
            <td></td>
        </tr>
    </table>
    <input type="submit" name="submit" value="login">
</form>
</div>
<style>
    .container{
        width: 20%;
        background: #95BEE6;
        margin: 0px auto;
        padding: 10px 20px;
        text-align: center;
    }

    input[type='submit']{
        padding: 5px 10px;
        margin-top: 20px;
        text-transform: uppercase;
        background: lightgreen;
        border-radius: 7px;
    }
</style>