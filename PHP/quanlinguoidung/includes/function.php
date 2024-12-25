 <!-- các hàm chung của project-->

 <?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;

function layout( $layoutName = 'header', $data=[]){
   if(file_exists(_WEB_PATH_TEMPLATES . '/layout/'.$layoutName.'.php')){                              
      require_once _WEB_PATH_TEMPLATES . '/layout/'.$layoutName.'.php';
   }
}
 
function sendmail($to, $subject, $contend  ){
   
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
// //Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'minhduong282004@gmail.com';                     //SMTP username
    $mail->Password   = 'fudq kpqe qtkh gaqy ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('duonghnue2808@gmail.com', 'Mailer');
    $mail->addAddress($to);     //Add a recipient
   //  $mail->addAddress('ellen@example.com');               //Name is optional
   //  $mail->addReplyTo('info@example.com', 'Information');
   //  $mail->addCC('cc@example.com');
   //  $mail->addBCC('bcc@example.com');

   //  //Attachments
   //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail -> CharSet = "UTF-8";
    $mail->isHTML(true);          
                            //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $contend;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //PHPMailer SSL certificate verify failer
    $mail -> SMTPOptions = array(
      'ssl' => array(
         'vertify_peer' => false,
         'vertify_peer_name' => false,
         'allow_self_signed' => true
      )
    );
   $mail->send();
   // $sendmail = 
   //  if($sendmail){
   //    return $sendmail;
   // }
     echo 'Gửi thành công';
} catch (Exception $e) {
    echo "Gửi mail thất bại. Mailer Error: {$mail->ErrorInfo}";
}
}

// kiểm tra phương thức POST
function isPost(){
   if( $_SERVER['REQUEST_METHOD'] === 'POST'){
      return true;
   }
   return false;
} 

//kiểm tra phương thức GET
function isGet(){
   if( $_SERVER['REQUEST_METHOD'] === 'GET'){
      return true;
   }
   return false;
} 

// hàm học dữ liệu
function filter(){
   $filterArr = [];
   if(isGet()){
      if(!empty($_GET)){
      foreach($_GET as $key => $value)
      {
         $key = strip_tags($key);
         if(is_array($value)){
            $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
         }
         else{
            $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
         }
      }      
   }  
   }

   if(isPost()){
      if(!empty($_POST)){
      foreach($_POST as $key => $value)
      {
         $key = strip_tags($key);
         if(is_array($value)){
            $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
         }
         else{
            $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
         }
      }      
   }  
   }
   return $filterArr;

}

// hàm kiểm tra email
function isEmail($email){
   $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
   return $checkEmail;
}

//hàm kiểm tra sô nguyên INT
function isNumberInt( $number){
   $checkNumber = filter_var($number,FILTER_VALIDATE_INT);
   return $checkNumber;
}

//hàm kiểm tra số thực
function isNumberFloat( $number){
   $checkNumber = filter_var($number,FILTER_VALIDATE_FLOAT);
   return $checkNumber;
}

//hàm kiểm tra số điện thoại
function isPhone($phone){
   $checkZero = false;
   if (strlen($phone) == 10 && $phone[0] == '0') { //điều kiện 1: số đầu tiền có phải số 0 hay không
      $checkZero = true;
      $phone = substr($phone,1);
   }
   //dk2: đằng sau có 9 số hay không
   $checkNumber = false;
   if(isNumberInt($phone) && (strlen($phone) ==9 )){
      $checkNumber = true;
   }
   if($checkZero && $checkNumber){
      return true;
   } return false;
}

//thông báo lỗi
function getSmg( $smg, $type = 'success'){
   echo '<div class="alert alert-'.$type.'">';
   echo $smg;
   echo '</div>';
}

//hàm chuyển hướng
function reDirect( $path='index.php'){
   header("location: $path");
   exit;

}
// hàm thông báo lỗi
function from_errors($filename, $beforeHtml='', $afterHtml ='', $errors){
   return  (!empty($errors[$filename])) ? '<span class="loi">'.reset($errors[$filename]).'</span>' : null;
}

// hàm hiển thị dữ liệu cũ 
function old($filename, $olDadta, $default=null){
   return (!empty($olDadta[$filename])) ? $olDadta[$filename] : $default;
}

//hàm kiểm tra trạng thái đăng nhập
function isLogin(){
   $checkLogin = false;
if(getSession('tokenlogin')){
  $loginToken = getSession('tokenlogin');

  //kiểm tra xem có giống trong database
  $queryToken = getOneRaw(" SELECT user_ID FROM tokenlogin  WHERE token = '$loginToken' ");
  if(!empty($queryToken)){
    $checkLogin = true;
  } else{
    removeSession('tokenlogin');
  }
  return $checkLogin;
}
}
?>

