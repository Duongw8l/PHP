<?php

$duong_Duong = 12; // đặt tên theo chuẩn quy tắc 
$bien_1 = 'duong';
$bien_2 = 'hello';

// var_dump: in ra kiểu dữ liệu
var_dump($bien_1);
echo '<br>';



//print_r : in ra mảng 
$arr =[1,2,3,5,6];
print_r($arr);
echo '<br>';



//nối chuỗi
//vd1:
echo $bien_1.' '.$bien_2;
//vd2:
$bien_3 = 'duong love you'. $bien_2.'world';
$bien_4 = "duong love you $bien_2 world";
echo $bien_3;
echo '<br>';
echo $bien_4;
echo '<br>';


//hằng số /
/* có hai cách khai báo hằng số 
--sử dụng hàm define()
--sử dụng từ khóa const
note: nên đặt tên viết hoa hết 
*/

define ('duong' , 28);
echo duong;
echo '<br>';
const duongg = 29;
echo duongg;


// khai báo kiểu số nguyên
$bien_5 = '8'; //kiểu string
$bien_6 = (int) $bien_5; // ép kiểu về int
//kiểm tr : is_int($bien_6);

//kiểu boolean
$bien = true;


//kiểu mảng
$bien_7 = [1,2,3];


// câu điều kiện
//if - elseif - else


//vòng lặp
for($i = 0; $i < 10; $i ++){
    echo $i;
}



