<div class="feedback">

        <div class="btn-showfeedback">
           <div>
                
                <a class="btn" data-toggle="modal" data-target="#myModal"><i class="far fa-comment"></i> Send FeedBack</a>
           </div>
        </div>
        </div>
        </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Send FeedBack</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="#" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $loginId?>">  
                    <div class="form-group">
                        <label for="comment">Phản hồi</label>
                        <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="9"
                        placeholder="Write Comment" required></textarea>
                    </div>
                </div>         
                <!-- Modal footer --> 
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" name="submit">Send</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
                </form>
                <?php
                    include('../admin/connection.php');
                        if (isset($_POST['submit'])) {
                            $id =$_POST['id'];
                            $ct = $_POST['content'];
                            $sql = "INSERT INTO feedback(iduser, content) VALUES ('$id', '$ct')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo "<script> alert('Đã gửi phản hồi của bạn.')</script>";
                                }
                            }
                        ?>                
            </div>
        </div>
    </div>