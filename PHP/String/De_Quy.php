<?php
/* 
dãy số fibonacci; 0, 1, 1, 2, 3, 5, 8, 13,....
--- số tiếp theo sẽ bằng 2 số trước +;
*/

function fibonacci($n) {
    if ($n == 0 || $n == 1){
        return $n;
    }
    return fibonacci($n - 1) + fibonacci($n - 2);
}

echo fibonacci(6);


/*
khi chạy nó sẽ kiểm tra nó có nằm trong điều kiện IF hay không, nếu không thì sẽ chạy lại hàm 1 lần nữa 
--fibonacci(6)--
==> fibonacci(6-1) + fibonacci(4) = [fibonacci(5 - 1) + fibonacci(5 - 2)] +[(fibonacci(4-1)) + fibonacci(4-2)]; ....;
*/ 