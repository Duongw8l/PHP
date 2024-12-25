

<?php
/* 

try{

}
catch(){

}
-> xử lý ngoại lệ khi chương trình gặp lỗi
*/
$age = 18;
try{
    // gõ code
    echo 'trên đây gõ code, lỗi thì sẽ đẩy xuonfsg catch';
    //duong();
    if($age < 20){
// trong trường hợp không lỗi mà vẫn muốn nó chạy xuống catch thì thầm throw new Exception
        throw new Exception('tuổi phải lớn hơn 20');

    }

}
catch ( Error $exception){
    echo $exception -> getMessage().'<br>';
    echo 'file' . $exception -> getFile().'<br>';  
    echo 'Line' . $exception -> getLiNe().'<br>';  

}

catch ( Exception $exception){
    echo $exception -> getMessage().'<br>';
    echo 'file' . $exception -> getFile().'<br>';  
    echo 'Line' . $exception -> getLiNe().'<br>';  

}
echo '<br>';
echo ' vẫn chạy bình thường';