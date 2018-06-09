<?php

$today = getdate();

$year = $today['year'];
$month = $today['mon'];
$day = $today['mday'];

if($month<10){
    $month = "0$month";
}

if($day<10){
    $day = "0$day";
}

$data = "$year-$month-$day";

?>