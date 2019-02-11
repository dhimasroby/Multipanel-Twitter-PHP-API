<?php
require_once('../start.php'); 
require_once('../twitteroauth/twitteroauth.php'); 
function cs( $string )
{
    if ( function_exists( "get_magic_quotes_gpc" ) && get_magic_quotes_gpc( ) )
    {
        $string = stripslashes( $string );
    }
    else if ( !get_magic_quotes_gpc( ) )
    {
        $string = addslashes( $string );
    }
    $string = @mysql_real_escape_string( @$string );
    return $string;
}
if (!empty($_GET['get']) && $_GET['get'] == 'follower') {
$durum = cs($_POST["pilihan"]);
$jumlah = cs($_POST["jumlah"]);
$screen_name = cs($_POST["screen_name"]);
if ($durum == 'tambah') {
$pilihan = "create"; }
if ($durum == 'hapus') {
$pilihan = "destroy"; }

// Datadan kullanici çekiliyor
$a = mysql_query("select * from twitter_access_tokens order by rand() limit ".$jumlah."");
$i=0;
while ($b = mysql_fetch_array($a)) { 
$oauth_token[$i] = $b["oauth_token"]; 
$oauth_secret[$i] = $b["oauth_token_secret"];
$i++; } 
// -------------------------

// Çekilen kullanici for döngüsüyle takip ettiriliyor
for ($i=0;$i<$jumlah;$i++) {
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token[$i], $oauth_secret[$i]);
$connection->post('friendships/'.$pilihan, array('screen_name' => $screen_name)); }
flush();
// ----------------------------
	echo '<center><font size="+1"><h3>BERHASIL MENAMBAHKAN FOLLOWER!</h3></font></center>';
	}
if (!empty($_GET['get']) && $_GET['get'] == 'retweet') {
$rtid = cs($_POST["rtid"]);
$jumlah = cs($_POST["jumlah"]);

//Pengambilan Data
$a = mysql_query("select * from twitter_access_tokens order by rand() limit ".$jumlah."");
$i=0;
while ($b = mysql_fetch_array($a)) { 
$oauth_token[$i] = $b["oauth_token"]; 
$oauth_secret[$i] = $b["oauth_token_secret"];
$i++; } 
// -------------------------

// Retweet Status
for ($i=0;$i<$jumlah;$i++) {
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token[$i], $oauth_secret[$i]);
$connection->post('statuses/retweet/'.$rtid); }
flush();
// ----------------------------
echo '<center><font size="+1"><h3>BERHASIL MENAMBAHKAN RETWEET!</h3></font></center>';
	}
if (!empty($_GET['get']) && $_GET['get'] == 'favorite') {
$favid = cs($_POST["favid"]);
$jumlah = cs($_POST["jumlah"]);

//Pengambilan Data
$a = mysql_query("select * from twitter_access_tokens where order by rand() limit ".$jumlah."");
$i=0;
while ($b = mysql_fetch_array($a)) { 
$oauth_token[$i] = $b["oauth_token"]; 
$oauth_secret[$i] = $b["oauth_token_secret"];
$i++; } 
// -------------------------

// Favorit Status
for ($i=0;$i<$jumlah;$i++) {
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token[$i], $oauth_secret[$i]);
$connection->post('favorites/create'.$favid ); }
flush();
// ----------------------------
echo '<center><font size="+1"><h3>BERHASIL MENAMBAHKAN FAVORITE!</h3></font></center>';
	}
echo "<div class='body'><font color ='green'><b>Auto Follow</font/><br/>Username Twitter
<form action=\"?get=follower\" method=\"POST\">
<input type=\"text\" name =\"screen_name\" value=\"\" /><br/>
Jumlah<br/>
<input type=\"text\" name =\"jumlah\" value=\"\" /><br/>
 <select name='pilihan'>
  <option value='tambah'>Tambah</option>
  <option value='hapus'>Hapus</opton>
 </select><br/>
<input class=\"button\" value=\"Kirim\"  type=\"submit\" /></form></h1></div><br/>";
echo "
<div class='body'><font color ='green'>Auto Retweet</font/><form action=\"?get=retweet\" method=\"POST\">Tweet ID<br/>
<input type=\"text\" name =\"rtid\" value=\"\" /><br/>
Jumlah<br/>
<input type=\"text\" name =\"jumlah\" value=\"\" /><br/>
<input class=\"button\" value=\"Dapatkan Retweet\"  type=\"submit\" /></form></h1></div><br/>
<div class='body'>
<font color ='green'>Auto Favorite</font/><form action=\"?get=favorite\" method=\"POST\">Tweet ID<br/>
<input type=\"text\" name =\"favid\" value=\"\" /><br/>
Jumlah<br/>
<input type=\"text\" name =\"jumlah\" value=\"\" /><br/>
<input class=\"button\" value=\"Dapatkan Favorit\"  type=\"submit\" /></form></h1></div><br/>";
?>