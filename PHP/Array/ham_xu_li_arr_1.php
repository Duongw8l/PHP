<?php 
/* 
--- hàm Cout: dùng để đếm chiều dài giống như hàm len--

-------------------------------------------------------------------
--- dùng hàm 'array_values($arr)': đưa về thành mảng tuần tự (key là 0,1,3)
                                vd: kay là 'address'--> [0]
                                            address --> [1]

-------------------------------------------------------------------
--- dung hàm 'array_keys($arr)': trả về mảng tuần tự với phần tử là key ban đầu
                                vd: khi dùng array_vlues để đưa từ address --> [0] 
                                --> sử dụng array_keys để đưa về mảng có key là[0] và phần tử là address

-------------------------------------------------------------------
--- dùng hàm array_pop($arr): trả về phần tử cuối cũng của mảng

-------------------------------------------------------------------
--- dùng is_array: để kiểm trả biến có phải 1 mảng hay không. IS_ARRAY LÀ TRUE VÀ !IS_ARRAY LÀ FALSE

*/
//-------------------------------------------------------------------
$arr = array (
    'address1' => 'nguyen',
    'address2' => 'minh',
    'address3' => 'duong'

);

//-------------------------------------------------------------------
//hàm count
echo 'dùng hàm count để in ra chiều dài'.'<br>';
echo count($arr).'<br>';
echo '<br>';
echo '<br>';



//-------------------------------------------------------------------
//hàm array_values
echo 'dùng array_value';
$arrvalues = array_values($arr);
echo '<pre>';
print_r($arrvalues).'<br>';
echo'</pre>';


//-------------------------------------------------------------------
// dùng array_keys
echo 'dùng array_keys';
$arrkeys = array_keys($arrvalues);

echo '<pre>';
print_r($arrkeys).'<br>';
echo'</pre>';


//-------------------------------------------------------------------
//dùng array_pop
echo 'dùng array_pop';
$arrpop = array_pop($arr);

echo '<pre>';
print_r($arrpop).'<br>';
echo'</pre>';






////////////////////////
echo '<pre>';
print_r($arr);
echo'</pre>';