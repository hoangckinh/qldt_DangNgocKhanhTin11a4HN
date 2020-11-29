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
        
        include('connection.php');
        $sql="SELECT * FROM brand" or die("can't conncet database");
        $result=mysqli_query($conn,$sql);
            
    ?>
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <p>Nhập đầy đủ thông tin sản phẩm</p>
        <form action="#" class="was-validated" method="POST">
            
            <div class="form-group">
                <label for="">Tên sản phẩm:</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="tensp" required>    
            </div>
            <div class="form-group">
                <label for="">Tên hãng:</label>
                
                <select name="tenhang" class="custom-select">
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id']?>"><?php echo $row['tenhang']?></option>
                    <?php }?>
                </select>   
            </div>
            <div class="form-group">
                <label for="">Giá:</label>
                <input type="number" class="form-control" placeholder="Giá" name="gia" required>
            </div>
            <div class="form-group">
                <label class="col-form-label input-label">Image</label>
                <div class="">
                    <div class="media align-items-center">
                        
                    <label class="imagePost mr-3" for="avatarUploader">
                        <img class="imagePost" id="avatar-info" src="../images/sp/defaultimage.jpg" alt="">
                    </label>
                    <div class="media-body">
                        <div class="btn btn-sm btn-primary file-attachment-btn mb-2 mb-sm-0 mr-2">Upload Image
                            <input type="file" class="file-attachment-btn-label" id="avt-info" name="img" onchange="showPreview(event);">
                        </div>
                        <a class="btn btn-sm btn-white mb-2 mb-sm-0" onclick="deleteAvt()" >Delete</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">info product:</label>
                <textarea class="form-control ckeditor" rows="5" placeholder="Nhập chi tiết thông tin sản phẩm" name="text"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
            </div>
        </form>
        <?php
            include('connection.php');

            if(isset($_POST['submit'])){
                $ma=$_POST['masp'];
                $ten=$_POST['tensp'];
                $gi=$_POST['gia'];
                $img=$_POST['image'];
                $info=$_POST['text'];
                $th=$_POST['tenhang'];
                $sql ="INSERT INTO products VALUES('$ma','$ten','$th','$gi','$img','$info')";
                $rs=mysqli_query($conn,$sql);
                if ($rs) {

                    echo "<div class='alert alert-success'>Thêm thành Công.</div>";
                }
                elseif ($ten=""|| $gi=""|| $img=""|| $th=""|| $info="") {
                    echo "<div class='alert alert-danger'>Thêm thất bại! (Nhập đầy đủ thông tin cho sản phẩm).</div>";
                }
                else {
                    echo "<div class='alert alert-danger'>Thêm thất bại! (kiểm tra lại mã sản phẩm có thể bị trùng).</div>";
                }
            }
        ?>
    </div>
</body>
</html>