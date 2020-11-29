<?php 
    include('../admin/connection.php');
    session_start();
    if (isset($_SESSION["loginUser"])) {
        $loginUser = $_SESSION["loginUser"];
        $loginId = $_SESSION["loginId"];
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
                <div class="main">
                    <?php                      
                        $result2 = mysqli_query($conn, 'select count(id) as total from products');
                        $rows = mysqli_fetch_assoc($result2);
                        $total_records = $rows['total'];
            
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 3;
                        $total_page = ceil($total_records / $limit);
                        if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        $start = ($current_page - 1) * $limit;
              
                    ?>
                    <?php
                        
                        $sql="SELECT * FROM products LIMIT $start, $limit" or die("can't conncet database");
                        $result=mysqli_query($conn,$sql);
                    ?>
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
                <div class="pagination">
                    
                        <?php
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="index.php?page='.($current_page-1).'" class="page-first">Trang trước |</a>  ';
                        }
                        for ($i = 1; $i <= $total_page; $i++){
                            if ($i == $current_page){
                                echo '<span>'.$i.' |</span>';
                            }
                            else{
                                echo '<a href="index.php?page='.$i.'">' .$i. '  |</a>';
                            }
                        }
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="index.php?page='.($current_page+1).'">Trang tiếp</a> ';
                        }
                        ?>

                </div>
            </div>
            <?php
            if(isset($loginId)){
                include('feedBack.php');
            }
            ?>
        </div>
        <!--footer-->
        
        <?php include('footer.php');?>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>
    <script>
        window.onscroll = function() {myFunction()};
        var mybutton = document.getElementById("myBtn");
        function myFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            }else{
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            $('html,body').animate({scrollTop: 0},'slow');
        }
    </script>
</body>

</html>