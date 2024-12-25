<?php
//bài tập mảng 
/*
bài 1: lấy 5 giá trị cuối chuỗi
chuỗi là tiếng việt- tiếng việt không dấu 
*/
$str = "hoc lap trinh";
$endstr = substr($str,-5 );
echo "5 ký tự cuối của chuỗi là:" . $endstr . "</br>";
//--------------------------------------------------------------------------------------------------------------------------
$str2 = "học lập trình";
$endstr2 = mb_substr($str2,-5, null,'UTF-8'); // hàm này hỗ trợ tiếng việt 
echo "5 ký tự cuối của chuỗi là:" . $endstr2 . "</br>";

//---------------------------------------------------------------------------------------------------------------------------
/*
BÀI 2: VIẾT CHƯƠNG TRÌNH XÓA CHỮ ĐẦU TIÊN TRONG CHUÔI 
INPUT: PHẠM NGỌC HÙNG
OUTPUT: NGỌC HÙNG 
*/

$str3 = "nguyen minh duong";
/* tính chiều dài cả chuỗi 
để lấy được 2 chữ sau thì cắt 1 chữ đầu ==> tìm dấu cách đầu tiên
bỏ từ dấu cách đầu tiên đi thì ra đáp án\
*/

$space1 = strpos($str3, ' '); //lấy ra vị trí space đầu tiên
$postr = $space1 + 1; // lấy ra vị trí của chữ sau dấu cách
$len2 = strlen($str3) - $postr; // lấy ra chiều dài của 2 chữ sau
$EndWord = substr($str3, $postr, $len2);
echo "tên đệm và tên chính là:" .  $EndWord . '</br>';
//---------------------------------------------------------------------------------------------------------------------------

$str4 = "nguyễn minh dương";


$space2 = mb_strpos($str4, ' ', 0, 'UTF-8'); //lấy ra vị trí space đầu tiên
$postr1 = $space2 + 1; // lấy ra vị trí của chữ sau dấu cách
$len3 = mb_strlen($str4, 'UTF-8') - $postr1; // lấy ra chiều dài của 2 chữ sau
$EndWord1 = mb_substr($str4, $postr1, $len3,);
echo "tên đệm và tên chính là:" .  $EndWord1 . '</br>';