<?php
//database connections
include("dbconf.php");
	
$user= $_POST['username'];
$pass= $_POST['password'];

//echo "$user -- $pass";


//echo "$fn == $ln == $tel == $em";

$sql="select * from adminmail where user='$user' and pass='$pass'";
$result = mysql_query($sql) or die(mysql_error());
$rows=mysql_num_rows($result);
if($rows != 1)
{
	header("Location: ../login.php?err=1");
}
else
{
	//establsh session																	
    $_SESSION['user'] = $user;
    session_register('user');
	//checking that session is established before redirecting
    if (session_is_registered('user'))
     {
		header("Location: ../home.php");
	 }
}


?> 