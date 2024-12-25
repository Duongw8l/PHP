<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }

 $data = [
   'pagetitle' => 'đăng nhập tài khoản'
 ];

 layout('header', $data);
 //kiểm tra trạng thái đăng nhập


// if(isLogin()){
//   reDirect('?module=home&action=dasboard');
// }

 //hàm password_hash và password_verity 
//  $password = '123456';
//md5 = md5($password);
//sha1 = sha1($password); nhược điểm chung dễ dẫn đến dịch ngược
//echo 
// $passwordHash = password_hash($password, PASSWORD_DEFAULT);

if(isPost()){
   $filterALL = filter();
   // echo '<pre>';
   // print_r($filterALL);
   //  echo '/<pre>';
   //  die();

   if(!empty(trim($filterALL['email'])) && !empty(trim($filterALL['password']))){
      //kiểm tra đăng nhập
      $email = $filterALL['email'];
      $password = $filterALL['password'];

     //truy vấn lấy thông tin user theo email
     $userQuery = getOneRaw(" SELECT password, id FROM users WHERE email = '$email' ");
     if(!empty($userQuery)){
         $passwordHash = $userQuery['password'];
         $userId =$userQuery['id'];
         if(password_verify($password, $passwordHash)) {
            //tạo token login để biết gnuwoif dùng có đang đăng nhập hay không
            $tokenLogin = sha1(uniqid().time());

            //insert vào bảng login_token
            $dataInsert = [
               'user_ID' => $userId,
               'token'   => $tokenLogin,
               'create_at'  => date('Y-m-d H:i:s')
            ];

            $insertStatus = insert('tokenlogin', $dataInsert);
            if($insertStatus){
               //insert thành công

               //lưu login_token vào session
               setSession('tokenlogin', $tokenLogin);

               reDirect('?module=home&action=dasboard');
            }
            // reDirect('?module=home&action=dashboard');
         } 
         else{
            setFlashData('msg', 'mật khẩu không chính xác');
            setFlashData('msg_type', 'danger');
            reDirect('?module=auth&action=login');
         }
     }
   }
   else{
      setFlashData('msg', 'vui lòng nhập email và mật khẩu');
      setFlashData('msg_type','danger');
      reDirect('?module=auth&action=login');
   }
}

$msg = getFlashData('msg');
$msg_type = getFlashData('msg_type');/////



?>




<div class="row">
   <div class="col-4" style="margin: 50px auto;">

   <h2 class=" text-uppercase"> Đăng Nhập User</h2>
   <?php 
      if(!empty($msg)){
         getSmg($msg, $msg_type);
      }   
   ?>
      <form action="" method="post">
         <div class="form-group mg-from">
            <label for="">email</label> <br>
            <input name="email" type="email" class="from-control" placeholder="địa chỉ email">
         </div>

         <div class="from-group mg-from" >
            <label for="">password</label><br>
            <input name="password" type="password" class="from-control" placeholder="mật khẩu">
            
         </div>

         <button type="submit" class="mg-from btn-prinmary btn-clock"> Đăng Nhập</button> <hr>
         <p><a href="?module=auth&action=forgot"> Quên Mật Khẩu</a></p> <br>
         <p><a href="?module=auth&action=register"> Đăng kí tài khoản</a></p>

      </form>
   </div>
</div>

<?php
   layout('footer');
?>