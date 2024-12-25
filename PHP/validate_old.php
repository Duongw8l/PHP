

<form method="post" action="">
    <p>
        Họ tên:
        <input type="text" name="fullname" placeholder="Họ và tên" value="">
        <?php echo !empty($error['fullname']['require']) ? ($error['fullname']['require']): ''; ?>
        <?php echo !empty($error['fullname']['min-len']) ? '<span style="color: red;">' . htmlspecialchars($error['fullname']['min-len'], ENT_QUOTES, 'UTF-8') . '</span>' : ''; ?>
    </p>
        email:
        <input type="text" name="email" placeholder="email">
    </p>

    <button type="submit"> xác nhận </button>
</form>

<?php 
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // nếu post không rỗng
    
    if (empty($_POST['fullname']))
    { // nếu post fullname rỗng
        $error['fullname']['require'] = 'bắt buộc phải nhập họ tên';
    }

    else{
        if(strlen($_POST['fullname']) < 5){ // nếu ít hơn  5 ký tự 
            $error['fullname']['min-len'] = 'họ và tên phải lớn hơn hoặc bằng 5 ký tự ';
                 // key 
        }sd
    }

    // bắt lỗi email
    if(empty($_POST['email'])){
        $error['email']['require'] = 'vui lòng nhập email';
    }
    else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){ // nếu không đúng định dạng
             $error['email']['require'] = ' email không đúng định dạng';
        }
    }

    if(empty($error)){ //nếu error rỗng-> không có lỗi 
        echo ' validate thành công, không xuất hiện lỗi';
    }
    else{
        echo 'có lỗi xảy ra';
    }
    
}
echo '<pre>';
print_r($error);
echo '</pre>'
?>