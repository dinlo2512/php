<?php
//array
//khai báo có 2 cách
$array1= array('1','ABC','@');
$array2= ['1','EDG','2'];
//Lấy value phần tử mảng 1 cách thủ công
$arr = ['A','B','C','D','mì tôm xào chua cay'];
echo $arr[4];
//xem thông tin mảng
echo "<pre>";
print_r($arr);
echo "<pre>";

//đếm phần tử mảng
$count =  count($arr);
for ($key =0; $key<$count; $key++)
{
    echo $arr[$key]."<br>";
}
//sử dụng foreach để lặp mảng
foreach ($arr as $key => $value)
{
    echo "<h1>Phần tử mảng có key = $key, giá trị tương ứng = $value</h1>";
}
//foreach dạng khuyết
foreach($arr as $value){
    echo$value;
}

//phân loại mảng
//mảng tuần tự/mảng số nguyên: bắt buộc phải dùng ở dạng số, đơn giản dễ thao tác

$array3 = ['a','b','c','d'];

//Mảng kết hợp
$info = [
    'name' => 'Long',
    'age '=> 21,

];
echo "<pre>";
print_r($info);
echo "<pre>";
foreach ($info as $key => $value){
    echo "<p>key : $key , value : $value</p>";
}

//mảng đa chiều
$class = [
    'name' => 'PHP0721E',
    'info'=> [
        'amount' =>22,
        'area' => '30m2',
        'address' => 'Hà Nội'
    ]
];
echo "<pre>";
print_r($class);
echo "<pre>";

foreach ($class as $key => $value){
    echo "<p>key: $key</p>";
    var_dump($value);
}

//demo
$arrs = [12,13,52,36,52,45,96,88];
$sum = 0;
$mul = 1;
foreach($arrs as $value){
    $sum += $value;
    $mul *= $value;
}

echo $sum;
echo "<br>";
echo $mul;

//hàm tính tổng giá trị mảng
$arrs = [12,50,60,90,12,25,60];
$sum = array_sum($arrs);
//kiểm tra key có tồn tại trong mảng hay không
$test =  array_key_exists('name',$arrs);//false

//Loại bỏ phần tử có value trùng lặp
$arr = [1,2,3,3,4,4,4,4,5,6,6,6,7,8,9];
$arr_new = array_unique($arr);
echo "<pre>";
print_r($arr_new);
echo "<pre>";
//chuyển mảng theo ký tự ngăn cách
$arr = ['my','name','is ','dinlo'];
$str = implode(' ', $arr);
var_dump($str);
echo "<br>";

$str1 = 'my name is hello world';
$arr = explode(' ',$str1);
echo "<pre>";
print_r($arr);
echo "<pre>";

//lấy giá trị đầu tiên reset()
//lấy giá trị cuối cùng end()
//xóa phần tử mảng
unset($arr['2']);//xóa phần tử thứ 2
echo "<pre>";
print_r($arr);
echo "<pre>";

//sắp xếp phần tử mảng
rsort($arrs);
echo "<pre>";
print_r($arrs);
echo "<pre>";

