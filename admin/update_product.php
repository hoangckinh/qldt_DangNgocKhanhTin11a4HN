<?php 
    session_start();
    if (!isset($_SESSION["loginSession"])) {
        header("Location: ./login_admin.php");
    }
    
    $ma=$_GET['id'];
    include('connection.php');
    $sql ="SELECT * FROM products WHERE masp='$ma'" or die('lỗi truy vấn');
    $qr = mysqli_query($conn,$sql);
    $rs= mysqli_fetch_assoc($qr);
    
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
        <h2>UPDATE sản phẩm</h2>
        <p>(Nhập đầy đủ thông tin sản phẩm)</p>
        <form action="#" class="was-validated" method="POST">         
                <input type="hidden" class="form-control" id="" name="masp" required value="<?php echo $rs['masp'];?>">

            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" class="form-control" id=""  name="tensp" required value="<?php echo $rs['tensp'];?>">    
            </div>
            <div class="form-group">
                <label for="">Tên hãng:</label>
                <input type="text" class="form-control" id=""  name="tenhang" required value="<?php echo $rs['tenhang'];?>">    
            </div>
            <div class="form-group">
                <label for="">Giá:</label>
                <input type="number" class="form-control" id="" name="gia" required value="<?php echo $rs['gia'];?>">
            </div>
            <div class="form-group">
                <label for="">image:</label>
                <input type="text" class="form-control" id="" name="image" required value="<?php echo $rs['image'];?>">
            </div>
            <div class="form-group">
                <label for="">info product:</label>
                <textarea class="form-control" rows="5" id="" name="text"><?php echo $rs['thongtin'];?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
        <?php

            if(isset($_POST['submit'])){
                $ten=$_POST['tensp'];
                $gi=$_POST['gia'];
                $img=$_POST['image'];
                $info=$_POST['text'];
                $th=$_POST['tenhang'];           
                $sql ="UPDATE products SET tensp = '$ten', tenhang = '$th', gia = '$gi', image ='$img', thongtin ='$info' WHERE masp ='$ma'";
                $rs=mysqli_query($conn,$sql);
                if ($rs) {
                    echo "<h2>Update thành công.</h2>";
                }
                else {
                    echo "<h2>Update thất bại!</h2>";
                }
            }
        ?>
    </div>
</body>
</html>