
<?php 
    session_start();
    if (!isset($_SESSION["loginSession"])) {
        header("Location: ./login_admin.php");
    }
?>
<!DOCTYPE html>
<html>

<head lang="vi">
    <?php 
        include('header.php');
    ?>
</head>
<body>
    <?php
        include('nav_admin.php');
    ?>
    <h1>HELLO Admin.</h1>
</body>
</html>