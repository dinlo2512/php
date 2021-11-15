<?php
$error = '';
$result = '';

echo "<pre>";
print_r($_GET);
echo "<pre>";

if(isset($_GET['show'])){
//    $gerder = $_GET['gerder'];
//    $job = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];

    if(!isset($_GET['gerder'])){
        $error = 'Phải chọn giới tính';
    }elseif(!isset($_GET['jobs'])){
        $error = 'Phải chọn ít nhất 1 job';
    }elseif(!isset($_GET['note'])){
        $error = 'Nhập ghi chú';
    }

    if (empty($error)){
        $gerder = $_GET['gerder'];
        $result .='Giới tính';
        switch ($gerder){
            case 0: $result .= "Nữ"; break;
            case 1: $result .= "Nam";break;
            default: $result .= "Khác"; break;
        }
        $result .= "<br>job vừa chọn";
        $jobs = $_GET['jobs'];
        foreach ($jobs as $job){
            switch ($job){
                case 0: $result .= "Dev";break;
                case 1: $result .= "Tester";break;
                case 2: $result .= "PM";break;
                case 3: $result .= "BA";

            }
        }
        $result .='<br>Quốc gia';
        switch ($country){
            case 1: $result .= "Việt Nam"; break;
            case 2: $result .= "JP";break;
            case 3: $result .= "KR";
        }
        $result .="<br> Ghi chú: $note";
    }
}

?>




<form action="" method="get">
    <h3 style="color: red"><?php echo $error;?></h3>
    <h3 style="color: green"><?php echo $result;?></h3>
    Chọn giới tính:
    <input type="radio" name="gerder" value="0">nữ
    <input type="radio" name="gerder" value="1">nam
    <input type="radio" name="gerder" value="2">khác
    <br>
    Chọn nghề nghiệp:
<!--    cách đặt name cho check box, đặt ở dạng mảng-->
    <input type="checkbox" name="jobs[]" value="0">Dev
    <input type="checkbox" name="jobs[]" value="1">Tester
    <input type="checkbox" name="jobs[]" value="2">PM
    <input type="checkbox" name="jobs[]" value="3">BA

    <br>
    Quốc gia:
    <select name="country" id="">
        <option value="1">Việt Nam</option>
        <option value="2">JP</option>
        <option value="3">KR</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note" id="" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" name="show" value="Show info">
</form>