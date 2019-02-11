<?
define('CONSUMER_KEY', '6XIk781PMICfV2w19BfQLw');
define('CONSUMER_SECRET', 'RoxBuNOkrln51abF0XT9IXevKCmbyo3dCJb435SOc4');
define('OAUTH_CALLBACK', '.index.php');
$db_host="localhost";
$db_user="gretong1_a";
$db_name="gretong1_c";
$db_pass="dhimas";
$site="Tampan";
$admin="Tampan";
$connect	=mysql_connect($db_host,$db_user,$db_pass);
$cekdb		=mysql_select_db($db_name,$connect);
?>