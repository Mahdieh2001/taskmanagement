<?php
include 'db/conn.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="delete from `title` where id=$id";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:post-list.php');
    }else{
    die(mysqli_error($con));
    }
}
?>