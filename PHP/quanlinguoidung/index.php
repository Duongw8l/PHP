<?php
session_start();
require_once('config.php');
require_once('./includes/connect.php');
require_once('./includes/phpmailer/Exception.php');
require_once('./includes/phpmailer/PHPMailer.php');
require_once('./includes/phpmailer/SMTP.php');
require_once('./includes/function.php');
require_once('./includes/database.php');
require_once('./includes/session.php');

// $test_session = setSession('duong', 'giá trị của session');
// var_dump($test_session);
// $subject = 
// $contend = 
// sendmail('duonghnue2808@gmail.com','$subject','$contend');

// echo _CODE; 
// echo _WEB_HOST . '<br>';
// echo _WEB_PATH;

$module = _MODULE;
$action = _ACTION;


if(!empty($_GET['module'])) {
    if(is_string($_GET['module'])){
          $module = trim($_GET['module']);
         
    }
}

if(!empty($_GET['action'])) {
    if(is_string($_GET['action'])){
          $action = trim($_GET['action']);
         
    }
}


$path = 'modules/' . $module. '/' . $action . '.php';


if(file_exists($path)) {
   require_once ($path);
}else{
  require_once ('modules/error/404.php');
}


if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
  die('access define ...');
}