<?PHP
$bien1 = 'duong';
$bien2 = 'duong dep try';

define ('_AGENCY', 'duonggggg');
define ('_AGENCY2', "duong dep trai");

$duong = 'tổng quan';

echo "vũ trụ marketing 'duong' ";
echo '<br>';
echo "vũ trụ marketing $duong ";
echo '<br>';
echo "vũ trụ marketing \'duong\' ".'<br>';

//các hàm hay sử dụng

// explode : chuyển từ string thành các mảng
// explode : ("ký tự ngăn cách", string)
// vd: $string = 'toi / dep / trai' =>  $arr = explode ('/',$string)

$string = 'toi / dep / trai'.'<br>';
$arr = explode('/', $string);


var_dump($string);
var_dump($arr);
print_r($arr);


// implode
$string2 = implode('', $arr);
echo '<br>';
echo $string2;echo '<br>';



//strlen 
$string3 = 'học lập trình php';
echo strlen($string3);echo '<br>';


// str_word_count
echo str_word_count($string3);echo '<br>';


// htmlentitis
echo htmlentities('<p> duong </p>');


// html_entity_decode
$str = html_entity_decode('<h1>duong<h1>');
echo html_entity_decode($str);


//substr
$string4 = "hoc lap trinh php";
$string5 = substr($string4, 4, 3);
echo $string5; echo '<br>';


//strstr; cắt từ chữ lap
echo strstr($string4,'lap' );echo '<br>';


//strpos: tìm chuỗi con trong chuoi cha

$string6 = strpos($string4, 'php');
echo $string6;echo '<br>';

//substr_replace()
echo substr_replace($string4, 'pentest', 14, 3 );echo '<br>';
                //   |               |
//        chuỗi cần thay thế   chữ muốn thay vào   chứ muốn bỏ đi ở vị trs nào có bn kí tự 



//strtolower(): chuyển hết sang thường
echo strtolower('DUONG DEP TRAI');echo '<br>';

//STRTOUPPER: SANG HOA
echo strtoupper('duong dep trai vcl');echo '<br>';


//ucfirst(): chữu đầu tiên sang hoa
echo ucfirst('dUONG');echo '<br>';


//lcfirst: viết thường >< ucfirst
echo lcfirst('Duong');echo '<br>';


//ucwords(): tất cả chu cai dau tirien sang viêt thường
echo ucwords('duong dep trai quá');echo '<br>';


//trim xóa kí tự đầu và cuối, ng dung nhập có khaongr trắng ở đầu và cuối thì sẽ cóa
echo trim('k toi dep trai k','k').'</br>';

//json_encode và json_decode
$arrr = [1, 2, 3, 4, 5];
$jencode = json_encode($arrr);
echo $jencode.'</br>';




