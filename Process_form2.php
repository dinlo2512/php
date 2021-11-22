<?php
$error = '';
$result = '';

echo "<pre>";
print_r($_GET);
echo "</pre>";

if (isset($_GET['show'])) {
//    $gerder = $_GET['gerder'];
//    $job = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];

    if (!isset($_GET['gerder'])) {
        $error = 'Phải chọn giới tính';
    } elseif (!isset($_GET['jobs'])) {
        $error = 'Phải chọn ít nhất 1 job';
    } elseif (!isset($_GET['note'])) {
        $error = 'Nhập ghi chú';
    }

    if (empty($error)) {
        $gerder = $_GET['gerder'];
        $result .= 'Giới tính: ';
        switch ($gerder) {
            case 0:
                $result .= "Nữ";
                break;
            case 1:
                $result .= "Nam";
                break;
            default:
                $result .= "Khác";
        }
        $result .= "<br>job vừa chọn: ";
        $jobs = $_GET['jobs'];
        foreach ($jobs as $job) {
            switch ($job) {
                case 0:
                    $result .= "Dev,";
                    break;
                case 1:
                    $result .= "Tester,";
                    break;
                case 2:
                    $result .= "PM,";
                    break;
                case 3:
                    $result .= "BA.";

            }
        }
        $result .= '<br>Quốc gia: ';
        switch ($country) {
            case 1:
                $result .= "Việt Nam";
                break;
            case 2:
                $result .= "JP";
                break;
            case 3:
                $result .= "KR";
        }
        $result .= "<br> Ghi chú: $note";
    }
}

?>


<!--đổ lại dữ liệu cho radio-->

<?php
//tạo biến checked
$checked_female = '';
$checked_male = '';
$checked_another = '';
if (isset($_GET['gerder'])) {
    $gerder = $_GET['gerder'];

    switch ($gerder) {
        case 0:
            $checked_female .= 'checked';
            break;
        case 1:
            $checked_male .= 'checked';
            break;
        default:
            $checked_another .= 'checked';
    }

}
?>

<form action="" method="get">
    <h3 style="color: red"><?php echo $error; ?></h3>
    <h3 style="color: green"><?php echo $result; ?></h3>
    Chọn giới tính:
    <input type="radio" name="gerder" value="0" <?php echo $checked_female ?> >nữ
    <input type="radio" name="gerder" value="1" <?php echo $checked_male ?> >nam
    <input type="radio" name="gerder" value="2" <?php echo $checked_another ?> >khác
    <br>
    Chọn nghề nghiệp:
    <!--    cách đặt name cho check box, đặt ở dạng mảng-->
    <!--    Đổ lại dữ liệu cho checkbox-->
    <?php
    $checked_tester = '';
    $checked_dev = '';
    $checked_PM = '';
    $checked_BA = '';

    if (isset($_GET['jobs'])){
        $jobs = $_GET['jobs'];
        foreach ($jobs as $job) {
            switch ($job){
                case 0: $checked_dev = 'checked'; break;
                case 1: $checked_tester = 'checked';break;
                case 2: $checked_PM = 'checked';break;
                case 3: $checked_BA = 'checked';
            }
        }
    }

    ?>
    <input type="checkbox" name="jobs[]" <?php echo $checked_dev ?> value="0">Dev
    <input type="checkbox" name="jobs[]" <?php echo $checked_tester ?> value="1">Tester
    <input type="checkbox" name="jobs[]" <?php echo $checked_PM ?> value="2">PM
    <input type="checkbox" name="jobs[]" <?php echo $checked_BA ?> value="3">BA

    <br>


<!--    đổ lại dữ liệu cho select option-->
    <?php
    $selected_VN = '';
    $selected_JP = '';
    $selected_KR = '';

    if (isset($_GET['country'])){
        $country = $_GET['country'];
        switch ($country){
            case 1: $selected_VN = 'selected';break;
            case 2: $selected_JP = 'selected'; break;
            case 3: $selected_KR = 'selected';

        }
    }
    ?>
    Quốc gia:
    <select name="country" id="">
        <option value="1" <?php echo $selected_VN;?> >Việt Nam</option>
        <option value="2" <?php echo $selected_JP;?> >JP</option>
        <option value="3" <?php echo $selected_KR;?> >KR</option>
    </select>
    <br>
    Ghi chú:
<!--    Đổ text vào thẻ dùng(? :) (if else)-->
    <textarea name="note" id="" cols="30" rows="10"><?php echo isset($_GET['note']) ? $_GET['note'] : '';  ?></textarea>
    <br>
    <input type="submit" name="show" value="Show info">
</form>


