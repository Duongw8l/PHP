<?php

$BienToanCuc = 100;
function maketotal($a, $b){ 

    $tong = $a +$b;
    return $tong;

    //echo $tong;

}

function doCount(){
    static $number = 0; //static đứng trước tên biến: => BIẾN TĨNH, k thay đổi giá trị của nó trong quá trình thực thi,
                                                        // được lưu trữ trong bộ nhớ tỏng suốt quá trinh thực thi.
    $number ++;
    echo $number . '<br>';
}

doCount();
doCount();
doCount();