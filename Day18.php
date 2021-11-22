<!--Process_file-->
<?php
//đọc file trong php

$read = file('Demo_read.txt');
echo "<pre>";
echo print_r($read);
echo "</pre>";

foreach ($read as $read) {
    echo $read ."<br>";
}

//đọc toàn bộ file
$file_content = file_get_contents('Demo_read.txt');
echo $file_content;

//ghi file
//Ghi đè: dữ liệu trước sẽ mất
file_put_contents('overWrite.txt','nội dung được truyền vào ');
//Ghi nối
//file_put_contents('Demo_read.txt','Nội dung được ghi nối', FILE_APPEND);
//xóa file
//unlink('overWrite.txt');
//kiểm tra đường dẫn file
$check1 = file_exists('asdfasdf.txt');
echo $check1;













?>