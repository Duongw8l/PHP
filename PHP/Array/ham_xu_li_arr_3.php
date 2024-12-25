<?php 
/* 
sort( $array): hàm có tác dụng sắp xếp lại mảng theo chiều tăng dần và trả về giá trị TRUE nếu thánh công


array_reverse($array): hàm có tác dụng đảo ngược lại vị trí của các phần tử trong mảng


array_merge($array, $array): hàm có tác dụng gộp 2 hay nhiều mảng thành 1 mảng 



array_rand( $array,$number): hàm có tác dụng lấy ra key ngẫu nhiên trong mảng với number là số lượng muốn lấy
*/

$arr = ['nguyen', 'minh', 'duong'];
$arr2 = ['lionel', 'messi'];

echo '<pre>';
echo print_r($arr);
echo '</pre>';


echo 'dùng hàm sort để sắp xếp thoe chiều tăng dần';

$sortarr = sort($arr);

echo '<pre>';
echo print_r($arr);
echo '</pre>' . '<br>';
//-------------------------------------------------------------------

echo 'dùng hàm reverse để đảo ngược phần tử';

$reverseArr = array_reverse($arr2);

echo '<pre>';
echo print_r($reverseArr);
echo '</pre>' . '<br>';

//-------------------------------------------------------------------
echo 'dùng array_merge để gộp mảng';

$mergeArray = array_merge($arr, $arr2);

echo '<pre>';
echo print_r($mergeArray);
echo '</pre>' . '<br>';

//-------------------------------------------------------------------
echo 'dùng hàm array_rand';

$arrRand = array_rand($arr, 2);

echo '<pre>';
echo print_r($arrRand);
echo '</pre>' . '<br>';