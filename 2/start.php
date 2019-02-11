<?
define('CONSUMER_KEY', 'yT577ApRtZw51q4NPMPPOQ');
define('CONSUMER_SECRET', '3neq3XqN5fO3obqwZoajavGFCUrC42ZfbrLXy5sCv8');
define('OAUTH_CALLBACK', '.index.php');
$db_host="localhost";
$db_user="gretong1_a";
$db_name="gretong1_b";
$db_pass="dhimas";
$site="Tampan";
$admin="Tampan";
$connect	=mysql_connect($db_host,$db_user,$db_pass);
$cekdb		=mysql_select_db($db_name,$connect);
?>