<?php
    $error = '';
   $result ='';
   $url = '';
   $type = 'hidden';
if (isset($_POST['submit'])){
    $img = $_FILES['image'];
    if ($img['error']==0){
        $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        $allows = ['jpeg','jpg','png','gif'];
        if (!in_array($extension, $allows)){
            $error = 'File upload phải là ảnh';
        }

        $size = $img['size']/1024/1024;
        if ($size > 1){
            $error = 'File tải lên dung lượng quá lớn';
        }
    }
    else {
        $error = 'Cần upload ảnh';
    }
    if (empty($error)){
        $result .= "Tên File: ".$img['name'];
        $result .= "<br> Định dạng file: ".$img['type'];
        if ($img['error'] == 0){
            $dir_upload = 'upload';
        }
        if (!file_exists($dir_upload)){
            mkdir($dir_upload);
        }
        $name = time() . "" .$img['name'];
        move_uploaded_file($img['tmp_name'],"$dir_upload/$name");
        $url = $dir_upload . '/' . $name;
        $type = '';
    }

}


?>



<style>
    .upload{
        border: 1px solid #95BEE6;
        background: #95BEE6;
        height: 135px;
        border-radius: 12px;
        width: 30%;

    }
    .upload input[type="submit"]{
        width: 90px;
        height: 40px;
        border-radius: 5px;
    }
    img{
        width: 200px;
        height: 160px ;
    }
    h3 {
        color: red;
    }
</style>
<h3><?php echo $error;?></h3>
<div class="upload">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Select a file to upload</h2>
    <input type="file" name="image">
    <p>Only jpg,png,jpeg and gif with maximum size of 1MB is allowed</p>
        <input type="submit" name="submit" value="upload">
    </form>
    <span <?php echo $type; ?>>ảnh được tải lên: </span>
    <img src="<?php echo $url; ?>" alt="" <?php echo $type ?> >
    <p><?php echo $result;?></p>
</div>
