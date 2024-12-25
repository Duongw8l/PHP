<form method="post" action="xu_li.php" enctype="multipart/form-data" >
    <input type = "file" name="duong_upload">
    <button type="submit"> tải lên </button>
</form>

<?php
// muốn lưu hình ảnh vào đầu đó thì phải dùnn move_uploaded_file() sẽ gồm tên file và nơi muons chuyển tới 

$result = move_uploaded_file($_FILES['duong_upload']['tmp_name'] , 'C:\xampp\htdocs\hocphp\uploadFILE' . $_FILES['duong_upload'] ['name'] );


var_dump($result);


?>