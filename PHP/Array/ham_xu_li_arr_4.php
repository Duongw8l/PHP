<?php
/* 
array_search($keyword, $array): hàm có tấc dụng tìm kiếm giá trị của mảng và trả về key của phần tử đó

array_slide($array, $begin, $lenght): hàm có tác dụng lấy ra $len phần tử bắt đầu $begin trong mảng

array_unique($array): hàm có tác dụng loại bỏ các phần tử trùng nhau trong mảng và trả về mảng mới sau khi loại bỏ

array_key_exits($key, $array): kiểm tra xem mảng $array có tồn tại khóa $key hay không. trả về true nếu tồn tại
*/

$arr = [
    'Nguyen',
    'Minh',
    'Duong',
    'dep',
    'trai',
    'trai'

];
echo 'sử dụng hàm array_search' . '<br>';
$arrSearch = array_search('Minh', $arr);
echo $arrSearch.'<br>';
//-----------------------------------------------------------

echo ' sử dụng hàm array_slide'.'<br>';
$arrSlide = array_slice($arr, 2, 3);
echo '<pre>';
echo print_r($arrSlide);
echo'</pre>';

//-----------------------------------------------------------
echo 'sử dụng hàm array_unique'.'<br>'; // loại bỏ các phần tử tùn nhau 

$arrUnique = array_unique($arr);

echo '<pre>';
echo print_r($arrUnique);
echo'</pre>';

//-----------------------------------------------------------
echo 'sử dụng hàm array_key_exits';

$arrKey = array_key_exists(0, $arr);

echo '<pre>';
echo print_r($arrKey);
echo'</pre>';

var_dump($arrKey);



