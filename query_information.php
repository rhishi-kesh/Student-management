<?php
    include('config.php');
    include("header.php");
    if(isset($_POST['submit'])){
        $department = $_POST['department'];
        $roll = $_POST['roll'];
        $sql = "SELECT * FROM `students` WHERE department = '$department' AND roll = '$roll'";
        $query = mysqli_query($con, $sql);
        $rows = mysqli_num_rows($query);
        if($rows){
            $result = mysqli_fetch_assoc($query);
            ?>
            <body class="student_profile">
                <div class="card">
                    <div class="banner">
                        <img class="profile" src="upload/students/<?= $result
                        ['file'] ?>" alt="">
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
                        <a href="exit.php">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </div>
            <?php
        }else{
            $_SESSION['error'] = "<small>Invalid Department/Roll</small>";
            header("location: index.php");
        }
    }else{
        header("location: 404.php");
    }
    include("footer.php");

?>