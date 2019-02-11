<?php
require_once('twitteroauth/twitteroauth.php');
require_once('start.php');
ini_set('max_execution_time', 0);

$a = mysql_query('SELECT * FROM `twitter_access_tokens` ORDER BY RAND() LIMIT 0,1000') or die(mysql_error());
while($b = mysql_fetch_array($a))
{
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,$b['oauth_token'], $b['oauth_token_secret']);
$access_token = $connection->get('account/verify_credentials');
if (200 == $connection->http_code) {
echo "<center><font color=red size=4>".$b['username']."<font color=green> Masih Hidup! </br></center>";
} else {
$query1 = "DELETE FROM twitter_access_tokens WHERE oauth_token ='".$b['oauth_token']."'";
$result = mysql_query($query1) or die(mysql_error());
}
}
?>