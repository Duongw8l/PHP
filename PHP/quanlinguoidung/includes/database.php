<!--sử lí data liên quan đến cơ sử dữ liệu -->
<?php
 if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }
// tạo 1 hàm để thao tác trực tiếp với các file như insert, delete, ....


function query($sql, $data=[], $check = false) {
   global $conn;
    $ketqua = false;
   // echo $sql;
   // die();
   try{
      $statement = $conn -> prepare($sql);
      if(!empty($data)){
         $ketqua = $statement -> execute($data); // hàm empty sẽ trả về true nếu data trống
      }
      else{
         $ketqua = $statement -> execute(); //nếu biến data trống 
      }
  
  }
  catch( Exception $exp ){
      echo $exp -> getMessage().'<br>';
      echo 'File' . $exp -> getFile(). '<br>';
      echo 'Line' . $exp -> getLine(). '<br>';
      die();
  }
  if($check){
   return $statement;
   }
  return $ketqua;
}

function insert($table, $data){ 
   $key = array_keys($data);
   $truong= implode(',', $key);
   $valueTable = ':' . implode(', :', $key);  // Sửa lại cú pháp đúng của placeholder
                   // sửa dòng này để tạo đúng cú pháp
   
   $sql = 'INSERT INTO ' . $table . ' (' . $truong . ') VALUES (' . $valueTable . ')';

   $kq = query($sql, $data);
   return $kq;
}

function update($table, $data, $condition = ''){//$condition là biến điều kiện nó sẽ update ở đâu,...
   $update = '';
   foreach($data as $key => $value){
      $update .= $key .'=:' . $key .',';
   }
   $update = trim($update, ','); //loại bỏ dấu , cuối cùng

   if(!empty($condition)){ //nếu điều kiện tồn tại
      $sql = 'UPDATE '. $table . ' SET ' .$update . ' WHERE '. $condition;
   }else{
      $sql = 'UPDATE '. $table . ' SET ' .$update;
   }

   $kq = query($sql, $data);
   return $kq;

}

function delete($table, $data, $condition = ''){
   if(!empty($condition)){
      $sql = 'DELETE FROM ' .$table;
   }else{
      $sql = 'DELETE FROM ' .$table . ' WHERE ' . $condition;
   }

   $kq = query($sql, $data);
   return $kq;

}


//LẤY RA NHIỀU DÒNG DỮ LIỆU
function getRaw($sql){
   $kq = query($sql,'',true);
   if(is_object($kq)){
      $dataFetch = $kq -> fetchALL(PDO::FETCH_ASSOC);
   }
   return $dataFetch;
}

//LẤY RA 1 DÒNG DỮ LIỆU
function getOneRaw($sql){
   $kq = query($sql,'',true);
   if(is_object($kq)){
      $dataFetch = $kq -> fetch(PDO::FETCH_ASSOC);
   }
   return $dataFetch;
}

//ĐẾM SỐ DÒNG DỮ LIỆU
function getRows($sql){
   $kq = query($sql,'',true);
   if(!empty($kq)){
      return $kq-> rowCount();
   }
}