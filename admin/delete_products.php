<?php
    $ma=$_GET['id'];
    include('connection.php');
    $sql ="DELETE FROM products WHERE id='$ma'" or die('lỗi truy vấn');
    mysqli_query($conn,$sql);
    header('location:./manage_products.php');
?>