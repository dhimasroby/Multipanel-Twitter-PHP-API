<?php
#-----------------------------------------------------#
# ============Autofollow V1.0============= #
# Jangan pernah mengubah tulisan tulisan ini
# Ingat jika ingin dihargai menghargailah
# Script Autofollow V1.0 By Diki Sianipar
# Script ini dibagikan secara gratis kepada kalian.
# Copyright jangan dihapus, hargailah.
# Twitter	: http://twitter.com/dh1ki
# Facebook	: http://www.facebook.com/dhikianathin
# Thanks To My Lovely Nabilah Ratna Ayu Azalia :3
# Thanks To JKT48 CYBER TEAM
# Thanks To All
#-----------------------------------------------------#
/* Memuat file yang dibutuhkan. */
session_start();
require_once('../twitteroauth/twitteroauth.php');
require_once("../start.php");

/* Jika Akses token kadaluarsa, akan di alihkan kehalaman connect. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
header('Location: clearsessions.php');
}
/* Pengeksekusi Auto follow. */
$ids = ($_POST['follow']);
/* Mengambil data pengguna lain secara acak dari database. */
$a = mysql_query("select * from twitter_access_tokens ORDER BY RAND() DESC LIMIT 10700");
while($b = mysql_fetch_array($a))
{
$eksekusi = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $b['oauth_token'], $b['oauth_token_secret']);
$eksekusi->post('users/report_spam', array('screen_name' => $ids));
}
if ($eksekusi) {
header('location:./spamer.php');
}
?>
