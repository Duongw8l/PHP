<?php 
$arr = array(
    [
        'so mot',
        'so hai',
        'so ba'
    ],
    'js',
    'html');


$arr2 = [
    'address' => [
        'name' => [
            'ho' => 'Nguyen',
            'ten' => 'Duong'
        ],
        'email' => 'minhduong282004@gmail.com'
    ],

    'address2' => [
        'name' => [
            'ho' => 'Pham',
            'Ten' => 'Dong'
        ],
        'email' => 'Duongrua2808@gmail.com'
    ],

    'address3' => [
        'name' => [
            'ho' => 'Vu',
            'ten' => 'Bac'
        ],
        'email' => 'cocailon@gmail.com'
    ]
    ];



    //echo $arr2['address']['name']['ho'] . '<br>';
//dùng vòng lặp for để duyệt mảng tuần tự 
    if( !empty($arr)) {  // dùng để kiểm tra mảng có rỗng hay không
         for( $i = 0; $i < count($arr); $i++) {
            if(is_array($arr[$i])){ // kiểm tra biến có phải 1 mảng hay không
                if(!empty($arr[$i])) {
                    for( $j = 0; $j < count($arr[$i]); $j++) {
                        echo $arr[$i][$j];
                    }
                }

            }
            else{
                echo $arr[$i] . '<br>'; }
         }
    }

//DUNG FOR-EACH để duyệt mảng không tuần tự 

if (!empty($arr2)){
    foreach ($arr2 as $item){
        if(is_array($item)){
            if(!empty($item)){
                foreach($item as $sub_item){
                    if(is_array($sub_item)){
                        if(!empty($sub_item)){
                            foreach($sub_item as $sub_item2 ){
                                echo $sub_item2 . '<br>';
                            }
                        }
                        
                    }
                    else{
                        echo $sub_item;
                    }
                }
            }
        }
        else{
            echo $item;
        }
    }
}
