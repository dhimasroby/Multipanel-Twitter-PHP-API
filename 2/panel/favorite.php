<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");
require_once('../twitteroauth/twitteroauth.php');

include('html.inc'); 
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<div class=\"listku\"><center><br/><b>Tambah Favorit</b><br><ID Tweet : </b><br/>
<p><form action=\"./submit3.php\" method=\"POST\"><input type=\"text\" name =\"favorites\" value=\"\" title=\"Masukkan ID Tweet Anda\"/></p><br>Jumlah :<br/><input type=\"text\" name =\"jumlah\" value=\"\" title=\"Masukkan Jumlah yang Anda Inginkan\"/></p><input class=\"button\" value=\"Dapatkan Favorit\"  type=\"submit\" /></form>";
echo "<br/></center></div></div>";
echo "</center></div>";
?>
<?php
if (!empty($_GET['get']) && $_GET['get'] == 'favorit') {
	echo '<div class="list"><center><h3>Berhasil menambah Favorit !</h3></div></center>';
} ?>
<?php include('../footer.php');
 ?>