<!-- các hàm liên quan đến sesion hay cookie-->

<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }

//hàm gán sesion
 function setSession($key, $value){
    return $_SESSION[$key] = $value;
 }

//hàm gọi ra session
 function getSession($key=''){
   if(empty($key)){
      return $_SESSION;
   }else{
      if(isset($_SESSION[$key])){
         return $_SESSION[$key];
      }
   }
 }

//hàm xóa session
 function removeSession($key=''){
   if(empty($key)){
      session_destroy();
      return true;
   }else{
      if(isset($_SESSION[$key])){
         unset($_SESSION[$key]);
         return true;
      }
   }
 }

//hàm gắn flash data
  function setFlashData($key, $value){
   $key = 'flash_' .$key;
   return setSession($key, $value);
  }

//hàm đọc flash data
function getFlashData($key){
   $key ='flash_' .$key;
   $data = getSession($key);
   removeSession($key);
   return $data; 
}