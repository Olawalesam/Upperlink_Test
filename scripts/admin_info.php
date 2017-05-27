<?php
//database connection

/*
$sql="select * from adminmail where user='$user'";
$result = mysql_query($sql) or die(mysql_error());
$recs=mysql_fetch_array($result);
*/
$sql2="select * from subscribers";
$result2 = mysql_query($sql2) or die(mysql_error());
$join="";

while($recs2=mysql_fetch_array($result2))
{
	$join=$join.$recs2['email'].", ";
	$emails=$join;
}
$emails=substr($emails, 0, -2);

$seperate= split(",",$emails);
$total_recipient = count($seperate);

?> 