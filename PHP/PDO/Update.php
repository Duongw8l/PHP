<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }?>
<?php

require_once "Connect_SQL.php";

$sql = "UPDATE hocsinh SET id = :id, age = :age WHERE id =:id ";

//data
   $id = 3;
   $age = 26;

   try{



    $statement = $conn -> prepare($sql);

   //  $statement ->bindParam(':id', $id);
   //  $statement -> bindParam(':age', $age);
   $data = [
      'id' => $id,
      'age' => $age
   ];

    $updateStatus = $statement -> execute($data);
   }
   
   catch( Exception $exp){
    echo $exp -> getMessage().'<br>';
    echo 'Line' .$exp -> getLine().'<br>';
    echo 'File' .$exp -> getFile().'<br>';

   }