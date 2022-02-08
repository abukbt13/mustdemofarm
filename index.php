<?php 

include('connection.php');
session_start();


if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}

$message=$_SESSION['username'];
$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];



$sql="select * from post";
$sqlrun=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUST demo farm</title>
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
        <li>
            
            <li><a href="activity.php">activity</a></li>
            <li><a href="Announcements.php">Announcement</a></li>
            <li><a href="meetings.php">Meetings</a></li>
            <li><a href="logout.php">Logout</a></li>
            <a href="profile.php">My profile</a></li>

        </ul>
      

    </header>
    <img style="border-radius: 50%;" src="profiles/<?php echo $dp; ?>" width=200 height=200>
<a href="post.php"><button class="btn btn-primary">What is on your mind?</button></a>

    
    
    <hr>

    <?php
    if($sqlrun)
    {
        while($row=mysqli_fetch_assoc($sql))
        {
            ?>

             <div class="row center">
                 <div class="title">
                 <?php if(isset($_SESSION['status'])){
        ?>
        <div class="alert alert-success">
        <!-- <h5><?php echo $message; ?></h5> -->
        </div>
        <?php  
        unset($_SESSION['status']);                                 
}
?>
                 <p><?php echo $row['feeling']; ?></p>
                
                 </div>
             
                <div class="col col-sm-4">
                    <div class="card">
                        <div class="card-body">
                        
                            <img src="uploads/<?php echo $row['photo']; ?>" width=100%>
                            <div class="feedback">
                                <div class="likes">
                                   
                                           
                                    </div>
                                  
                                    <div class="like-count">
                                        <button style="border-radius: 50%;" class="btn btn-primary btn-sm mt-2 btn-round"><?php echo $likeses; ?></button>
                                    </div>
                                    <div>
                                        <form autocomplete="off" class="form-horizontal pt-2 ml-2" action="commentslikes.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="text" name="comment" required>
                                            <input type="submit" style="width: 100px;" class="btn btn-primary" name="commending" value="Comment">
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                           
                    </div>
                </div>
            </div>
            <?php
        }

    }
    else{
       echo "<script>alert('No record found')";
    }
    ?>


</body>
</html>