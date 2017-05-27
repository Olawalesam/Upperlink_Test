<?php
//include("sessions.php");
include("dbconf.php");
include("date.php");

//sql statements for login form
$ident=$_GET["ident"];


$ssql="Delete from subscribers where id='$ident'";
$sresult=mysql_query($ssql)or die(mysql_error());

header("Location:../admin/view_subscribers.php");
 
	 
?>