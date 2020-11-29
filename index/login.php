<?php include('../admin/connection.php'); ?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head lang="vi">
    <?php
        include('../admin/header.php');
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body class="background-img">
    <div class="main-container login">
        <div class="panel panel-primary">
            <div class="panel-heading"> Đăng nhập</div>
                <div class="panel-body">
                    <form action="#" method="POST">
                        <div class="form-group">                   
                            <label for="" class="">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Your Username" name="username" required />
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="********" name="password" required/>
                        </div>
                        <div class="checkbox">
                            <label for="check">
                                <input type="checkbox" id="check"/> Remember Me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="submit" >Đăng nhập</button>
                        <a href="./register.php" class="btn btn-success btn-block" name="dangky">Đăng ký</a>
                    </form>
                    <?php
                        if (isset($_POST["submit"])) {
                            $username = $_POST["username"];
                            
                            $password = $_POST["password"];
                            $sql = "SELECT * FROM user";
                            $result = mysqli_query($conn, $sql);

                            while ($rows = mysqli_fetch_assoc($result)) {
                            if ($username == $rows["username"]  && md5($password) == $rows["password"]) {
                                $_SESSION["loginUser"] = $rows["username"];
                                $_SESSION["loginId"] = $rows["id"];
                                }
                            }
                            if (isset($_SESSION["loginUser"])) {
                               
                            }
                            else {
                                echo "<div class='alert alert-danger'>Sai tài khoản hoặc mật khẩu!</div>";
                            
                            }
                            header("Location: index.php");
                        }
                        ?>       
                </div>
            </div>
        </div>
    </div>
</body>

</html>