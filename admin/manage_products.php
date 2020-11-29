
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
    <div class="sp">
        <h2>Danh sách sản phẩm</h2>
        <table class="table">
            <thead>
                <tr>
                    <th id="ma">Mã sản phẩm</th>
                    <th id="ten">Tên sản phẩm</th>
                    <th ip="tenhang">Tên hãng</th>
                    <th id="gia">Giá</th>
                    <th id="img">image</th>
                    <th id="tt">Thông tin</th>
                    <th id="acti">Action</th>
                </tr>
            </thead>
            <?php
                include('connection.php');
                $sql="SELECT * FROM products" or die("can't conncet database");
                $result=mysqli_query($conn,$sql);
            ?>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["id"]?></td>
                                <td><?php echo $row["name"]?></td>
                                <td>
                                <?php
                                    $brand="SELECT * FROM brand" or die("can't conncet database");
                                    $rsbrand=mysqli_query($conn,$brand);
                                    while ($row2 = mysqli_fetch_array($rsbrand)) {
                                        if($row2['id'] == $row['id_hang']){
                                            echo $row2["tenhang"];
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?php echo $row["gia"]?></td>
                                <td><image class='img-qladmin' src='../images/sp/<?php echo $row["image"]?>'></td>
                                <td><?php echo substr($row["thongtin"],0,150).'...'?></td>
                                <td>
                                    <a href="./update_product.php?id=<?php echo $row['id']?>" >Update</a> | 
                                    <a href="./delete_products.php?id=<?php echo$row['id']?>" data-toggle="tooltip" title="Xóa sản phẩm này!">Delete</a>
                                </td>
                            </tr>
                    <?php    
                        }
                    ?>
                </tbody>   
        </table>   
    </div>
    <script>
        
    </script>
</body>
</html>