<?php

    include('../config.php');
    ob_start();
    define('student_management', true);
    session_start();
    if(isset($_SESSION['user_data'])){
        $user = $_SESSION['user_data'];
    }else{
        header('location: ../index.php');
    }
?>
<?php
  $sql = "SELECT * FROM `users`";
  $query = mysqli_query($con, $sql);
  $profile_id = mysqli_fetch_assoc($query);
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
<body class="">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand text-primary" href="index.php"><i class="fas fa-tachometer-alt"></i> LPI Dashbord</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary disabled" href="#"><i class="fas fa-user"></i> <?= ucwords($user['0']) ?></a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="register.php"><i class="fas fa-user-plus"></i> Add Admin</a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="user_profile.php?id=<?= $user['1'] ?>"><i class="fas fa-user"></i> My Profile</a>
                  </li>
                  <li class="nav-item ms-3">
                    <a class="nav-link text-primary" href="exit.php"><i class="fas fa-power-off"></i> Exit</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </div>