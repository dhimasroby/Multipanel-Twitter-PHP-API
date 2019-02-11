<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);

include('html.inc'); 
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<div class=\"listku\"><center><br/><b>Tambah Followers Twitter <br/>Username Twitter :<br><p><form action=\"./submit2.php\" method=\"POST\"><input type=\"text\" name =\"follow\" value=\"\" title=\"Masukkan Username Twitter Anda\"/></p><br/><br/>Jumlah :<br/><input type=\"text\" name =\"jumlah\" value=\"\" title=\"Masukkan Jumlah yang Anda Inginkan\"/></p><input class=\"button\" value=\"Dapatkan Follower\"  type=\"submit\" /></form>";
echo "<br/></center></div></div>";
echo "</center></div>";
?>
<?php
if (!empty($_GET['get']) && $_GET['get'] == 'followers') {
	echo '<div class="list"><center><h3>Berhasil menambah Followers !</h3></div></center>';
} ?>
<?php include('../footer.php');
 ?>