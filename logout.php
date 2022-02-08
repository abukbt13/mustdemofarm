<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}


$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];

if(isset($_SESSION['username'])){

	session_destroy();
	header('location:login.php');
}
else{
header('location:login.php');
}


?>