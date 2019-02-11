<?php 
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../start.php");
require_once('../twitteroauth/twitteroauth.php');

include('html.inc'); 
include "../start.php";
$name= $_POST['username']; //get the nama value from form
$q = "SELECT * from twitter_access_tokens where username like '$name' "; //query to get the search result
$result = mysql_query($q); //execute the query $q
echo "<center>";
?>
<div id="header"><div id="wrap">
<div class="listku">
<h2> Hasil Searching </h2>
<table border="1" cellpadding="5" cellspacing="0">
	<thead>
    	<tr>
        	<td>No.</td>
        	<td>Username</td>
        	<td>Point</td>
			<td>Opsi</td>
        </tr>
    </thead>
    <tbody><?php
	$no = 1;
while($data = mysql_fetch_array($result)) {?>
    	<tr>
        	<td><center><?php echo $no; ?></center></td>
        	<td><center><?php echo $data['username']; ?></center></td>
        	<td><center><?php echo $data['point']; ?></center>
            <td>
            	<center><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></center>
            </td>
        </tr>
<?php }
echo "</tbody>
</table></div></div></div>";
include('../footer.php'); 
?>