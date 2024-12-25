<?php
/* Client gửi lên: phương thức get là phương thức gửi dữ liệu thông qua đường dẫn URL nằm treent hành địa chỉ của browser.
Server sẽ nhận đường dẫn đố và phân tích về kết quả cho bạn.

vd:/
   với URL duongw? id= 28 thì sẽ nhận được giá trị id là 28


    SERVER nhận dữ liệu : tất cả các dữ liệu client gửi lên bằng phương thức get 
    đều được lưu trong 1 biến toàn cục mà PHP tự tạo ra đó là biến $get, 
    biến này là kiểu kết hợp lưu trữ danh  sách dữ liệu từ client gửi lên theo qui luật key => value


    */
    echo '<pre>';
    print_r($_GET);
    echo '</pre>';


    // nó sẽ ở đưới dạng ?module=home&duong=get&id=1

    //nếu truyền duong vào get thì sẽ in ra get và truyền id cũng vậy
    echo '<pre>';
    print_r($_GET['duong']);
    echo '</pre>';

    //phải kiểm tra xem đã có biến duong hay chưa 
    if(isset($_GET['duong'])){
        echo '<pre>';
        print_r($_GET['duong']);
        echo '</pre>';
    }else{
        echo ' chua có biến ';
    }