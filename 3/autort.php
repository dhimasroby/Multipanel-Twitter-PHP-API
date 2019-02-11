<?php
    /* Memuat file yang dibutuhkan. */
    session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 'On');
    require_once('twitteroauth/twitteroauth.php');
    require_once('start.php');
    
$username = "Robot_Bijak";
    /* Mengambil data pengguna lain secara acak dari database. */
    $aa = mysql_query("SELECT oauth_token,oauth_token_secret FROM twitter_access_tokens WHERE 2 ORDER BY RAND() LIMIT 40");
    while($bb = mysql_fetch_array($aa))
    {
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bb['oauth_token'], $bb['oauth_token_secret']);
$f=$connection->get("/statuses/user_timeline.json?screen_name=".$username."&count=3");
if(!isset($f->errors)) {
$g=$connection->post("statuses/retweet/".$f[0]->id_str);
print_r($g->text."<br/>");
}
}
?>