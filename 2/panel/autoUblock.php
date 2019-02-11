<?php
require_once("../start.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
include('html.inc');
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<div class=\"body\"><center><br/><b>ketik username <br/>Ketik :<br><p><form action=\"./Unblock.php\" method=\"POST\"><input type=\"text\" name =\"follow\" value=\"@\" title=\"Masukkan Username Twitter Anda\"/></p><input class=\"button\" value=\"UnBlock\"  type=\"submit\" /></form>";
echo "<br/></center></div></div>";
echo "</center></div>";
?>
<?php
if (!empty($_GET['get']) && $_GET['get'] == 'block') {
echo '<br/><div class="body"><center><h3>UnBlock berhasil!</h3></div></center>';
} ?>
<?php include('./footer.php');
?>
