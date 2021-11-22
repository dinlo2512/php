<?php
//+b1 tạo biến chứa lỗi và kết quả
$error = "";
$result="";
//+b2 Debug mảng dữ liệu để xem đã đủ thuộc tính hiển thị

echo "<pre>";
print_r($_POST);
echo "</pre>";

//+b3 Xử lý submit form khi user đã submit/ gửi form, đựa vào name của nut submit trong mảng
//ktr phần tử mảng isset
if(isset($_POST['show'])){
    //User đã submit form
//+b4 Tạo biến trung gian để thao tác
    $fullname = $_POST['fullname'];
//+b5 Validate form, hiển thị lỗi vào biến erro
//Hàm empty để kiểm tra giá trị có rỗng hay không?
//
    if(empty($fullname)){
        $error = 'Không được để trống';
    }elseif(strlen($fullname) <= 4){
        $error = 'Tên phải > 4 kí tự';
    }
//+b6 Xử lý logic bài toán chỉ khi không có lỗi
    if (empty($error)){
        $result = "Tên của bạn là: $fullname";
    }
}

//+b7 Hiển thị lỗi và kết quả ra màn hình
?>

<form action="" method="post">
    <h3 style="color: red"><?php echo $error;?></h3>
    <h3 style="color: green"><?php echo $result;?></h3>
    Nhập tên của bạn
    <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname']: ''?>">
    <br>
    <input type="submit" name="show" value="show info">
</form>
