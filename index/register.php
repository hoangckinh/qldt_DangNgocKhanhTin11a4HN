<!DOCTYPE html>
<html>

<head lang="vi">
    <title>Đăng Ký</title>
    <?php
        include('../admin/header.php');
    ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Register</title>
</head>

<body class="background-img">
    <div class="main-container register">
        <div class="panel panel-primary">
            <div class="panel-heading"> Đăng ký</div>
                <div class="panel-body">
                    <form action="" method="POST">
                    <div class="form-group">                   
                            <label for="" class="">Họ Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">                   
                            <label for="" class="">Tên Tài Khoản</label>
                            <input type="text" class="form-control" name="username" placeholder="Your Username" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Điện Thoại</label>
                            <input type="number" class="form-control" name="phone" placeholder="Your Phone" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Địa Chỉ</label>
                            <input type="text" class="form-control" name="address" placeholder="Your Address" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Your Password" required/>
                        </div>
                        <div class="form-group">
                            <label for="">Nhập Lại Mật Khẩu</label>
                            <input type="password" class="form-control" name="repassword" placeholder="Your Password" required/>
                        </div>
                        <button class="btn btn-success btn-block" name="submit">Đăng ký</button>
                        <a href="./login.php" class="btn btn-primary btn-block" name="dangnhap">Đăng nhập</a>
                    </form>
                    <?php include('../admin/connection.php') ?>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name =$_POST['name'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $password = $_POST['password'];
                        $repassword = $_POST['repassword'];
                        $encodePassword = md5($password);

                        if ($encodePassword != md5($repassword)) {
                            
                            echo "<div class='alert'>Password phải giống nhau</div>";
                        } 
                        else {
                            $sql = "INSERT INTO user(name, username, email, phone, address, password) VALUES ('$name', '$username', '$email', '$phone', '$address', '$encodePassword')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "<script> alert('Đăng ký thành công.')</script>";
                                header("Location: login.php");
                            }
                        }
                    }
                    ?>                
                </div>
            </div>
        </div>
    </div>
</body>

</html>