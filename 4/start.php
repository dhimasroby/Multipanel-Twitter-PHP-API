<?
define('CONSUMER_KEY', 'xCgJn9R7CI1zKcj4jdAAnw');
define('CONSUMER_SECRET', 'i3vrK5fhacyWwmNrSOTzHCmVCnA0BUVCsHdvgAtsess');
define('OAUTH_CALLBACK', '.index.php');
$db_host="localhost";
$db_user="gretong1_a";
$db_name="gretong1_d";
$db_pass="dhimas";
$site="Tampan";
$admin="Tampan";
$connect	=mysql_connect($db_host,$db_user,$db_pass);
$cekdb		=mysql_select_db($db_name,$connect);
?>