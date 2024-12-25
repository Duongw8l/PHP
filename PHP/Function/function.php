<?php

function maketotal($a, $b){

    $tong = $a +$b;
    echo $tong;

}

       /*Hàm `function_exist` trong một số ngôn ngữ lập trình được sử dụng để kiểm tra xem một
        hàm hay phương thức có tồn tại trong chương trình hay không. Việc sử dụng hàm này thường
        giúp kiểm tra trước khi gọi một hàm nào đó để tránh lỗi khi hàm đó không tồn tại.*/
       

if (!function_exists('aketotal')) {
    function maketotal($a, $b){
        echo "tạo mới sau khi kiểm tra";
    }
}

