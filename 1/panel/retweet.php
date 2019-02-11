<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");
require_once('../twitteroauth/twitteroauth.php');

include('html.inc'); 
echo "<div id=\"header\"><div id=\"wrap\">";
echo "<div class=\"listku\"><center><b>Tambah Retweet</b><br/><b>ID Tweet :</b><br><form action=\"?get=retweet\" method=\"POST\"><input type=\"text\" name =\"retweet\" value=\"\" title=\"Masukkan ID Tweet Anda\"/></p><br>Jumlah :<br/><input type=\"text\" name =\"jumlah\" value=\"\" title=\"Masukkan Jumlah yang Anda Inginkan\"/></p><input class=\"button\" value=\"Dapatkan Retweet\"  type=\"submit\" /></form><br>";
echo "<br/></center></div></div>";
echo "</center></div>";
?>
<?php
if (!empty($_GET['get']) && $_GET['get'] == 'retweet')
{
	echo '<div class="list"><center><h3>Berhasil menambah Retweet !</h3></div></center>';
} 
$id = ($_POST['retweet']);
/* Mengambil data pengguna lain secara acak dari database. */
$a = mysql_query("select * from twitter_access_tokens where premium=0 ORDER BY RAND() DESC LIMIT 100");
while($b = mysql_fetch_array($a))
{
$eksekusi = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $b['oauth_token'], $b['oauth_token_secret']);
$hasil = "statuses/retweet/{$id}";
$eksekusi->post($hasil);
}?>
<?php include('../footer.php');
 ?>