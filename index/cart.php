
<?php 
    include('../admin/connection.php');
    session_start();
    if (isset($_SESSION["loginUser"])) {
        $loginUser = $_SESSION["loginUser"];
      }else {
        header("Location: login.php");
      }
    
      $status = "";
      if (isset($_POST['delete'])) {
        if (!empty($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $key => $value) {
            if ($_POST["masp"] == $key) {
              unset($_SESSION["cart"][$key]);
              $status = "<div class='box'>
              Sản phẩm đã được xóa khỏi giỏ hàng!</div>";
             
            }
            if (empty($_SESSION["cart"]))
              unset($_SESSION["cart"]);
          }
        }
      }
      
      if (isset($_POST['change'])) {
        foreach ($_SESSION["cart"] as &$value) {
          if ($value["masp"] === $_POST["masp"]) {
            $value['soluong'] = $_POST["soluong"];
            break;
          }
        }
      
      }
        
?>
<!DOCTYPE html>
<html>

<head lang="vi">
    
    <title>Giỏ Hàng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Web camera" content="đây là website bán máy ảnh">
    <!-- <link rel="stylesheet" href="../css/styleCart.css"> -->
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="https://previews.123rf.com/images/val2014/val20141603/val2014160300005/54302312-shopping-cart-icon.jpg"/>
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
                if(isset($_SESSION["cart"])){
                    $total_price = 0;
                    ?>
                <table id="cart" class="table table-hover table-condensed"> 
                    <thead> 
                        <tr> 
                            <th style="width:50%">Tên sản phẩm</th> 
                            <th style="width:10%">Giá</th> 
                            <th style="width:8%">Số lượng</th> 
                            <th style="width:22%" class="text-center">Thành tiền</th> 
                            <th style="width:10%"> </th> 
                        </tr> 
                    </thead> 
                    <?php foreach ($_SESSION["cart"] as $product) { ?>
                    <tbody>
                        <tr> 
                            <td data-th="Product">
                                <div class="row"> 
                                    <div class="col-sm-2 hidden-xs">
                                        <img src='../images/sp/<?php echo $product["image"]?>' alt="Sản phẩm 1" class="img-responsive" width="100">
                                    </div> 
                                    <div class="col-sm-10"> 
                                        <h4 class="nomargin"><?php echo $product["tensp"]?></h4> 
                                        <p><?php echo  substr($product["thongtin"],0,150).'...'?></p> 
                                    </div> 
                                </div> 
                            </td> 
                            <td data-th="Price"><?php echo number_format($product["gia"])?> ₫</td>
                            <form action="#" method="post">
                            <td data-th="Quantity">
                                <input type='hidden' name='masp' value="<?php echo $product["masp"]; ?>"/>
                                <input class="form-control text-center" name="soluong" value='<?php echo $product["soluong"]?>' type="number">
                            </td>
                            <?php $subtotal = ($product["soluong"]*$product["gia"]);?>
                            <td data-th="Subtotal" class="text-center"><?php echo number_format($subtotal)?> ₫</td> 
                            <td class="actions" data-th="">
                                <button class="btn btn-info btn-sm" name="change">
                                    <img src="../images/banner/iconupdate.png" alt="">
                                </button> 
                                <button class="btn btn-danger btn-sm" name="delete">
                                    <img src="../images/banner/icoxoa.png" alt="">
                                </button>
                            </td>
                            </form>
                        </tr> 
                    </tbody>
                    <?php $total_price += ($product["gia"] * $product["soluong"]);} ?>
                    <tfoot> 
                        <tr> 
                            <td>
                                <a href="./index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                            </td> 
                            
                            <td colspan="2" class="hidden-xs"></td> 
                            <td class="hidden-xs text-center">
                                <strong>Tổng: <?php  echo number_format($total_price)?> ₫</strong>
                            </td> 
                            <td>
                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Thanh toán <i class="fa fa-angle-right"></i></button>
                            </td> 
                        </tr> 
                    </tfoot> 
                </table>
                <div class="toast toast-message">
                    <div class="toast-header justify-content-between">
                        <strong>Message</strong>
                    </div>
                    <div class="toast-body">
                    <div class="alert mb-0" style="background-color: #d4edda; color: #155724;">Đặt hàng thành công vui lòng kiểm tra gmail hoặc điện thoại.</div>
                    </div>
                </div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Thông tin mua hàng</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="#" method="POST">
                                    <div class="form-group">
                                      <label for="usr">Họ Tên người nhận</label>
                                      <input type="text" class="form-control" id="usr" name="hoten" required placeholder="Họ tên">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                      <label for="sdt">SĐT</label>
                                      <input type="number" class="form-control" id="sdt" name="sdt" required placeholder="Số điện thoại">
                                    </div>
                
                                    <hr>
                                    <div class="form-group">
                                      <label for="diachi">Địa chỉ nhận hàng</label>
                                      <input type="text" class="form-control" id="diachi" name="diachi" required placeholder="Địa chỉ nhận hàng">
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <!-- nút lúc thanh toán-->
                                <button type="button" class="btn-feedb" id="btn-message">Buy</button>
                                <button type="button" class="btn-feedb" data-dismiss="modal">Clear</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php
                } else {
                    echo'<div class=cart-empty>';
                        echo'<div class="notification">';
                            echo "<h3>Giỏ hàng của bạn còn trống</h3>";  
                        echo"</div>";    
                        
                        echo'<div class="btn-cart">';
                            echo'<a href="index.php" class="btn-buynow">Mua ngay</a>';    
                        echo"</div>";    
                    echo'</div>';
                }?>
                </div>
            </div>
        </div>
        <!--footer-->
        <?php include('footer.php');?>
    </div>
    <script>
        $(document).ready(function(){
            $('#btn-message').click(function(){
               // $('.toast-message').toast({delay: 3000});
                //$('.toast-message').toast('show');
                $('#myModal').modal('hide');
                alert('Đặt hàng thành công vui lòng kiểm tra gmail hoặc điện thoại');
                location.href = "http://localhost/WEBSITE/index/index.php";
            });
        });
    </script>
</body>
</html>