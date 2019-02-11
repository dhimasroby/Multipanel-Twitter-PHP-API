<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");

include('html.inc'); 

include('menu.php');
echo "<div class=\"body\"><center>Jumlah Member Saat Ini</br>";
$result = mysql_query("SELECT * FROM twitter_access_tokens");
$num_rows = mysql_num_rows($result);
{
echo "<b><font size=\"\"color=\"black\">".$num_rows."</font> Orang</b>";
}
 echo "</center></div>";

/* Include HTML to display on the page. */
print_r($access_token);
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<br/></center></div></div>";
echo "</center></div>";

include('./footer.php');
 ?>