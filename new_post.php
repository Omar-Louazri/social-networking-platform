<?php


$time_start = microtime(true);
$time_end  = $time_start + 7200; //2 hours (*3600) --> 7200
echo $time_end."<br>";
$time_end  = 1609509500.000;

if($time_end <= $time_start){
    echo  $time_start."<br>";
    echo  $time_end."<br>";
    echo 'now you can post';
}else{
    echo  $time_start."<br>";
    echo  $time_end."<br>";
    
    echo 'you need to wait ( '. ($time_end - $time_start) .' ) ';
}

?>