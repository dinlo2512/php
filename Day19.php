<!--xss.php-->
<!--lỗi bảo mật XSS trong form-->
<?php
session_start();
    if (isset($_GET['submit'])){
        $fullname = $_GET['fullname'];
        //<script>alert(document.cookie)</script>

//        fix xss mã hóa code trước khi hiển thị
        $fullname = htmlspecialchars($fullname);
        echo $fullname;
    }
?>


<!--lỗi bảo mật csrf-->
<!--luôn check token phải trùng với user đang đăng nhập thì mới submit được form-->

<form action="" method="get">
    Full name: <input type="text" name="fullname">
    <input type="submit" name="submit" value="Show">

</form>


<!--Session-->
<!--Phiên làm việc thời điểm bắt đầu và kết thúc-->
<!--Biến dạng mảng, $_SESSION quản lý tất cả các mảng đang dùng-->
<!--Session mất đi khi xóa nó hoặc đóng trình duyệt-->
<!--Session hoạt động trên server-->

<?php
//    $test = 'Hello';
//    echo $test;
//- Tạo session để lưu thông tin
// - luôn chạy file session.php trước
$_SESSION['name']= 'Đinh Long';
//Lấy giá trị của session giống mảng
echo $_SESSION['name'];
//Xóa session
$_SESSION['age'] = '21';
unset($_SESSION['age']);
echo $_SESSION['age'];//không hiển thị
?>