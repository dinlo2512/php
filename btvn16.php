<?php
$arrs = [2, 5, 6, 9, 2, 5, 6, 12, 5];
echo 'Tổng các phần tử = ';
foreach ($arrs as $value) {
    echo $value . ' +';
}
echo '=' . array_sum($arrs);
echo '<br>';
echo 'Tích các phần tử = ';
$mul = 1;
foreach ($arrs as $value) {
    echo $value . '*';
    $mul *= $value;
}
echo '=' . $mul;
echo '<br>';
echo 'Hiệu các phần tử = ';
foreach ($arrs as $value) {
    $sub = reset($arrs);
    echo $value . ' -';
    $sub -= $value;
}
echo '=' . $sub;

echo '<br>';
echo 'Thương các phần tử = ';

foreach ($arrs as $value) {
    $div = reset($arrs);
    echo $value . ' /';
    $sub -= $value;
}
echo '=' . $div;

$arrs1 = ['đỏ', 'xanh', 'cam', 'trắng'];
echo '<br>';
echo "“Màu $arrs1[0] là màu yêu thích của Anh, $arrs1[1] là màu yêu thích của Sơn, $arrs1[2] là màu yêu thích của Thắng,
 còn màu yêu thích của tôi là màu $arrs1[3]”";

$arrs2 = ['PHP', 'HTML', 'CSS', 'JS'];
?>
    <table border="1" , cellpadding="10" cellspacing="0">
        <th>Tên Khóa Học</th>
        <tr>
            <td><?php echo $arrs2[0] ?></td>
        </tr>
        <tr>
            <td><?php echo $arrs2[1] ?></td>
        </tr>
        <tr>
            <td><?php echo $arrs2[2] ?></td>
        </tr>
        <td><?php echo $arrs2[3] ?></td>

    </table>
<?php
$arrs = array("Italy" => "Rome",
    "Luxembourg" => "Luxembourg",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen",
    "Finland" => "Helsinki",
    "France" => "Paris",
    "Slovakia" => "Bratislava",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Netherlands" => "Amsterdam",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallin",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valetta",
    "Austria" => "Vienna",
    "Poland" => "Warsaw");
foreach ($arrs as $key => $val) {
    echo "Thủ đô của " . $key . " là " . $val . "<br>";

}
$a = [
    'a' => [
        'b' => 0,
        'c' => 1
    ],
    'b' => [
        'e' => 2,
        'o' => [
            'b' => 3
        ]
    ]
];

echo "Phần tử có giá trị = " . $a['b']['o']['b'] . " và key bằng 'b'";
echo '<br>';
echo $a['a']['c'];
echo '<br>';
$keys = array(
    "field1" => "first",
    "field2" => "second",
    "field3" => "third"
);
$values = array(
    "field1value" => "dinosaur",
    "field2value" => "pig",
    "field3value" => "platypus"
);


$array = [120, -5, -200, 201, 105, 15, -60, 900, 345, -123, 100, -125, 0];
foreach ($array as $values) {
    if ($values > 100 && $values < 300) {
        if ($values % 5 == 0) {
            echo $values . '     ';
        }
    }
}


$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];
//tạo mảng rỗng
$arrs = [];
foreach ($array as $value) {
    $arrs[$value] = strlen($value);
}
echo "<pre>";
print_r($arrs);
echo "<pre>";

asort($arrs);

echo "<pre>";
print_r($arrs);
echo "<pre>";

echo "Phần tử nhỏ nhất là ".array_key_first($arrs)."<br>";
echo "Phần tử nhỏ nhất là ".array_key_last($arrs);
