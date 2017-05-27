<?php
//database connection


//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
   //we give the value of the starting row to 0 because nothing was found in URL
   $startrow = 0;
//otherwise we take the value from the URL
} else {
   $startrow = (int)$_GET['startrow'];
 }


$sql="select * from subscribers ORDER BY id DESC LIMIT $startrow, 10";
$result = mysql_query($sql) or die(mysql_error());

?> 