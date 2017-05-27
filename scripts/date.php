<?php
//getting server date
$thisDa = date('D');
$thisDay = date('d');
$thisMonth = date('M');
$thisMonths = date('m');
$thisYear = date('Y');
$thisHour = date('H');
$thisMinute = date('i');
$thisSec = date('s');
$thisdn = date('a');
$timing= "$thisHour : $thisMinute : $thisSec $thisdn";
$logdate= "$thisDay - $thisMonth - $thisYear";
$dbdate= "$thisYear-$thisMonths-$thisDay";
//$today= "Today is $thisDa, $thisDay $thisMonth, $thisYear"; 
?>