<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");
require_once('../twitteroauth/twitteroauth.php');

/* Pengeksekusi Auto retweet. */
$id = ($_POST['retweet']);
$jumlah = ($_POST['jumlah']);
/* Mengambil data pengguna lain secara acak dari database. */
$a = mysql_query("select * from twitter_access_tokens ORDER BY RAND() DESC LIMIT ".$jumlah."");
while($b = mysql_fetch_array($a))
{
$eksekusi = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $b['oauth_token'], $b['oauth_token_secret']);
$hasil = "statuses/retweet/{$id}";
$eksekusi->post($hasil);
header('location:./retweet.php?get=retweet');
}
?>