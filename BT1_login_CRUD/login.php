<?php
session_start();
//xử lý đăng khi quay lại trang đăng nhập
if (isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
}

//xử lý nhớ đăng nhập

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: index.php');
    exit();
}

$error = '';
if (isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['pass'];

    if (empty($user) || empty($pass)){
        $error = '*Tên đăng nhập hoặc mật khẩu không chính xác';
    }
    if (empty($error)){
        if ($pass == '123456'){
            //nhớ đăng nhập
            if (isset($_POST['remeber_me'])){
                setcookie('username',$user,time() + 3600);
                setcookie('password', $pass, time() + 3600);
            }

            $_SESSION['username'] = $user;
            $_SESSION['success'] = 'Đăng nhập thành công!';

            header('Location: index.php');
            exit();
        }else{
            $error = '*Tên đăng nhập hoặc mật khẩu không chính xác';
        }
    }
}
?>

<div class="container">
    <form action="" method="post">
        <div class="form">
            <h3 class="error"><i><?php echo $error;?></i></h3>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<h3 class='error'>{$_SESSION['error']}</h3>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo "<h3>{$_SESSION['success']}</h3>";
                unset($_SESSION['success']);
            }
            ?>
            <table id="table">
                <tr>
                    <td>Tên đăng nhập:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="remeber_me"> Nhớ đăng nhập</td>
                    <td><input type="submit" value="Đăng nhập" name="submit"></td>
                </tr>
            </table>
        </div>
    </form>

</div>
<style>
    .container {
        width: 70%;
        margin: auto;
    }

    .form {
        background: #95BEE6;
    }

    #table {
        margin: auto;
        border: solid 1px green;
        background: greenyellow;
        padding: 24px 10px;
    }
    .error{
        color: red;
    }
</style>
