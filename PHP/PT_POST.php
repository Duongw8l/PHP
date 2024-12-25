
<form method="post" action="">
    <input type="text" name ="fullname" placeholder="họ và tên ">
    <input type="text" name ="email" placeholder="email">
    <button type="submit">Gửi</button>
    
</form>

<?php

echo '<pre>';
print_r($_POST['email']);
echo '</pre>';

//cũng giống như phương thức get, thì ở post chúng ta cũng phải kiểm tra xme có tồn tại hay không