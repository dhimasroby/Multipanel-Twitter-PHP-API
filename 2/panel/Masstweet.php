<?php
require_once("../start.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);

include('html.inc'); 
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<div class=\"body\"><center><br/><b>Tulisan Bomb Twit <br/>Ketik :<br><p><form action=\"./submit5.php\" method=\"POST\"><input type=\"text\" name =\"follow\" value=\"\" title=\"Masukkan Username Twitter Anda\"/></p><input class=\"button\" value=\"Submit Mass Tweet\"  type=\"submit\" /></form>";
echo "<br/></center></div></div>";
echo "</center></div>";
?>
<?php
if (!empty($_GET['get']) && $_GET['get'] == 'bombtwit') {
	echo '<br/><div class="body"><center><h3>Mass Tweet berhasil!</h3></div></center>';
} ?>
<?php include('./footer.php');
 ?>