<?php
// toan tu 3 ngoi
$a = -1;
echo ($a < 0) ? "bien A am" : "bien A duong";

//cú pháp thay thế if else
if ($a < 0):
    ?>
    <ul>
        <li>duong</li>
        <li>duong2</li>
        <li>duong3</li>
    </ul>
    <?php
    else:
        echo " tôi đẹp trai ";
    endif;

    // cú pháp thay thế for
    //endif = endfor = end...