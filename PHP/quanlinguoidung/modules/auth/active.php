<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }

 $token = filter()['token'];
 
   if(!empty($token)){
      $tokenQuery = getOneRaw("SELECT id FROM users WHERE activetoken = '$token'");
      if(!empty($tokenQuery)){
         $userID = $tokenQuery['id'];
         $dataUpdate = [
            'status' => 1,
            'activetoken' => null
         ];

         $updateStatus = update('users', $dataUpdate, "id=$userID");

         if($updateStatus){
            setFlashData('msg', 'kích hoạt tài khoản thành công, bạn có thể đăng nhập ngay bây giờ');
            setFlashData('msg_type','success');
         }else{
            setFlashData('msg', 'kích hoạt tài khoản không thành công, vui lòng liên hệ quản trị viên');
            setFlashData('msg_type','danger');
         }
         
         reDirect('?module=auth&action=login');
      } 
      else{
         getSmg('liên kết không tồn tại đã hết hạn', 'danger');
      }
   }else{
      getSmg('liên kết không tồn tại đã hết hạn', 'danger');
   }
   ?>
   <?php 
   layout('footer');
   ?> 
