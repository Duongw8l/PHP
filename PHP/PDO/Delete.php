<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }?>
<?php

require_once "Connect_SQL.php";

$sql = "DELETE FROM hocsinh WHERE id = ?";

$id = 3;

try{
    $statement = $conn -> prepare($sql);

    $data = [$id];

    $deleteStatus = $statement -> execute($data);
    var_dump($deleteStatus);
} 
catch( Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'File' . $exp -> getFile(). '<br>';
    echo 'Line' . $exp -> getLine(). '<br>';

}