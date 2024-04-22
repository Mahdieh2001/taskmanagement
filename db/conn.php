<?php

    $con = new mysqli('localhost', 'root', '', 'blogs');

    if (!$con){
        die(mysqli_error($con));
    }
?>