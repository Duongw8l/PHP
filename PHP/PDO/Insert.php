<?php
/*      connect   prepare dùng để tăng cường bảo mật   
$stmt = $conn -> prepare( 'INSERT INTO user (user, password, create_at, status)
                 value (:username, :password, :create_at, :status)');
$username = 'hoangan.web';
$password = '123456';
$now = date('y-m-d H-i-s');
$status = 1;
$stmt -> bindParam(':username', $username);  dùng bindParam để truyền dữ liệu vào biến
$stmt -> bindParam(':password', $password);
$stmt -> bindParam(':create_at', $now);
$stmt -> bindParam(':status', $status);
$stmt -> execute(); //chạy câu lệnh SQL
*/
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }?>
<?php
require_once "Connect_SQL.php";
$sql = "INSERT INTO  hocsinh(id,age) value (:id, :age)";
// để xảy ra lỗi mà vẫn chạy thì nên cho vào try-catch
try{
    $statement = $conn -> prepare($sql);
    $id = 3;
    $age = 20;
    // $statement -> bindParam(':id', $id);         //đây là sử dụng bindParam
    // $statement -> bindParam(':age', $age);

    //sử dụng cách khác
    $data = [
        //key    value
        'id' => $id,
        'age' => $age
    ];
    $insertStatus = $statement -> execute($data);  // dùng để chạy
    
}
catch( Exception $exp ){
    echo $exp -> getMessage().'<br>';
    echo 'File' . $exp -> getFile(). '<br>';
    echo 'Line' . $exp -> getLine(). '<br>';
}

                 