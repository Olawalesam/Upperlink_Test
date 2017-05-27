<?php
session_start();
if (empty($user)) 
  {
   $user = $_SESSION["user"];
  }
   session_register("user");
  
   if(!$_SESSION["user"])
   {
	header("location: index.php");
	exit;
   }
?>