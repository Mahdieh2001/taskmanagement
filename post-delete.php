<?php
include 'db/conn.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleted_at = date("h:i:sa");
    $sql="update `title` set deletedat='$deleted_at' where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:post-list.php');
    }else{
    die(mysqli_error($con));
    }
}
?>;