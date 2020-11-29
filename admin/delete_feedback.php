<?php
    $id=$_GET['id'];
    include('connection.php');
    $sql ="DELETE FROM feedback WHERE id='$id'" or die('lỗi truy vấn');
    mysqli_query($conn,$sql);
    header('location:./manage_feedback.php');
?>