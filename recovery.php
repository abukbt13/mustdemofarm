
<?php
$conn=new mysqli("localhost","root","","demofarm") or die("mysqli_error");

if (isset($_POST['likes'])){
    $like = $_POST['liked'];
	$post=$_POST['postid'];
    echo $like;
    echo $post;
echo "testing";
    $like="SELECT *FROM `liked` WHERE postid='$post'";
    $likerun=mysqli_query($conn,$like);

     $posts = mysqli_fetch_all($likerun, MYSQLI_ASSOC);
        foreach($posts as $post){
            $postiid= $post['postid'];
            $liking= $post['likes'];
            $userid = $post['userid'];
            
}
    echo $liking;
    echo $userid;
    echo $userid;

}


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