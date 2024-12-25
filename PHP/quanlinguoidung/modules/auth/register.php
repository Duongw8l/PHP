<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');

 }

//  $data = [
//    'fullname' => 'toàn',
//    'email' => 'toan@gmail.com',
//    'phone' => '0896356347',
//  ];

//  $kq = update('users', $data, 'id=2');
//  var_dump($kq);

//  $kq = getRaw('SELECT * FROM users');
//  echo '<pre>';
//  print_r($kq);
//  echo '</pre>';

//  $data = [
//    'pagetitle' => 'đăng kí tài khoản'
//  ];

 

 if(isPost()){
   $filterALL = filter();
   $errors = []; //mảng chứa các lỗi

   //validate fullname
   if(empty($filterALL['fullname'])){
      $errors['fullname']['required'] = 'họ tên bắt buộc phải nhập';
   }else{
      if(mb_strlen($filterALL['fullname']) < 5) {
         $errors['fullname']['min'] = 'họ tên tối thiểu phải có 5 kí tự';
      }
   }
   
   //validate email.: bắt buộc phải nhập/ đúng định dạng/ kiểm tra mail đã tồn tại trong csdl hay chưa
   if(empty($filterALL['email'])){
      $errors['email']['required'] = 'email bắt buộc phải nhập';
   }else{
      $email = $filterALL['email'];
      $sql = "SELECT id FROM users WHERE email = '$email'";
      if(getRows($sql) > 0){
         $errors['email']['unique'] = 'email đã tồn tại';
      }
   }

   //validate số điện thoại
   if(empty($filterALL['phone'])){
      $errors['phone']['required'] = 'số điện thoại bắt buộc phải nhập';
   }else{
      if(!isPhone($filterALL['phone'])){
         $errors['phone']['isPhone'] = 'số điện thoại không hợp lệ';
      }
   }
   
   //validate pass: bắt buộc phải lớn hơn 8 ký tự
   if(empty($filterALL['password'])){
      $errors['password']['required'] = 'Bắt buộc phải nhập mặt khẩu';
   } else{
      if(strlen($filterALL['password']) < 8){
         $errors['password']['min'] = 'Mật khẩu phải lớn hơn 8 ký tự';
      }
   }

   //validate password_confirm: bắt buộc phải nhập, giống password
   if(empty($filterALL['password_confirm'])){
      $errors['password_cionfirm']['required'] = 'bạn phải nhập lại mật khẩu';

   } else{
      if(($filterALL['password']) != $filterALL['password_confirm']){
         $errors['password_confirm']['match'] = 'Mật khẩu bạn lại không đúng';
      }
   }

   //điều kiện insert 
   if(empty($errors)){
      $activeToken = sha1(uniqid().time());
      $dataInsert  = [
         'fullname'    => $filterALL['fullname'],
         'email'       => $filterALL['email'],
         'phone'       => $filterALL['phone'],
         'password'    => password_hash($filterALL['password'], PASSWORD_DEFAULT),
         'activeToken' => $activeToken,
         'create_at'   => date('Y-m-d H:i:s')
      ];
   
   $insertStatus = insert('users', $dataInsert);
  
   if($insertStatus){
      setFlashData('smg', ' Đăng ký thành công');
      setFlashData('smg_type', 'success');
      
      //tạo đường link kích hoạt
      $linkActive = _WEB_HOST . '?module=auth&action=active&token'.$activeToken;

      //thiết lập gửi mail nếu đk thành công
      $subject = $filterALL['fullname'].'vui lòng kích hoạt tài khoản';
      $contend = 'Chào '.$filterALL['fullname'].'</br>';
      $contend .= 'Vui lòng click linh dưới đây để kích hoạt tài khoản: </br>';
      $contend .= $linkActive.'</br>';
      $contend .= 'trân trọng cảm ơn';

      //tiến hành gửi mail
      $sendmail = sendmail($filterALL['email'], $subject, $contend);
      if($sendmail){
         setFlashData('smg', 'Đăng kí thành công, vui lòng kiểm tra email để kích hoạt tài khoản');
         setFlashData('smg_type', 'success');
      // }else {
      //    setFlashData('smg', 'Hệ thống đang gặp sự cố, vui lòng thử lại sau');
      //    setFlashData('smg_type', 'danger');
}

   }else{
      setFlashData('smg', 'Đăng kí không thành công');
      setFlashData('smg_type', 'danger');
   }
   reDirect('?module=auth&action=register');
   }else{
      setFlashData('smg', 'vui lòng nhập kiểm tra lại dữ liệu');
      setFlashData('smg_type', 'danger');
      setFlashData('errors', $errors); 
      setFlashData('old', $filterALL);// LƯU LẠI DỮ LIỆU CŨ 
      reDirect('?module=auth&action=register');
   }


 }

 layout('header', $data);

 $smg      = getFlashData('smg');
 $smg_type = getFlashData('smg_type');
 $errors   = getFlashData('errors');
 $old      = getFlashData('old'); // dữ liệu cũ sẽ được lưu lại ở trong biến $old 



// echo '<pre>';
// print_r($errors);
// echo '/<pre>';
?>




<div class="row">
   <div class="col-4" style="margin: 50px auto;">

   <h2 class=" text-uppercase"> Đăng kí User</h2>
   <?php 
      if(!empty($smg)){
         getSmg($smg, $smg_type);
      }   
   ?>
      <form action="" method="post">

         <div class="form-group mg-from">
               <label for=""> họ và tên </label> <br>
               <input name="fullname" type="fullname" class="from-control" placeholder="họ và tên" value="<?php
               echo old('fullname', $old); // kiểm tra xem nếu dữ liệu cũ đúng định dạng filter thì lưu lại mà không đúng thì xóa đi
               ?>">
               
               <?php 
                  echo from_errors('fullname', '<span class="loi">', '</span>', $errors);
               ?>

         </div>

         <div class="form-group mg-from">
            <label for=""> email</label> <br>
            <input name="email" type="email" class="from-control" placeholder="địa chỉ email"value="<?php
               echo old('email', $old); // kiểm tra xem nếu dữ liệu cũ đúng định dạng filter thì lưu lại mà không đúng thì xóa đi
               ?>">
            <?php 
                  echo from_errors('email', '<span class="loi">', '</span>', $errors);
               ?>
         </div>

         <div class="form-group mg-from">
            <label for=""> só điện thoại</label > <br>
            <input name="phone" type="number" class="from-control" placeholder="số điện thoại" value="<?php
               echo old('phone', $old); // kiểm tra xem nếu dữ liệu cũ đúng định dạng filter thì lưu lại mà không đúng thì xóa đi
            ?>">
            <?php 
                  echo from_errors('phone', '<span class="loi">', '</span>', $errors);
               ?>
         </div>

         <div class="from-group mg-from" >
            <label for=""> password</label><br>
            <input name="password" type="password" class="from-control" placeholder="mật khẩu">
            <?php 
                  echo from_errors('password', '<span class="loi">', '</span>', $errors);
               ?>
            
         </div>

         <div class="form-group mg-from">
            <label for=""> password</label> <br>
            <input name="password_confirm" type="password" class="from-control" placeholder="nhập lại mật khẩu">
            <?php 
                  echo from_errors('password_confirm', '<span class="loi">', '</span>', $errors);
               ?>
         </div>

         <button type="submit" class="mg-from btn-prinmary btn-clock"> Đăng ký</button> <hr>
         
         <p><a href="?module=auth&action=login"> Đăng nhập tài khoản</a></p>

      </form>
   </div>
</div>

<?php
   layout('footer');
?>