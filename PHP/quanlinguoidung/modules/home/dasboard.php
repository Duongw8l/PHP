<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }

// require_once('teamplates/layout/header.php');
 require_once(_WEB_PATH_TEMPLATES.'/layout/header.php');

// layout('header', $data);

//kiểm tra trạng thái đăng nhập

if(!isLogin()){
  reDirect('?module=auth&action=login');
}



 ?>

 <h1>hello</h1>

 <?php
   require_once(_WEB_PATH_TEMPLATES.'/layout/footer.php');
 ?>

