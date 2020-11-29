<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $error= array();
            $target_dir = "../assets/img/image/";
            $fileName= basename($_FILES["$idEdit"]['name']);
            $target_file =$target_dir.basename($_FILES["$idEdit"]['name']);
           

            $allowUpload   = true;
            $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif','');

            if ($_FILES["$idEdit"]["size"] > 800000)
                {
                    $error['uploadAvatar'] ='<div class="alert alert-danger">              
                    Không được upload ảnh lớn hơn 800000 (bytes).
                    </div>';
                    $allowUpload = false;
                }
            
            if (file_exists($target_file))
                {
                    
                    $allowUpload = false;
                }


            if ($FileType=="")
            {                   
                $allowUpload = false;
            }

            if (!in_array(strtolower($FileType),$allowtypes ))
            {
                $error['uploadAvatar'] ='<div class="alert alert-danger">              
                    Chỉ được upload các định dạng jpg, png, jpeg, gif.
                    </div>';
                
                $allowUpload = false;
            }

            if ($allowUpload)
            {
                
                if (move_uploaded_file($_FILES["$idEdit"]["tmp_name"], $target_file))
                {

                }
                else
                {
                    $error['uploadAvatar'] ='<div class="alert alert-danger">              
                    Có lỗi xảy ra khi upload file.
                    </div>';
                    
                }
            }
        }
        
?>