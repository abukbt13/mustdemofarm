<?php
include ('connection.php');
session_start();

if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}



$uid=$_SESSION['uid'];


$profile="select * from users where id = $uid";
$profilerun=mysqli_query($conn,$profile);

$profiles1= mysqli_fetch_all($profilerun, MYSQLI_ASSOC);
foreach($profiles1 as $profiles){
    $username= $profiles['username'];
    $email= $profiles['email'];
    $hobby= $profiles['hobby'];
    $counti=$profiles['county'];
    $profile=$profiles['profile'];
}

if (isset($_POST['update'])) {
	
	$username=$_POST['username'];
	$email=$_POST['email'];
    $county=$_POST['county'];
    $hobby=$_POST['hobby'];

    $photoname=$_FILES['profile']['name'];
    $phototmp=$_FILES['profile']['tmp_name'];
    $photo_new_name=rand() . $photoname;
if(empty($photoname)){
    $update="update users set username='$username', email='$email',county='$county',hobby='$hobby' where id='$uid'";
    $updaterun=mysqli_query($conn,$update);
    if ($updaterun){
        move_uploaded_file($phototmp,"profiles/".  $photo_new_name);
                echo "<script>alert('Profile update successfully');</script>";
                header("Location:profile.php");
    }
    else{
        echo "<script>alert('Profile update failed');</script>";
    }
}
else{
    $update="update users set username='$username', email='$email',county='$county',hobby='$hobby',profile='$photo_new_name' where id='$uid'";
    $updaterun=mysqli_query($conn,$update);
    if ($updaterun){
        move_uploaded_file($phototmp,"profiles/".  $photo_new_name);
                echo "<script>alert('Profile update successfully');</script>";
                header("Location:profile.php");
    }
    else{
        echo "<script>alert('Profile update failed');</script>";
    }

}
  
    
}
  
   

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<style>
        *{
            text-decoration:none;
            list-style: none;
        }
        header{
        
            background-color: rgba(105, 44, 205, 0.2);

        }
        li{
            font-size:20px;
            padding: 20px;
        }
        ul{
            display: flex;
            align-items: center;
        }
        li:hover{
            background-color:rgba(2, 255, 25, 0.4);
        }
        .feedback{
            display: flex;
            flex-direction: row;

           
        }
        .feedback input{
            width: 13em;
            height: 3em;
            font-size: 12px;
        }
        .likes{
            display: flex;
        }
        .like-count{
            margin-left: 4px;
            margin-right: 4px;
            border-radius: 50%;
        }
    </style>

    <header id="header">

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="activity.php">activity</a></li>
            <li><a href="Announcements.php">Announcement</a></li>
            <li><a href="meetings.php">Meetings</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
     

    </header>
   <div class="container">
      <div class="row">
          <div class="col-sm-4 mt-4">
          <form action="profile.php" method="post" enctype="multipart/form-data">
              <h1>Create Account Here</h1>
                  <div class="form-group">
                  <label for="">Enter Your Email</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">County</label>
                      <input type="text" class="form-control" name="county" value="<?php echo $counti; ?>">
                  </div>
                  <div class="form-group">
                      <label for="">Hobby</label>
                      <input type="text" class="form-control" name="hobby" value="<?php echo $hobby; ?>">
                  </div>
                 
                  <div class="form-group">
                  <label>Your profile picture</label><br>
                 <img src="profiles/<?php echo $profile; ?>" alt="profile picture " width=200 height=200>
                  </div>
                  <div class="form-group">
                      <label for="">Update Profile</label>
                      <input type="file" class="form-control" name="profile" value="">
                  </div>
                  
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control mt-2 mb-2" onclick="return confirm('<?php echo $username; ?> Click ok to confirm your profile update')" name="update" value="Update your profile">
                  </div>
                
              </form>
          </div>
      </div>
  </div> 
</body>
</html>