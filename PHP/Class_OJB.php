<?php

//tạo class

class Duong {
    public function tinhtong($a, $b){
        $tong = $a + $b;
        echo $tong;

    }

    public function show() {
        echo ' đây là hàm trong class';
    }
}

$bien1 = new Duong;

$bien1 -> show();
echo '<br>';


$a = 10;
$b = 3;

$bien1 -> tinhtong($a, $b); // trỏ tới class trong hàm