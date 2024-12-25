<?PHP

const _MODULE = 'home';
const _ACTION = 'dasboard';

const _CODE = true;


if(!defined('_CODE')){ // kiểm tra hằng số có tồn tại hay không - trường hợp không tồn tại
    die('access define ...');
 }

 //thiết lập host
 define('_WEB_HOST','http://'. $_SERVER['HTTP_HOST'].'/'. 'hocphp/quanlinguoidung'  );
 define('_WEB_HOST_TEMPLATES', _WEB_HOST. '/templates');

 //THIẾT LẬP PATH

 define( '_WEB_PATH', __DIR__ );
 define('_WEB_PATH_TEMPLATES', _WEB_PATH. '/templates');

 // thông tin kết nối
const _HOST = 'localhost';
const _DB = 'duong_php';
const _USER = 'root';
const _PASS = '';