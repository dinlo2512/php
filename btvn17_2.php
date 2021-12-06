<?php
$error1 = '';
$error2 = '';
$error3 = '';
$error4 = '';
$error5 = '';
$error6 = '';
$result = '';
$result_text = '';

//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $confim_pass = $_POST['confim-pass'];


    if (empty($first)) {
        $error1 = "Please enter your first name!";
    }
    if (empty($last)) {
        $error2 = "Please enter your last name!";
    }
    if (empty($user)) {
        $error3 = "Please enter your user name!";
    }
    if (empty($email)) {
        $error4 = "Please enter your email address!";
    }
    if (empty($pass)) {
        $error5 = "Please enter your password!";
    }
    if ($pass != $confim_pass) {
        $error6 = "Please provide your password";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error4 = 'Email chưa đúng định đạng';
    }

    if (empty($error1) && empty($error2) && empty($error3) && empty($error4) && empty($error5) && empty($error6)) {
        $result_text = 'Đăng kí thành công!<br>Thông tin của bạn:';
        $result .= "<br>First Name: $first";
        $result .= "<br>Last Name: $last";
        $result .= "<br>User Name: $user";
        $result .= "<br>Email Address: $email";
    }


}

?>

<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title>btvn17_2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .first {
            text-align: right;
            padding-right: 10px;
        }

        .error {
            color: red;
        }

        input[type="submit"] {
            text-align: center;
            margin-left: 100px;
        }

        .result {
            color: green;
        }
        input{
            width: 350px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Register</h1>
    <hr>
</div>
<div class="form">
    <form action="" method="post">
        <table>
            <tr>
                <td class="first">Firstname:</td>
                <td><input type="text" name="first" value="<?php echo isset($_POST['first']) ? $_POST['first'] : ''; ?> "></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error1; ?></i></h6>
                </td>
            </tr>
            <tr>
                <td class="first">Lastname:</td>
                <td><input type="text" name="last" value=<?php echo isset($_POST['last']) ? $_POST['last'] : ''; ?> ></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error2; ?></i></h6>
                </td>
            </tr>
            <tr>
                <td class="first">Username:</td>
                <td><input type="text" name="user" value=<?php echo isset($_POST['user']) ? $_POST['user'] : ''; ?>></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error3; ?></i></h6>
                </td>
            </tr>
            <tr>
                <td class="first">Email Address:</td>
                <td><input type="email" name="email" value=<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error4; ?></i></h6>
                </td>
            </tr>
            <tr>
                <td class="first">Password:</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error5; ?></i></h6>
                </td>
            </tr>
            <tr>
                <td class="first">Confim Password:</td>
                <td><input type="password" name="confim-pass"></td>
            </tr>
            <tr>
                <td></td>
                <td><h6 class="error"><i><?php echo $error6; ?></i></h6>
                </td>
            </tr>

        </table>
        <input type="submit" value="Save" name="submit">
    </form>
</div>
<h3 class="result">
    <?php
    echo $result_text;
    echo $result; ?>
</h3>
</body>
</html>


<!--bai 6-->
<?php
    $error = '';
    $result = '';

    if (isset($_GET['submit'])){
        $phone = $_GET['phone'];
        $url = $_GET['url'];

        if (empty($phone)){
            $error = 'Nhập số điện thoại';
        }elseif (is_numeric($phone) != 1){
            $error = 'Phải nhập đúng số điện thoại';
        }

        if(empty($error)){
            $result .= "Phone $phone";
            $result .= "<br>URL $url";
        }

    }


?>
<div>
    <h3 class="error"><?php echo $error;?></h3>
    <form action="" method="get">
        <input type="text" name="phone" placeholder="Your Phone Number">
        <input type="url" required name="url" placeholder="Your Web Site Start with https://">
        <input type="submit" name="submit">
    </form>
    <h3 class="result"><?php echo $result;?></h3>
</div>