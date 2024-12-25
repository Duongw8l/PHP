<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }?>
<?php
require_once "Connect_SQL.php";

$sql = "SELECT * FROM hocsinh WHERE id = ?";

try{
    $statement = $conn -> prepare($sql);

    //$ARR = [$ID]
    $statement -> execute([2]);
    $data = $statement -> fetch(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r( $data );
    echo '</pre>';
}
catch( Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'File' . $exp -> getFile(). '<br>';
    echo 'Line' . $exp -> getLine(). '<br>';

}
