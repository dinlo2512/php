<?php
echo "<h1>Hello world<h1>";
$number =  5.0;
$number1 = (int) $number;//ép kiểu

//Hằng số:
const PI =  3.141596;
//hàm có sẵn của php
define('YEAR', 2021);
echo '<br>';
echo __LINE__; //hiển thị số dòng

echo '<br>';
echo __FILE__;//đường dẫn tuyệt đối của file

echo '<br>';
echo __DIR__;

//hàm
function showName($name){
    echo "Hello : $name";
}
echo '<br>';
showName('Long');

function sum($num1,$num2){
    $sum = $num1 + $num2;
    return $sum;
}
echo '<br>';
$sumz = sum(1,2);
echo "<br>Tổng là: $sumz";

//truyền biến kiểu tham trị và tham chiếu
$number = 5;
echo "<br> Biến number có giá trị ban đầu là: $number";
function changeNumber($x){
    $x = 1;
    echo "<br> Biến bên trong hàm bằng: $x";
}

changeNumber($number);
echo "<br> biến number sau khi gọi hàm $number";//biến number ban đầu không bị thay đổi giá trị-> kiểu tham trị
//Gọi hàm và truyền giá trị -> tạo ra 1 bản sao của biến ban đầu để truyền vào hàm
// hàm thao tác với bản sao

$number = 6;
function changeNumberRef(&$x){
    $x = 2;
    echo "<br>$x";//sử dụng & để hàm truyền dữ liệu kiểm tham chiếu
}

changeNumberRef($number);
echo "<br> biến sau khi gọi hàm: $number";

//Nhúng thẻ Include cho chạy code phía sau nếu bị lỗi
//Nhúng thẻ Require không cho chạy code phía sau, chặt chẽ hơn
include 'process.php';
include 'process.php';
include_once 'process.php';//gọi nhiều lần nhưng chỉ dùng được 1 lần
require 'process.php';
echo "<h3>Nội dung thẻ </h3>";



//toán tử số học
$number = 10;
if($number>0){
    echo "Biến >0";
}else {echo "Biến < 0 ";}

//hoặc
echo "<br>";
echo $number>0 ? "Biến >0" : "Biến <0";

//kiểm tra hiển thị ra cấu trúc bảng


?>
<?php if($number>0):?>
<table>
    <tr>
        <td>Hangf1 cột1</td>
        <td>Hangf2 côt2</td>
    </tr>
</table>
<?php endif; ?><!-- //cấu trúc viết tắt.-->
<?php
//Hàm xử lý chuỗi
//Trả về độ dài chuỗi
$length = strlen('abcld');
//chuyển thành viết hoa
$string = strtoupper('aaserf');
echo"<br> $string";

//viết hoa từng chữ cái đầu tiên
$string = ucwords('đinh hoàng long');
echo "<br> $string";
//xóa bỏ khoảng trắng 2 đầu chuỗi
$string = trim('    Hello ss');
echo "<br> $string";
//tìm kiếm và thay thế
$string = 'hello world';
$search = 'world';
$replace = 'Mkjdiesg';

$result = str_replace($search,$replace,$string);
var_dump($result);

//cắt chuỗi substring...
//xử lý số
//- ktra xem có phải số hay không?
echo "<br>";
var_dump(is_numeric('123aa'));
echo "<br>";
echo round(-12.65);

//format giá trị
//đơn vị tiền tệ
echo "<br>";
echo number_format(1000000);
echo "<br>";
echo number_format(100000000,0,'.','.');
echo "<br>";
echo date_default_timezone_get();
echo "<br>";
echo time();


?>

