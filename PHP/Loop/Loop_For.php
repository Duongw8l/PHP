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