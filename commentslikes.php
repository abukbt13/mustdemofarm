<?php

session_start();
include('connection.php');
if(!isset($_SESSION['username'])) {
	header('Location:login.php');
}


$username=$_SESSION['username'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];




if (isset($_POST['commending'])){
    $postid=$_POST['id'];
    $comment=$_POST['comment'];
  
 
    $commentlikes="INSERT INTO commentlikes(comment,postid,uid)values('$comment','$postid','$uid')";
        $commentlikesrun=mysqli_query($conn,$commentlikes);
        if($commentlikesrun){
            $_SESSION['status']="Commended successfuly";
        header('location:index.php');
        }
}

//comments processor
if (isset($_POST['likes'])){
    $like = $_POST['liked'];
	$postid=$_POST['postid'];
    echo $like;
    echo $postid;
echo "testing";
    $like="SELECT *FROM `liked` WHERE postid='$postid'";
    $likerun=mysqli_query($conn,$like);

     $posts = mysqli_fetch_all($likerun, MYSQLI_ASSOC);
        foreach($posts as $post){
            $postiid= $post['postid'];
            $likeses= $post['likes'];
            $userid = $post['userid'];
            
}
    echo $likeses;
    echo $userid;
    echo $postiid;
    echo $uid;
}


?>