<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}


$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
</body>
</html>