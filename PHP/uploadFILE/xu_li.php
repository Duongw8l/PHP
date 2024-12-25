<?php


if( !empty($_SERVER['REQUEST_METHOD'])) {
    echo '<pre>';
    print_r ($_FILES);
    echo '</pre>';
}

echo ' trang xử lý '; 


$result = move_uploaded_file($_FILES['duong_upload']['tmp_name'] , 'C:\xampp\htdocs\hocphp\uploadFILE\upload' . $_FILES['duong_upload'] ['name'] );


var_dump($result);
?>