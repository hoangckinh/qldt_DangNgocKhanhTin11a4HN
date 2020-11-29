<?php 
    include('../admin/connection.php');
    session_start();
    if (isset($_SESSION["loginUser"])) {
        $loginUser = $_SESSION["loginUser"];
      }
      
?>
<!DOCTYPE html>
<html>

<head lang="vi">
    <title>NICE CAMERA</title>
    <?php
        include('../admin/header.php');
    ?>
</head>

<body>
    <div class="">
        <?php
             
            include('sidebar.php');
        ?>
        <div class="content">
            <?php
                include('menu_left.php');
            ?>
            <!--Product-->
            <div class="content-product">
                <div class="main row">
                    <?php
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                        }
                        $sql="SELECT * FROM products WHERE id='$id'" or die("can't conncet database");
                        $result=mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="product-information"> 
                        <div class="image-details col-sm-4">
                            <img src="../images/sp/<?php echo $row["image"]?>" alt="Máy ảnh">
                       </div>
                            <div class="details col-sm-8 row">
                                <div class="col-lg-7">
                                    <div class="product-title">
                                        <h2><?php $row["name"]?></h2>
                                    </div>
                                    <div class="product-price">
                                        <h4>Giá: <?php echo number_format($row["gia"])?> ₫</h4>
                                    </div>
                                    <hr>
                                    <div class="description">
                                        <h5>Mô tả:</h5>
                                        <p><?php echo $row["thongtin"]?></p>
                                    </div>
                                </div>
                                <div class="btn-product col-lg-5">
                                    <a href="addCart.php?id=<?php echo $row['id']?>" class="btn-addcart">+ Thêm vào giỏ hàng</a>  
                                </div> 
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php
            include('feedBack.php');
        ?>
        <!--footer-->
        <?php include('footer.php');?>
    </div>
</body>

</html>