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

$bt6 = file('bt6.csv');
echo "<pre>";
print_r($bt6);
echo "</pre>";

$argc = [];
foreach ($bt6 as $value){
    $argc = explode(',',$value);
    echo "<pre>";
    print_r($argc);
    echo "</pre>";
}



?>
<table border="1" cellspacing="0" cellpadding="6">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Status</th>
        <th>Created_at</th>
    </tr>
    <?php foreach ($bt6 as $value):
        $argc = explode(',',$value);
        ?>
    <tr>
        <td><?php echo $argc[0];?></td>
        <td><?php echo $argc[1];?></td>
        <td><?php echo $argc[2];?></td>
        <td><?php echo $argc[3];?></td>
        <td><?php echo $argc[4];?></td>
        <td><?php echo $argc[5];?></td>
    </tr>
    <?php endforeach;?>
</table>










?>