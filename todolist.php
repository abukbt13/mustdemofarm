<?php
session_start();
include('connection.php');

$msg=$_SESSION['status'];
if (isset($_POST['submit'])){
$todo=$_POST['do'];

$todosave="insert into todo (todo) values('$todo')";
$todosaverun=mysqli_query($conn,$todosave);
if($todosaverun){
    $_SESSION['status']="To do added successfully";
    header("Location:todolist.php");
}
}
if(isset($_POST['delete'])) 
{
    $id=$_POST['id'];
   
    
    $delete="delete from todo where id ='$id'";
    $deleterun=mysqli_query($conn,$delete);
    if($deleterun){
        echo "deleted successfully";
    }

}
// if(isset($_POST['edit'])) 
// {
//     $id=$_POST['id'];
//     $edit="update todo set set todo="
// }



$display="select *from todo";
$displayrun=mysqli_query($conn,$display);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proposed activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<style>
      
        header{
        
            background-color: rgba(105, 44, 205, 0.2);

        }
        /* li{
            font-size:20px;
            padding: 20px;
        } */
        /* ul{
            display: flex;
            align-items: center;
        } */
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


<style>
    #todo{
        display: none;
    }

</style>

         
    <div class="row">
    <div class="col col-sm-4 m-4">
            <h4>Must farm to do list</h4>

            <h1>Number of todo list  
                 <span style="color:green;">
                 <?php 
                        $count="select id from todo ORDER BY ID";
                        $countrun=mysqli_query($conn,$count);
                        $row=mysqli_num_rows($countrun);
                        echo $row;
    
                    
                ?>
                 </span>
            </h1>
            <ol>
            <?php 
            if($displayrun)
            {
                while($row=mysqli_fetch_array($displayrun)){
                    ?>
                    
                        <li><?php echo $row['todo']; ?></li><br>
                                
                    <div class="operation" style="display:flex; align-items:center;">
                        <div class="edit" style="margin:3px;">
                            <form action="todolist.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                            <button class="btn-primary" type="submit" name="edit" id="edit">Edit</button>
                            </form>
                        </div>
                        <div class="delete">
                        <form action="todolist.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                            <button class="btn-primary" type="submit" name="delete">Delete</button>
                            </form>
                        </div>
                    </div>
                                 
                   
                    <?php
                }

            }
            else {
                echo "error occured";
            }
            ?>
             </ol>
             <div id="update" >
                 <?php
                 if(isset($_POST['edit'])){
                     $id=$_POST['id'];
                     $update="select * from todo where id='$id'";
                     $updaterun=mysqli_query($conn,$update);
                     $todo= mysqli_fetch_all($updaterun, MYSQLI_ASSOC);
                    foreach($todo as $do){
                        $dues= $do['todo'];
                     
                    }
                    
                  
                 }
                 ?>
                 <form action="todolist.php" method="post">
                     <input type="hidden" name='id' value="">
                     <input type="text" name="edit" value="<?php echo $dues; ?>">
                     <button type="submit" name="edit" >Edit</button>
                 </form>
             </div>
                <button class="btn btn-primary" id="btn">Add to do list</button>
                <div id="todo">
                    <form action="todolist.php" method="post">
                        <div class="form-group">
                        <label for="">Add to do </label>
                        <input type="text" name="do" id="do" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success m-3">Add</button><button id="close" class="btn btn-primary m-3">Close</button>
                    </form>
                </div>
                
        </div>  
    </div>
 
    <script>
        let p=document.getElementById('edit');
        let k=document.getElementById('update');
        p.addEventListener('click',function(){
            k.style.display="block";
        })


        let x=document.getElementById('btn');
        let y=document.getElementById('todo');
        let c=document.getElementById('close')
        x.addEventListener('click',function(){
            y.style.display="block";
        })
       c.addEventListener('click',function(){
           y.style.display="none";
       })
    </script>
</body>
</html>