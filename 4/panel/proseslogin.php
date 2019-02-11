<?php
session_start();
require_once("../start.php");
$username = $_POST['username'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM admin WHERE username = '$username'");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {

	header('location:index.php?admin=login');
	}
	 else {
if($pass <> $hasil['password']) {
	header('location:index.php?admin=login');
	} 
	else {
$_SESSION['username'] = $hasil['username'];
header('location:index.php');
}
}
?>