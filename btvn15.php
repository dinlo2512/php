

<?php
echo "Bài tập 1";
$variable1 = '1.23';
echo '<br>'; var_dump($variable1);

$variable2 = 28;
echo '<br>'; var_dump($variable2);

$variable3 = 'null';
echo '<br>'; var_dump($variable3);

$variable4 = [123, (boolean) false, null, 1.23, (boolean) FALSE, array('[]'), (boolean) TRUE];
echo '<br>'; var_dump($variable4);

$variable5 = -1.23;
echo '<br>'; var_dump($variable5);

$variable6 = 'false';
echo '<br>'; var_dump($variable6);

$variable7 = 'php';
echo '<br>'; var_dump($variable7);
?>

<table border="1" cellspacing="0" cellpadding="9">
    <tr>
        <td>STT</td>
        <td>Khai báo</td>
    </tr>
    <tr>
        <td>1</td>
        <td>$abc = <?php $abc = 12314142; echo $abc;?></td>
    </tr>
</table>

<?php
$variable1 = '123abc';
$variable2 = null;
$variable3 ='';
$variable4 = 'abc123';
$variable5 = 'null';



?>
<table border="1" cellspacing="0" cellpadding="9">
    <tr>
        <td>Khai báo biến</td>
        <td>Ép sang int</td>
        <td>Ép sang float</td>
        <td>Ép sang string</td>
        <td>Ép sang Boolean</td>
    </tr>
    <tr>
        <td>$variable1 = <?php echo $variable1?></td>
        <td><?php echo (int)$variable1?></td>
        <td><?php echo (float)$variable1?></td>
        <td><?php echo (string)$variable1?></td>
        <td><?php echo (boolean)$variable1?></td>
    </tr>
    <tr>
        <td>$variable2 = <?php echo $variable2?></td>
        <td><?php echo (int)$variable2?></td>
        <td><?php echo (float)$variable2?></td>
        <td><?php echo (string)$variable2?></td>
        <td><?php echo (boolean)$variable2?></td>
    </tr>
    <tr>
        <td>$variable3 = <?php echo $variable3?></td>
        <td><?php echo (int)$variable3?></td>
        <td><?php echo (float)$variable3?></td>
        <td><?php echo (string)$variable3?></td>
        <td><?php echo (boolean)$variable3?></td>
    </tr>
    <tr>
        <td>$variable4 = <?php echo $variable4?></td>
        <td><?php echo (int)$variable4?></td>
        <td><?php echo (float)$variable4?></td>
        <td><?php echo (string)$variable4?></td>
        <td><?php echo (boolean)$variable4?></td>
    </tr>
    <tr>
        <td>$variable5 = <?php echo $variable5?></td>
        <td><?php echo (int)$variable5?></td>
        <td><?php echo (float)$variable5?></td>
        <td><?php echo (string)$variable5?></td>
        <td><?php echo (boolean)$variable5?></td>
    </tr>
</table>


<?php
    $name = 'Đinh Hoàng Long';
    $age = 21;
    $birthday = '25/15/2000';
    $sex = 'Nam';
    $home = 'Ba Đình - Hà Nội';
?>
<table border="1">
    <tr>
        <td><b>Họ tên</b></td>
        <td><b>Tuổi</b></td>
        <td><b>Ngày sinh</b></td>
        <td><b>Giới tính</b></td>
        <td><b>Quê quán</b></td>
    </tr>
    <tr>
        <td><?php echo $name?></td>
        <td><?php echo $age?></td>
        <td><?php echo $birthday?></td>
        <td><?php echo $sex?></td>
        <td><?php echo $home?></td>
    </tr>
</table>

<?php
    $email = 'dinhlong251220@gmail.com';
    $phone = '0983xxxx';
    $message = 'This is a message';
?>
<style>
    .row{
        display: flex;
    }

</style>
<form action="" id="form">
    <div class="row">
        <div class="col">
        Name * <br>
        <input type="text" class="name" placeholder="<?php echo $name?>">
        </div>
        <div class="col">
            Email * <br>
            <input type="text" class="email" placeholder="<?php echo $email?>">
        </div>
        <div class="col">
             Phone <br>
            <input type="text" class="phone" placeholder="<?php echo $phone?>">
        </div>
    </div>
    <div>
        Message * <br>
        <textarea class="mes" rows="5" cols="60" placeholder="<?php echo $message?>">
        </textarea >
    </div>
    <input type="submit" value="Send message" class="submit">


</form>
<h3 id="rs1"></h3>
<h3 id="rs2"></h3>
<h3 id="rs3"></h3>
<h3 id="rs4"></h3>
<script type="text/javascript">
    var obj_submit = document.querySelector('#form');
    obj_submit.addEventListener('submit',function (){
        var name = document.querySelector('.name').value;
        var email = document.querySelector('.email').value;
        var phone = document.querySelector('.phone').value;
        var mes =  document.querySelector('.mes').value;
        event.preventDefault();
        var rs1 = document.querySelector('#rs1');
        var rs2 = document.querySelector('#rs2');
        var rs3 = document.querySelector('#rs3');
        var rs4 =  document.querySelector('#rs4');

        rs1.innerHTML = name;
        rs2.innerHTML = email;
        rs3.innerHTML = phone;
        rs4.innerHTML = mes;





    })
</script>