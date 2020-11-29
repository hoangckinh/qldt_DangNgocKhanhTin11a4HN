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
            <div class="content-product">
                 <?php
                    if (isset($_GET["brand"])) {
                        $brand = $_GET["brand"];
                        $sql="SELECT * FROM products WHERE id_hang = $brand" or die("can't conncet database");
                        $result=mysqli_query($conn,$sql);
                    }                     
                    // $result2 = mysqli_query($conn, "select count(masp) as total from products WHERE tensp LIKE '%$ten%'");
                    // $rows = mysqli_fetch_assoc($result2);
                    // $total_records = $rows['total'];
                    // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // $limit = 6;
                    // $total_page = ceil($total_records / $limit);
                    // if ($current_page > $total_page){
                    //     $current_page = $total_page;
                    // }
                    // else if ($current_page < 1){
                    //     $current_page = 1;
                    // }
                    // $start = ($current_page - 1) * $limit;
              
                ?> 
                   
                <!--Product-->
                
                <div class="main">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="info product p-2">
                                <div class="name-product">
                                    <h4><?php echo $row["name"] ?></h4>
                                </div>
                                <div class="image-product">
                                    <img src="../images/sp/<?php echo $row["image"]?>" alt="Máy ảnh">
                                </div>
                                <div class="price-product">
                                    <p>Giá: <?php echo number_format($row["gia"])?> ₫</p>
                                    </div>
                                <div class="btn-product">
                                    <a href="productInfo.php?id=<?php echo $row['id']?>" class="btn btn-primary">Thông tin</a>
                                    <a href="addCart.php?id=<?php echo $row['id']?>" class="btn btn-danger">Thêm vào giỏ</a>
                                    
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <!-- <div>                 
                    <?php
                        // if ($current_page > 1 && $total_page > 1){
                        //     echo '<a href="search_products.php?page='.($current_page-1).'">Prev</a> | ';
                        // }
                        // for ($i = 1; $i <= $total_page; $i++){
                        //     if ($i == $current_page){
                        //         echo '<span>'.$i.'</span> | ';
                        //     }
                        //     else{
                        //         echo '<a href="search_products.php?page='.$i.'">'.$i.'</a> | ';
                        //     }
                        // }
                        // if ($current_page < $total_page && $total_page > 1){
                        //     echo '<a href="search_products.php?page='.($current_page+1).'">Next</a> | ';
                        // }
                    ?>
                </div> -->
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