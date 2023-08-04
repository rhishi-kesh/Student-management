<?php

    include('../config.php');
    session_start();
    if(isset($_SESSION['user_data'])){
        $user = $_SESSION['user_data'];
    }else{
        header('location: ../index.php');
    }
?>
<?php

    $id = $_GET['id'];
    if(empty($id)){
        header("location: index.php");
    }
    $sql = "SELECT * FROM `users` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);
?>
<?php
    if(isset($_POST['submit'])){
        $id = $_GET['id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $filename = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $size = $_FILES['photo']['size'];
        $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $allow_type = ['jpg','png','jpeg'];
        
        if(!empty($filename)){
            if(in_array($image_ext, $allow_type)){
                if($size<=5000000){
                    $unlink = "../upload/users/".$result['photo'];
                    unlink($unlink);
                    move_uploaded_file($tmp_name, "../upload/users./".$filename);
                    $update = "UPDATE `users` SET `name`='$name',`photo`='$filename' WHERE id = '$id'";
                    $insquery = mysqli_query($con, $update);
                    if($insquery){
                        $successfull = "data insert successfull";
                        header("location: all_users.php");
                    }else{
                        echo $failed = "Failed!";
                    }
                }else{
                    echo $photo_error = "Image size should not be greater then 2MB";
                }
            }else{
                echo $photo_error = "Image file type is not allow (Only jpg, png & jpeg)";   
            }
        }else{
            $update2 = "UPDATE `users` SET `name`='$name' WHERE id = '$id'";
            $insquery2 = mysqli_query($con, $update2);
            if($insquery2){
                $successfull = "data insert successfull";
                header("location: all_users.php");
            }else{
                echo $failed = "Failed!";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lakshmipur polytechnic institute</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand text-primary" href="index.php"><i class="fas fa-tachometer-alt"></i> LPI</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="all_users.php"><i class="fas fa-sign-out-alt"></i> Back</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </div>
    <div class="container">
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
                <h2  class="text-center display-5">UPDATE USER INFORMATION</h2>
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <input type="text" name="name" class="form-control form-control-lg" value="<?= $result['name'] ?>" placeholder="Ente Your Name" maxlength="30" minlength="4" required>
                            </div>
                            <div class="mt-2 text-start">
                                <label for="file" class="form-lebel">Select your photo</label>
                                <input type="file" name="photo" class="form-control form-control-lg">
                            </div>
                            <div class="mt-2">
                                <input type="submit" name="submit" class="form-control btn btn-success btn-lg" value="SUBMIT">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center">2006-<?= date('Y')?> All Right Reserved. Lakshmipur Polytechnic Institute</p>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>