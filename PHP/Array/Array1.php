<?php
/* 
--------Mảng là cấu trúc dữ liệu mà luu trữ 1 hay nhiều kiểu giá trị
                giống nhau trong 1 một giá trị đơn

--------Mảng có thể là mảng 1 chiều hay đa chiều
        
--------Để khai báo mảng ta sử dụng array() ỏ []( với php 5.4 trở lên)

--------Để xem cấu trúc mảng:

    echo <'pre'>;
        print_r( $... );
    echo <'/pre'>; ---------------------------------
*/ 
    $arr = array('html','js','php'); // mảng tuần tự

    $arr2 = ['html','js','php']; // mảng tuần tự

    $arr2[1] = 'hello oi nguoi';

    //in mảng
    echo ' in mảng 2';
    echo '<pre>';
    print_r ($arr2);
    echo '</pre>';

 /*
thay đôi tên biến i của từng giá trị 
(
     before                                after
    [0] => html                        [key1] => html
    [1] => js          ===>            [key2] => js
    [2] => php                         [key3] => php
)                                   
    */
    $arr3 = ['key1' => 'html', 'key2' =>'js', 'key3' =>'php']; // mảng không tuần tự

    // thêm phần tử vào mảng ---------------------------------
    $arr3 ['address4'] = 'NodeJs';  // thêm phần tử có key
    $arr3 [] = 'Golang'; // thêm phần tử k key
    array_push($arr3, 'go', 'go2');


    //in mảng ---------------------------------
    echo '<pre>';
    print_r ($arr3);
    echo '</pre>';


    //đọc mảng ---------------------------------

    // đọc mảng theo key ---------------------------------
    echo "đọc mảng theo key". '</br>'; 
    $duong = $arr2['key2'];
    echo $duong. '</br>'; 

    //dọc mảng theo vòng lặp for
    echo "dọc mảng theo còng lặp for". '</br>';  // vòng lặp for dùng để đọc mảng tuần tự
    if (!empty($arr2)){
        for ( $i = 0; $i < count($arr2); $i++){
                echo $arr2[$i]    .'</br>';
            }
        }
        echo  '<br>';
        echo  '<br>';
        echo  '<br>';

     // đọc mảng theo vòng lặp foreach ---------------------------------
     echo 'đọc mảng theo vòng lặp foreach'. '<br>'; 
   if (!empty($arr3)){
                       // có thể viết là item hoặc key => item {item ở đây chỉ ký hiệu phần tử của mảng}
    foreach ($arr3 as $item) {
        echo $item. '<br>';
    }
   } 



   // sửa mảng ---- $tenbien[key] = value ---------------------------------

    




    

    