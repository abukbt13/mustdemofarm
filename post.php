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
    $county=$profiles['county'];
    $profile=$profiles['profile'];
}


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
            
            <li><a href="#product">Our products</a></li>
            <li><a href="Announcements.php">Announcement</a></li>
            <li><a href="todolist.php">Todo activities</a></li>
            <li><a href="logout.php">Logout</a></li>
            <a href="profile.php">My profile</a></li>

        </ul>
      

    </header>
    <div class="user">
    <a href="profile.php"><img style="border-radius: 50%;"src="profiles/<?php echo $profile; ?>" alt="profilepicture here" width=50 height=50></a>
    <?php echo $username ?>
</div>
<a href="uploadpost.php"><button class="btn btn-primary m-4">What is on your mind?</button></a>
<br>
<hr>

<?php
include ('connection.php');

$post="select * from posts";
$postrun=mysqli_query($conn,$post);
$numrows=mysqli_num_rows($postrun);

if ($numrows>0){
    
    while($row=mysqli_fetch_assoc($postrun))
    {
    ?>
    <div class="col col-sm-4">
    <p>

    <?php echo $row['feeling']; ?>
    </p>
                    <div class="card">
                        <div class="card-body">
                        
                        <img src="uploads/<?php echo $row['photo']; ?>" width=100%>
                            <div class="feedback">
                                <div class="likes">
                                   
                                           
                                    </div>
                                  
                                    <div class="like-count">
                                        <button style="border-radius: 50%;" class="btn btn-primary btn-sm mt-2 btn-round">9</button>
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
       echo "<script>alert('No record found');</script>";
    }
    ?>
 <div style="background-color: rgba(100,29,67,0.6); width:100%;" id="product">
<h1>Our services</h1>
<ol>
    <li>Tomato growing</li>
    <li>Vegetable growing</li>
    <li>Ovacado grafting</li>
</ol>

 </div>



</body>
</html>