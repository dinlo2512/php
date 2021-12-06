<!--//Cookie là biến dùng để lưu trữ thông tin-->
<!--//Biến lưu trữ thông tin, Cookie lưu trên trình duyệt-->
<!--//cookie không mất đi khi đóng trình duyệt, phụ thuộc vào thời gian sống-->
<!--//lưu dưới dạng mảng $_COOKIE lưu toàn bộ cookie đang có-->


<?php
    echo "<pre>";
    print_r($_COOKIE);
    echo "</pre>";


//-Khởi tạo cookie
//-tạo cookie tồn tại trong 10p
    setcookie('fullname', 'Đinh Hoàng Long', time() + 5);
    setcookie('chokies', 'Chokies',time() +10 );
//xóa cookie
    setcookie('chokie', '' , time() - 1);
?>

