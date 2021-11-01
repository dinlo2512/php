<!DOCTYPE>
<html>
<head>
    <title>php</title>
    <style>
        h1 {
            color: #c21212;
        }
    </style>
</head>
<body>
<h1>Hello world</h1>
    <?php
        echo 'code PHP ';
        $name =  'Long';
        $age = 21;
        $is_int = is_int($age);
        var_dump($is_int);

        $str1 = 'aaaa';
        $str2 = 'qqqq';
        $str3 = $str1.$str2;
        var_dump($str3);

        //hoặc
    echo '<br>';
        $str5 = "$str1 $str2";
        var_dump($str5);
    ?>
</body>
</html>
