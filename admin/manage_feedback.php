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
        <h2>Quản lý feedback</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>content</th>
                    <th>Ation</th>
                </tr>
            </thead>
            <?php
                include('connection.php');
                $sql="SELECT * FROM feedback" or die("can't conncet database");
                $result=mysqli_query($conn,$sql);
            ?>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo"<tr>";
                            echo"<td>".$row["id"]."</td>";
                            echo"<td>";
                            $user="SELECT * FROM user" or die("can't conncet database");
                            $user=mysqli_query($conn,$user);
                            while ($rsuser = mysqli_fetch_array($user)) {
                                if($rsuser['id'] == $row['iduser']){
                                    echo $rsuser["email"];
                                }
                            }
                            echo "</td>";
                            echo"<td>".$row["content"]."</td>";
                            ?>
                            <td><a href='./delete_feedback.php?id=<?php echo $row["id"]?>' data-toggle="tooltip" title="Xóa phản hồi này!">Delete</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>   
        </table>   
    </div>
</body>
</html>