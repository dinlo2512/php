<?php
echo "<pre>";
echo print_r($_FILES);
echo "</pre>";
//$_GET không thể xử lý được dữ liệu file
//điều kiện bắt buộc để form xủ lý file
//+ method= "post";
// +khai báo chuỗi enctype="multipart/form-data";
//để lấy thông tin file debug mảng 2 chiều sau $_FILES
// -thông tin file
// +name: tên file
// +tmp_name: đường dẫn tạm của file = xampp upload vào 1 vị trí tạm thời
// +error: mã lỗi, 0: upload thư mục thành công vào vị trí tạm
//1: dung lượng file vượt quá
// 2: vượt quá số flie upload

echo "<pre>";
echo print_r($_POST);
echo "</pre>";

$error = '';
$result = '';

if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $avatars = $_FILES['avatar'];
    //File upload phải là ảnh
    //Dung lượng ảnh lớn nhất 2MB
    //dựa vào error để validate file
    if ($avatars['error'] == 0) {
        //Lấy tên file từ đuôi file upload để validate ảnh
        $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
//            var_dump($extension);
        $extension = strtolower($extension);

        $allows = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allows)) {
            $error = 'File upload là ảnh';
        }
        $size_b = $avatars['size'];
        $size_mb = $size_b/1024/1024;
        $size_mb = round($size_mb,2);
        if ($size_mb > 2){
            $error = 'FIle tải lên dung lượng quá lớn';
        }


    }
    if (empty($error)){
        $result .= "Fullname: $name";
        if ($avatars['error'] == 0){
            //tạo thư mục để upload file
            $dir_upload = 'upload';
            //Luôn phải check nếu thư mục chưa tồn tại
            if (!file_exists($dir_upload)){
                mkdir($dir_upload);
            }
            //Sinh tên file mang tính duy nhất
            $filename = time() . "" .$avatars['name'];
            //Gọi hàm chuyển file từ thư mục tạo vào thư mục chính thức
            move_uploaded_file($avatars['tmp_name'], "$dir_upload/$filename");
        }
    }


}
?>


<h1>Demo xử lý file trong form</h1>

<form action="" method="post" enctype="multipart/form-data">
    Upload avatar
    <h3><?php echo $error;?></h3>
    <input type="text" name="fullname">
<!--    <input type="file" name="avt[]" multiple> upload nhiều file-->
    <input type="file" name="avatar">
    <br>
    <input type="submit" name="submit" value="Upload">
    <h3><?php echo $result; ?></h3>
</form>