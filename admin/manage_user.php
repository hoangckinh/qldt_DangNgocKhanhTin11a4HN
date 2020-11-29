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
    <div class="container">
        <h2>Danh sách người dùng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Password</th>
                    <th>Ation</th>
                </tr>
            </thead>
            <?php
                include('connection.php');
                $sql="SELECT * FROM user" or die("can't conncet database");
                $result=mysqli_query($conn,$sql);
            ?>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo"<tr>";
                            echo"<td>".$row["id"]."</td>";
                            echo"<td>".$row["name"]."</td>";
                            echo"<td>".$row["username"]."</td>";
                            echo"<td>".$row["email"]."</td>";
                            echo"<td>".$row["phone"]."</td>";
                            echo"<td>".$row["address"]."</td>";
                            echo"<td>".$row["password"]."</td>";
                            echo"<td><a href='./delete_user.php?id=".$row['id']."'>Delete</a></td>";
                            echo"</tr>";
                        }
                    ?>
                </tbody>   
        </table>   
    </div>
</body>
</html>