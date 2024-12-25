
<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }?>
 <?php

/*
try{
$_HOST = '127.0.0.1';
$_DB = 'WEBCOMPANY';
$_USER = 'ROOT';
$_PASS = 'MYSQL';
$options = [
PDO::MYSQL_ATTTR_INIT_COMMAND => 'SET NAMES utf8', //SET UTF8
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // TẠO THÔNG BÁO RA NGOẠI LỆ KHI GẶP LỆ
];
$con=new PDO('mysql:dbname='.$_DB.'; host='.$_HOST='.$_HOST, $_USER,

$_PASS, $options);
} catch (EXCEPTION $e){
$err = $r -> getMessage();
die() 
}
*/

// thông tin kết nối
const _HOST = 'localhost';
const _DB = 'duong_php';
const _USER = 'root';
const _PASS = '';

try {
    if(class_exists('PDO')){
        $dsn = 'mysql:dbname='._DB.';host='._HOST;

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //SET UTF8
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // TẠO THÔNG BÁO RA NGOẠI LỆ KHI GẶP LỆ
            ];
        
        $conn = new PDO($dsn, _USER, _PASS, $options);
        // if($conn){
        //     echo 'kết nối thành công';
        // }
    }
}
catch(Exception $exception){
    echo '<div style="color:red; padding: 5px 15px: border: 1px solid red;">';
    echo $exception -> getMessage().'<br>';
    echo '</div>';
    die();
}