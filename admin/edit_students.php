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
    $sql = "SELECT * FROM `students` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);

?>
<?php

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $roll = mysqli_real_escape_string($con, $_POST['roll']);
    $department = mysqli_real_escape_string($con, $_POST['department']);
    $semister = mysqli_real_escape_string($con, $_POST['semister']);
    $shift = mysqli_real_escape_string($con, $_POST['shift']);
    $father_name = mysqli_real_escape_string($con, $_POST['father_name']);
    $mother_name = mysqli_real_escape_string($con, $_POST['mother_name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type = ['jpg','png','jpeg'];

    if(!empty($filename)){
        if(in_array($image_ext, $allow_type)){
            if($size<=5000000){
                $unlink = "../upload/students/".$result['file'];
                unlink($unlink);
                move_uploaded_file($tmp_name, "../upload/students./".$filename);
                $update = "UPDATE `students` SET `name`='$name',`roll`='$roll',`department`='$department',`semester`='$semister',`shift`='$shift',`father_name`='$father_name',`mother_name`='$mother_name',`address`='$address',`number`='$number',`file`='$filename' WHERE id = '$id'";
                $insquery = mysqli_query($con, $update);
                if($insquery){
                    $successfull = "data insert successfull";
                    header("location: all_students.php");
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
        $update2 = "UPDATE `students` SET `name`='$name',`roll`='$roll',`department`='$department',`semester`='$semister',`shift`='$shift',`father_name`='$father_name',`mother_name`='$mother_name',`address`='$address',`number`='$number' WHERE id = '$id'";
        $insquery2 = mysqli_query($con, $update2);
        if($insquery2){
            $successfull = "data insert successfull";
            header("location: all_students.php");
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
<body class="bg-light add_student">
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
                    <a class="nav-link text-primary" href="#"><i class="fas fa-user"></i> <?= $user['0'] ?></a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="register.php"><i class="fas fa-user-plus"></i> Add Admin</a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="#"><i class="fas fa-user"></i> My Profile</a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="all_students.php"><i class="fas fa-sign-out-alt"></i> Back</a>
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
                <h2  class="text-center display-5">UPDATE STUDENT INFORMATION</h2>
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <input type="text" name="name" value="<?= $result['name']  ?>" class="form-control form-control-lg" placeholder="Ente Your Name" maxlength="30" minlength="4" required>
                            </div>
                            <div class="mt-2">
                                <input type="number" name="roll" value="<?= $result['roll']  ?>" class="form-control form-control-lg" placeholder="Ente Your Roll" required>
                            </div>
                            <div class="mt-2">
                                <select name="department" class="form-control form-control-lg" required>
                                    <option  value="<?= $result['department']?>" selected><?= $result['department']  ?></option>
                                    <option value="Computer">Computer</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="semister" class="form-control form-control-lg" required>
                                <option  value="<?= $result['semester']?>" selected><?= $result['semester']  ?></option>
                                    <option value="7th">7th</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <select name="shift" class="form-control form-control-lg" required>
                                <option  value="<?= $result['shift']?>" selected><?= $result['shift']  ?></option>
                                    <option value="1st">1st Shift</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="father_name" value="<?= $result['father_name']  ?>" class="form-control form-control-lg" placeholder="Ente Your Father Name" required>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="mother_name" value="<?= $result['mother_name']  ?>" class="form-control form-control-lg" placeholder="Ente Your Mother Name" required>
                            </div>
                            <div class="mt-2">
                                <input type="text" name="address" value="<?= $result['address']  ?>" class="form-control form-control-lg" placeholder="Ente Your Upazila & Zila name" required>
                            </div>
                            <div class="mt-2">
                                <input type="number" name="number" value="<?= $result['number']  ?>" maxlength="11" minlength="11" class="form-control form-control-lg" placeholder="Ente Your Number" required>
                            </div>
                            <div class="mt-2 text-start">
                                <label for="file" class="form-lebel">Select your photo</label>
                                <input type="file" name="file" id="file" class="form-control form-control-lg">
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