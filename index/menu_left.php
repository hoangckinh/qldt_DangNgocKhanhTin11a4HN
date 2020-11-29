<div class="menu_left">
                <div class="title-menu">
                    <h5><img src="https://cdn3.iconfinder.com/data/icons/mobile-friendly-ui/100/menu-512.png" alt=""> DANH MỤC SẢN PHẨM</h5>
                </div>
                <div id="nav_left">
                    <?php
                        
                        $sql="SELECT * FROM brand" or die("can't conncet database");
                        $result=mysqli_query($conn,$sql);
                    ?>
                    <ul>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                    echo "<li>";
                                        echo '<a href="./xulyBrand.php?brand='.$row["id"].'">Máy ảnh '.$row["tenhang"].'</a>';
                                    echo "</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>