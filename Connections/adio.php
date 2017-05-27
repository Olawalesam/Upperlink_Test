<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_adio = "localhost";
$database_adio = "adio";
$username_adio = "root";
$password_adio = "";
$adio = mysql_pconnect($hostname_adio, $username_adio, $password_adio) or trigger_error(mysql_error(),E_USER_ERROR); 
?>