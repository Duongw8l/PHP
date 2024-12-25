<?php 
/*
array_push($array, $var, $var) :thêm 1 hoặc nhiều phần tử vao cuối mảng và trả về số lượng phần tử

array_shift($array: xóa phần tử đầu tiên và trả về phần tử vừa xóa 

array_unshift($array, $var, $var, ...): thêm phần tử vào đầu mảng, và trả về số lượng phần tử của mảng sau khi thêm 

in_array($array, $array): hàm có tác dụng kiểm tra xem mảng $array có tồn tại giá trị $value không? va trả về TRUE nếu có và ngược lại

*/

$arr = ['nguyen', 'minh', 'duong'];

$arrpush = array_push($arr,'vcl');

echo 'dùng hàm array_push'.'<br>';
echo '<pre>';
print_r($arr).'<br>'; // in ra mảng đã thêm vào
echo'</pre>';
echo $arrpush; // trả về sô lượng phần tử của mảng sau khi thêm 

//-------------------------------------------------------------------
echo 'dùng array_shift để xóa phần tử đầu tiên trong mảng';
$arrshift = array_shift($arr);
echo '<pre>';
print_r($arr).'<br>'; // in ra mảng đã thêm vào
echo'</pre>';

echo $arrshift.'<br>'; // trả về phần tử vừa xóa 

//--------------------------------------------------------------------
echo 'sử dụng array_unshift để thêm phần tử vào đầu mảng và trả về số lượng phần tử vừa thêm';

$arrUnshift = array_unshift($arr, 'thang', 'deptry');
echo '<pre>';
print_r($arr).'<br>'; // in ra mảng đã thêm vào
echo'</pre>';

echo $arrUnshift.'<br>'; // trả về số lượng phần tử vừa thêm

//--------------------------------------------------------------------
echo 'dùng in_array để kiểm tra xem mảng có tồn tại hay không'.'<br>';
$inArr = in_array('minh', $arr);
echo 'hết quả là: ' . $inArr;


