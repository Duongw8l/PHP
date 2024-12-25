<?php


 $demsochan = 0;
 $demsole = 0;

 $resultsochan = 0;
 $resultsole = 0;

 for($i = 0; $i <= 100; $i++){
    if( $i % 2 == 0 ){
        $resultsochan.=$i.'<br>';
        $demsochan++;
    }
    else{
         $resultsole.=$i;
         $demsole++;
    }
 }
 echo "tim thay so chan".$demsochan."so chan" .'<br>'. $resultsochan;


echo " vòng lặp while";
echo '<br>';
 $i = 0;
 while( $i < 10){
    echo $i;
    $i++;
 }


 echo '<br>'." vòng lặp do while";
 $j = 0;
 do{
    echo $j.'<br>';
    $j++;
 }while($j < 10);

