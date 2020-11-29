<?php include('connection.php'); ?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head lang="vi">
    <?php
    include('header.php');
    ?>
    <link rel="stylesheet" href="../css/styleLoginAd.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Login Admin</title>
</head>

<body class="background-img">
    <div class="login w3_login">
        <h2 class="login-header w3_header">Log in</h2>
        <div class="w3l_grid">
            <form class="login-container" action="#" method="POST">
                <input type="text" placeholder="Username" name="username" required="" >
                <input type="password" placeholder="Password" name="password" required="">
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php
                if (isset($_POST["submit"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM admin_accounts";

                    $result = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_assoc($result)) {
                            if ($username == $rows["username"] && $password == $rows["password"]) {
                                $_SESSION["loginSession"] = $username;
                                    header("location: ./admin.php");
                            } else {
                                echo "<div class='alert'>Sai thông tin tài khoản hoặc mật khẩu</div>";
                                }
                        }
                }
            ?>
        </div>
    </div>
    <?php
    ?>
</body>

</html>