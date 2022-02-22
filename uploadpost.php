<?php 
session_start();
include('connection.php');
if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}


$username=$_SESSION['username'];
$uid=$_SESSION['uid'];



if(isset($_POST['upload'])){
    $feeling=$_POST['feeling'];
    $photoname=$_FILES['photo']['name'];
    $phototmp=$_FILES['photo']['tmp_name'];
    $photo_new_name=rand() . $photoname;

    $sql = "INSERT INTO posts(feeling,photo,uid) values('$feeling','$photo_new_name','$uid')";
    $sqlrun=mysqli_query($conn,$sql);
    if($sqlrun){
      move_uploaded_file($phototmp,"uploads/".  $photo_new_name);
        $ins="insert into liked (userid,likes) values('$uid','0')";
	     $result3=mysqli_query($conn,$ins);

             if($result3){
                $_SESSION['status']="Post upload successfully";
            header("Location:post.php");

             }

             else{
                $_SESSION['status']="Error 404";
                header("Location:index.php");
             }
            
       
    }
    else{
        echo "<script>alert('There is an error which occured')";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
  <div class="container">
      <div class="row">
          <div class="col-sm-4 mt-4">
              <form autocomplete="off" action="uploadpost.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <input type="text" class="form-control" name="feeling" placeholder="Whats is on your mind?" required>
                  </div>
                  <div class="form-group">
                      <label for="">Upload Photo</label>
                      <input type="file" class="form-control" name="photo" placeholder="Upload photo" required>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary form-control mt-2"  name="upload" value="Upload post">
                  </div>
              </form>
          </div>
      </div>
  </div>  
</body>
</html>