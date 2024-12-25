<?php

//set cookie
setcookie('user',
 'duongw',
  time() + 86400,
   '/hocphp',
  false,
  true
);

/* đọc cookie
  cú pháp: $_COOKIE[$name]
  trong đó: $_COOKIE: biến siêu toàn cục của php ( là mảng chứa các cookie)
  $name: tên cookie cần lấy 
  */
//đọc cookie
echo $_COOKIE['user'];

// để k bị mất cookie sau tắt trình duyệt thì phải cài đặt thòi gian 


//xóa cookie
/* để xóa cookie cùng tên với thời gian đã hết hạn
cú pháp: setcookie($name, time() - 60)
trong đó:
$name: tên cần xóa
copy ý nguyễn bên trên xuống thay mỗi -60