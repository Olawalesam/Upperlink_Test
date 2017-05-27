<?php

$DBName = "proven";
$DBUser = "root";
$DBPassword = "";
$DBHost = "localhost";


global $DBHost,$DBUser,$DBPassword;
 $conn=mysql_connect($DBHost,$DBUser,$DBPassword) or die("Cannot Connect To Database");
 mysql_select_db($DBName,$conn) or die("Selection of Database Failed!"); 
 ?>