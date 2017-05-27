<?php
##########################################
include("sessions.php");
include("dbconf.php");
##########################################
$_SESSION = array();
session_destroy();
header("Location:../index.php");
exit;
?>