<?php
    $host ="localhost";
    $user ="root";
    $pwd ="";
    $database ="nice_camera";

    $conn=mysqli_connect($host,$user,$pwd,$database) or die("can't connect database");
    mysqli_set_charset($conn,'utf8');
?>