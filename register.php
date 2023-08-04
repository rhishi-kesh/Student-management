<?php
    
    include('config.php');
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $Cpassword = mysqli_real_escape_string($con, $_POST['Cpassword']);
        $filename = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $size = $_FILES['photo']['size'];
        $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $allow_type = ['jpg','png','jpeg'];
        
        if(strlen($password) > 7){
            if($password == $Cpassword){
                $sql = "SELECT * FROM `users` WHERE email = '$email'";
                $query = mysqli_query($con, $sql);
                $rows = mysqli_num_rows($query);
                if($rows){
                    $email_exit = "Email already in use";
                }else{
                    if(in_array($image_ext, $allow_type)){
                        if($size<=2000000){
                            move_uploaded_file($tmp_name, "upload/users./".$filename);
                            $insert = "INSERT INTO `users`(`name`, `email`, `password`, `c_password`, `photo`) VALUES ('$name','$email','$password','$Cpassword','$filename')";
                            $insquery = mysqli_query($con, $insert);
                            if($insquery){
                                $successfull = "data insert successfull";
                            }else{
                                echo $failed = "Failed!";
                            }
                        }else{
                            echo $photo_error = "Image size should not be greater then 2MB";
                        }
                    }else{
                        echo $photo_error = "Image file type is not allow (Only jpg, png & jpeg)";   
                    }
                }
            }else{
                $pass_match = "Password Not match";
            }
        }else{
            $pass_lenght =  "Password must be 8 character";
        }

    }

?>
<?php include('header.php') ?>
<body class="bg-light login">
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="login.php" class="btn btn-primary">Login</a>
        </div>
        <?php
        if(isset($successfull)){
        ?>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php 
            echo $successfull;
            ?>
        </div>
        <?php
            }else{
            echo "";
            }
        ?>
        <div class="center">
            <div class="wrap">
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Ente Your Name" maxlength="30" minlength="4" required>
                            </div>
                            <div class="mt-2">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Ente Your Email" maxlength="30" minlength="4" required>
                                <?php
                                    if(isset($email_exit)){
                                        echo "<div class='alertcc fw-lighter text-danger'>" . $email_exit . "</div>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Ente Your Password" maxlength="30" minlength="8" required>
                                <?php
                                    if(isset($pass_lenght)){
                                        echo "<div class='alertcc fw-lighter text-danger'>" . $pass_lenght . "</div>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="Cpassword" class="form-control form-control-lg" placeholder="Ente Your Confirm Password" maxlength="30" minlength="8" required>
                                <?php
                                    if(isset($pass_match)){
                                        echo "<div class='alertcc fw-lighter text-danger'>" . $pass_match . "</div>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                            </div>
                            <div class="mt-1 text-start">
                            <label for="file" class="form-lebel">Select your Photo</label>
                                <input type="file" name="photo" id="file" class="form-control form-control-lg" required>
                            </div>
                            <div class="mt-2">
                                <input type="submit" name="submit" class="form-control btn btn-success btn-lg" value="SUBMIT">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center mb-0">2006-<?= date('Y')?> All Right Reserved. Lakshmipur Polytechnic Institute</p>
    </div>
<?php include('footer.php') ?>