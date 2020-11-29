<?php
    include('../admin/connection.php');
    session_start();
    
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
      
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $image = $row["image"];
        $tensp = $row["name"];
        $gia = $row["gia"];
        $thongtin = $row["thongtin"];

        if (!empty($_SESSION["cart"])) {
            $cart = $_SESSION["cart"];
            if(array_key_exists($id,$cart)){
                $cart[$id] = array(
                    "masp"=>$id,
                    "image"=>$image,
                    "tensp"=>$tensp,
                    "thongtin"=>$thongtin,
                    "soluong"=>$cart[$id]["soluong"]+1,
                    "gia"=>$gia
                );
            }else {
                $cart[$id] = array(
                    "masp"=>$id,
                    "image"=>$image,
                    "tensp"=>$tensp,
                    "thongtin"=>$thongtin,
                    "soluong"=>1,
                    "gia"=>$gia
                );
            }
        }else {
            $cart[$id] = array(
                "masp"=>$id,
                "image"=>$image,
                "tensp"=>$tensp,
                "thongtin"=>$thongtin,
                "soluong"=>1,
                "gia"=>$gia
            );
        }
        $_SESSION["cart"] = $cart;
    }else {
        # code...
    }
    header("Location: cart.php");
    ?>