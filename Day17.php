<!--demo-form-->
<h1>Tạo form </h1>
<form action="" method="get">
<!--    menthod="get" hiển thị nhập trên URL
        method = "post" bảo mật cho form, dữ liệu truyền ngầm.
-->

    Nhập tên của bạn:
    <input type="text" name="fullname">
    <br>
    <input type="submit" value="Show info" name="show">

</form>

<!--Lấy dữ liệu từ form -->
<?php
//    với method: get
//  php sẽ tạo ra 1 mảng $_GET chứa toàn bộ dữ liệu từ form gửi lên
echo "<pre>";
print_r($_GET);
echo "<pre>";
//với method:post mảng $_POST
?>

<form action="process.php" method="post">

    Nhập tên của bạn:
    <input type="text" name="fullname">
    <br>
    <input type="submit" value="Show info" name="show">

</form>
<?php
echo "<pre>";
print_r($_POST);
echo "<pre>";
?>
<!--action của form là nơi xử lý khi submit
    - action = "" vị trí url hiện tại xử lý form
-->
