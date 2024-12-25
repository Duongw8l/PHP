<?php
/* TimeStamp: số giấy tính từ thời điểm 00:00:00 1/1/1070 đến thời điểm cần xác định

--> TimeZone: date_default_Timezone_set(),  date)default_timezone_get()

--> hàm Date() sẽ xuất ra một chuỗi thời gian dựa  theo định dạng được truyền và số nguyên timestamp

--> cú phát: date( $format, $timestamp);
//---------------------------------------------------------
trong đó : 
       --> $format là đinh dạng thời gian mà hàm sẽ trả về 
        
       --> $timestamp là một số nguyên timestamp, nếu không truyền tham số này
        , nó sẽ lấy timestamp của thời điểm hiện tại

*/

//---------------------------------------------------------
/*
hàm time(): sẽ lấy time stamp của thời điểm hiện tại. hàm sẽ trả về số giây tính từ thời điểm 00:00:00 1/1/1970 đến thời điểm hiện tại


hàm strtotime: sẽ phân tích bất kỳ chuỗi thời gian bằng tiếng anh thành dạng timestamp của thời gian đó 

*/


date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date('y:m:d H:i:s');
echo  $date.'<br>';
echo date_default_timezone_get() . '<br>';

echo ' Timestamp của thời điểm hiện tại: ' . time(). '<br>';
 

// now, 21 march 1996, next monday -> strtotime

echo strtotime('now') . '<br>'; // hiểu được chữ tiếng anh để chuyển thành thời gian 
echo strtotime('21 march 1996') . '<br>';