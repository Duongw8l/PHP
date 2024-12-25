<?php
/* 
hàm isset :
--
    kiểm tra biến có tồn tại hay không
    không kiểm tra được dữ liệu của biến
    không kiểm tra được trường hợp NULL
--
    
hàm empty() :
-- 
    kiểm tra biến có tồn tại hay không và kiểu dữ liệu
    chỉ trả về kiểu BOOLEAN
    trả về true nếu không tồn tại hoặc rỗng, =0, '0, rỗng, NULL, arry rỗng, object rỗng, False.
--
*/

//bật thông báo về lỗi 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$bien1 = 2024;

if(isset($bien1)){
    echo $bien1;
}

//empty

$str = 0;
if (!empty($str)){
    echo 
    $str; // không rỗng thì trả về $str
}
else{
    echo " khong hop le";
}

