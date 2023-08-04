<?php
    include('../config.php');
    $id = $_GET['id'];
    if(empty($id)){
        header("location: index.php");
    }
    $sql = "SELECT * FROM `users` WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($query);

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
<body class="student_profile">
    <div class="card">
        <div class="banner">
            <img class="profile" src="../upload/users/<?= $row
            ['photo'] ?>" alt="">
        </div>
        <h2 class="name"><?= ucwords($row['name']) ?></h2>
        <div class="title">Email:- <?= $row['email'] ?></div>
        <div class="title">Join Date:- <?= date("d-m-Y",strtotime($row['date'])) ?></div>
        <div class="footer">
            <a href="edit_user.php?id=<?= $row['id'] ?>" class="me-1 edit">
                <i class="fas fa-edit"></i>
            </a>
            <a href="all_users.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>