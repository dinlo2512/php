<?php
//9
function lowerCase($arrs){
    $newarrs = [];
    foreach ($arrs as $key => $value){
        if (ctype_lower($value)){
            $newarrs[$key] = $value;
        }else{
            $newarrs[$key] = strtolower($value);
        }
    }
    return $newarrs;
}
$arrs1 = ['1', 'B', 'C', 'E'];
$arrs2 = ['a', 0, null, false];
//trước
 echo "<pre>";
 print_r($arrs1);
 echo "</pre>";
 //sau
echo "<pre>";
print_r(lowerCase($arrs1));
echo "</pre>";
echo "<pre>";
print_r(lowerCase($arrs2));
echo "</pre>";

//10
function upperCase($arrs){
    $new = [];
    foreach ($arrs as $key => $value){
        if (ctype_upper($value)){
            $new[$key] = $value;
        }else{
            $new[$key] = strtoupper($value);
        }
    }
    return $new;
}
$arrs3 = ['1', 'b', 'c', 'd'];
$arrs4 = ['a', 0, null, false];
//trước
echo "<pre>";
print_r($arrs1);
echo "</pre>";
//sau
echo "<pre>";
print_r(upperCase($arrs3));
echo "</pre>";
echo "<pre>";
print_r(upperCase($arrs4));
echo "</pre>";



