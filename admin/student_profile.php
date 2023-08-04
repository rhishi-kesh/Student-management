<?php
include('../config.php');
$id = $_GET['id'];
if(empty($id)){
    header("location: index.php");
}
$sql = "SELECT * FROM `students` WHERE id = '$id'";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);

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
            <img class="profile" src="../upload/students/<?= $result['file'] ?>" alt="">
        </div>
        <h2 class="name"><?= ucwords($result['name']) ?></h2>
        <div class="title">Roll:- <?= $result['roll'] ?></div>
        <div class="title">Department:- <?= $result['department'] ?></div>
        <div class="title">Semester:- <?= $result['semester'] ?></div>
        <div class="title">Shift:- <?= $result['shift'] ?></div>
        <div class="title">Father Name:- <?= ucwords($result['father_name']) ?></div>
        <div class="title">Mother Name:- <?= ucwords($result['mother_name']) ?></div>
        <div class="title">Address:- <?= ucwords($result['address']) ?></div>
        <div class="title">Phone:- <?= $result['number'] ?></div>
        <div class="footer">
            <a href="all_students.php">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>