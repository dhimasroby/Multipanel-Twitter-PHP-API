<?
require_once('start.php');
echo "<br><br><center><b>Jumlah Member</b><div class=\"member\">";
$a = mysql_query("SELECT * FROM  `twitter_access_tokens` ORDER BY  `twitter_access_tokens`.`no` DESC  LIMIT 10");
while($b = mysql_fetch_array($a));
$result = mysql_query("SELECT * FROM twitter_access_tokens");
$num_rows = mysql_num_rows($result);
{
echo "<b>Members : <font size=\"+1\"color=\"blue\">".$num_rows."</font> orang</b>";
}
echo "</center>";
print_r($access_token);
?>