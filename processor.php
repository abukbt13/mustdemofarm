
<?php
session_start();
include('connection.php');

if (isset($_POST['register'])) {
	
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$confirmpassword=md5($_POST['confirmpassword']);
	
	
	if ($password!=$confirmpassword) 
	{
		echo "<script>alert('incorrect password');</script>";
        die();
	}

	$sql1="select username from users where username='$username'";
	$result1=mysqli_query($conn,$sql1);
	$count1=mysqli_num_rows($result1);
	if ($count1>0) {
	echo "<script>alert('Username already exist');</script>";
        die();
	}
	$sql2="select username from users where email='$email'";
	$result2=mysqli_query($conn,$sql2);
	$count2=mysqli_num_rows($result2);
	if ($count2>0) {
		echo "<script>alert('Email already exists');</script>";
        die();
	}
		$sql="insert into users (username,email,password,county,hobby,profile) values('$username','$email','$password','','','')";
		$result=mysqli_query($conn,$sql);

	
		$sql = "SELECT * FROM users WHERE  username = '$username'";
		$result = mysqli_query($conn,$sql);
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

		foreach($users as $user){
			$uid = $user['id'];
			$username = $user['username'];	
		}
		 
		

		if ($result) {
			session_start();
			$_SESSION['uid']=$uid;
			$_SESSION['username']=$username;
			$_SESSION['status']="successfuly registered";
			header("location:index.php");
		}
        else{ 
            $_SESSION['status']="An error occured";
            header("Location:register.php");
        }

		}




if (isset($_POST['login'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from users where email='$email' && password='$password'";
	$query=mysqli_query($conn,$sql)or die("error in login");
	
	$users1 = mysqli_fetch_all($query, MYSQLI_ASSOC);

			foreach($users1 as $user){
				$uid = $user['id'];
				$email = $user['email'];
				$username = $user['username'];
				$dp=$user['profile'];
				} 


	$count=mysqli_num_rows($query);
	if ($count==1) {
			//the password was correct
            session_start();
			$_SESSION['uid']=$uid;
			$_SESSION['username']=$username;
			$_SESSION['email']=$email;
			$_SESSION['profile']=$dp;
			header("location:index.php");
		}
		else{
            $_SESSION['status']="The credentials does not match";
            header("Location:login.php");
		}
	
	

}






?>



