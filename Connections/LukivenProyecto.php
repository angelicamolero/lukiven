<?php
error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_LukivenProyecto = "localhost";
$database_LukivenProyecto = "proyectopendriver";
$username_LukivenProyecto = "root";
$password_LukivenProyecto = "";
$LukivenProyecto = mysql_pconnect($hostname_LukivenProyecto, $username_LukivenProyecto, $password_LukivenProyecto) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_set_charset('utf8');
?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php include 'funciones.php'; ?>
