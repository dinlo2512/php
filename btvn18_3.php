<?php
    $error1 = ''; $error2 = ''; $error3 = ''; $error4= ''; $error5 ='';
    $result = '';

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['Email'];
        $pass = $_POST['pass'];
        $confim_pass = $_POST['confim-pass'];

        if (empty($username)){
            $error1 = 'Username không được để trống!';
        }
        if (empty($email)){
            $error2 = 'Email không được để trống!';
        }
        if (empty($pass)){
            $error3 = 'Password không được để trống';
        }
        if (empty($confim_pass)){
            $error4 = 'Confim Password không được để trống!';
        }
        if ($pass != $confim_pass) {
            $error4 = "Trường confirm password phải giống trường Password!";
        }

        $ava = $_FILES['image'];
        if ($ava['error'] == 0){
            $extension = pathinfo($ava['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);

            $allows = ['jpg','jpeg','png','gif'];
            if (!in_array($extension,$allows)){
                $error5 = 'File upload phải định dạng ảnh';
            }
        }
        else{
            $error5 = 'Cần upload ảnh';
        }
        if (empty($error1) && empty($error2) && empty($error3) && empty($error4) &&empty($error5)){
            $result .= "Username: $username";
            $result .= "<br> Email: $email";

            if ($ava['error'] == 0){
                $dir_upload = 'upload';
            }
            if (!file_exists($dir_upload)){
                mkdir($dir_upload);
            }
            $name = time() . "" .$ava['name'];
            move_uploaded_file($ava['tmp_name'],"$dir_upload/$name");
            $url = $dir_upload . '/' . $name;
            $type = '';
            $result .= "<br>Avatar: <img src='$dir_upload/$name' >";
        }

    }

?>





<style>
    .form{
        width: 500px;

        background: linear-gradient(146deg, rgba(50,106,139,1) 0%, rgba(19,46,67,1) 100%);
        text-align: center;
        padding: 20px;
    }
    .form h2{
        color: white;
    }
    input[type="text"], input[type="password"]{
        background: #0A1823;
        color: white;

    }
    input{
        padding-bottom: 10px;
        margin-bottom: 10px;
        width: 310px;
    }
    input[type="submit"]{
        background: blue;
        color: white;
        padding: 9px;
    }
    .error{
        color: red;
    }
    .result{
        color: blue;
    }
    img {
        width: 200px;
        height: 160px;
    }
</style>
<div class="form">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Create an account</h2>
        <input type="text" name="username" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?> "><br>
        <p class="error"><?php echo $error1?></p>
        <input type="text" name="Email" placeholder="Email" value="<?php echo isset($_POST['Email']) ? $_POST['Email'] : '';?> "><br>
        <p class="error"><?php echo $error2?></p>
        <input type="password" name="pass" placeholder="Password" ><br>
        <p class="error"><?php echo $error3?></p>
        <input type="password" name="confim-pass" placeholder="Confim Password"><br>
        <p class="error"><?php echo $error4?></p>
        <input type="file" name="image"><br>
        <p class="error"><?php echo $error5?></p>
        <input type="submit" name="submit" value="Register">
    </form>
        <h3 class="result"><?php echo $result;?></h3>

</div>
