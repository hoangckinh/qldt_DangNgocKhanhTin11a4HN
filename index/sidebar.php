<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!--Indicators-->
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2" ></li>
            </ul>
            <!--The slideshow-->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="banner" src="../images/banner/banner_x_t100.jpg" alt="Máy ảnh đẹp">
                </div>
                <div class="carousel-item">
                    <img  class="banner" src="../images/banner/accessories-main_banner_flat.jpg" alt="Máy ảnh đẹp">
                </div>
                <div class="carousel-item">
                    <img  class="banner" src="../images/banner/82241banner.png" alt="Máy ảnh đẹp">
                </div>
            </div>
            <!--Left and right controls-->
            <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <!--menu top-->
        <div class="menu_top">
            <nav id="nav_top">
                <ul>
                    <li><a href="http://localhost/WEBSITE/index/index.php" title="Nice Camera">Trang Chủ</a></li>
                    <li><a href="https://www.facebook.com/suns.hue.7/">Thông tin liên hệ</a></li>
                    <li><a href="./cart.php"><img src="../images/banner/icongiohang.jpg" alt="Cart" width="30px" height="30px"> Giỏ hàng</a></li>
                    <?php
                        if (isset($_SESSION["loginUser"])) { ?>
                            <li>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <img src="https://cdn2.iconfinder.com/data/icons/business-management-52/96/Artboard_20-512.png" alt="avatar" width="30px" height="30px">
                                    <?php echo $loginUser ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="./signOut.php">Đăng Xuất </a>
                                </div>
                            </li>
                            <li><a href="../admin/login_admin.php">Admin panel</a></li>
                    <?php 
                        }
                        else {?>
                            <li><a href="./login.php">Đăng nhập</a></li>
                            <li><a href="./register.php">Đăng ký</a></li>
                            <li><a href="../admin/login_admin.php">Admin panel</a></li>
                       <?php } ?>
                    
                </ul>
            </nav>
        </div>
        <!--Search-->
        <div class="menu_search">
            <form action="./search_products.php" method="POST">
                <input type="search" name="search" placeholder="Search.." required>
            </form>
        </div>