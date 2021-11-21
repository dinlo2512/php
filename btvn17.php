<?php
    $error = '';
    $result = '';

    echo "<pre>";
    echo print_r($_POST);
    echo "<pre>";

    if(isset($_POST['show'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        if (empty($name)){
            $error = 'Vui lòng nhập tên!';
        }elseif (empty($email)){
            $error = 'Chưa nhập email!';
        }elseif(empty($date)){
            $error = 'Chưa nhập ngày!';
        }elseif(empty($text)){
            $error = 'Chưa điền class detail!';
        }elseif(!isset($_POST['gender'])){
            $error = 'Hãy chọn 1 giới tính';
        }
        if(empty($error)){

            $result .= "Name: $name";
            $result .= "<br> Email: $email";
            $result .= "<br> Date: $date";
            $result .= "<br> Class Detail: $text";
            $gender = $_POST['gender'];
            $result .='<br>Giới tính ';
            if ($gender == 0){
                $result .= "Nữ";
            }else{
                $result .= "Nam";
            }

        }
    }

?>



Tutorial Point Absolute
<h3 style="color: red"><?php echo $error;?></h3>

<form action="" method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="Email" name="email" required></td>
        </tr>
        <tr>
            <td>Specific Time:</td>
            <td><input type="date" name="date"></td>
        </tr>
        <tr>
            <td>Class detail:</td>
            <td><textarea name="text" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><input type="radio" name="gender" value="0">Female
                <input type="radio" name="gender" value="1">Male
            </td>
        </tr>

    </table>
    <input type="submit" value="Show info" name="show">
    <h3 style="color: green">Your given detail are:</h3>
    <h3 style="color: green"><?php echo $result;?></h3>
</form>

<!--bai2-->
<?php
$error = '';
$result = '';

echo "<pre>";
echo print_r($_GET);
echo "<pre>";


if(isset($_GET['submit'])){
    $username = $_GET['username'];
    $password = $_GET['password'];
    $type = $_GET['type'];
    $display = $_GET['displayname'];
    $email = $_GET['email'];
    $address = $_GET['address'];

    if(empty($username)){
        $error = "Nhập tên user name";
    }elseif (empty($password)){
        $error = "Không được để trống password";
    }elseif (empty($display)){
        $error = "Không được để trống display name";
    }elseif (strlen($display) > 24){
        $error = "Display name phải < 24 kí tự";
    }elseif (empty($email)){
        $error = "Nhập email";
    }elseif (empty($address)){
        $error = "Nhập địa chỉ";
    }elseif ( $type == 1){
        $error = "Chọn loại tài khoản";
    }elseif (!isset($_GET['gender'])){
        $error = "Chọn một giới tính";
    }elseif (!isset($_GET['terms'])){
        $error = "Xác thực điều khoản";
    }

    if (empty($error)){
        $result .= "Username: $username";
        $result .= "<br>Password: $password";
        $result .= "<br>Display Name: $display";
        $result .='<br>Type: ';
        switch ($type){
            case 2: $result .= "User"; break;
            case 3: $result .= "Admin";

        }
        $result .= "<br>Email: $email";
        $result .= "<br>Address: $address";
        $result .= "<br>Giới tính: ";
        $gender = $_GET['gender'];
        if ($gender == 0){
            $result .= "Nữ";
        }else{
            $result .= "Nam";
        }

    }




}
?>
<h3 style="color: red"><?php echo $error;?></h3>
<h3 style="color: green"><?php echo $result;?></h3>
<form action="" method="get">
    <div class="form">
        <h3>Registration Form</h3>
        <table  border="1" cellspacing="0" cellpadding="9">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>User Type</td>
                <td><select name="type" id="">
                        <option value="1">-- Select --</option>
                        <option value="2">User</option>
                        <option value="3">Admin</option>
                    </select></td>
            </tr>
            <tr>
                <td>Display Name</td>
                <td><input type="text" name="displayname"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender" value="0">Female
                    <input type="radio" name="gender" value="1">Male
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="terms">I accept Terms and Conditions</td>
            </tr>

        </table>
        <input type="submit" name="submit">
    </div>
    <h3><?php echo strlen($display);?></h3>
</form>
<style>
    .form{
        background: #95BEE6;
        width: 340px;
    }
    .form h3,input[type="submit"]{
        text-align:center;
    }
    table{
        background: #A7D6F1;
        border-color: #fff;
    }
</style>