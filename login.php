<?php
    include('config.php');
?>
<?php include('header.php') ?>
<body class="bg-light login">
    <div class="container">
        <div class="d-flex justify-content-between mt-5">
            <a href="index.php" class="btn btn-primary">Home</a>
        </div>
        <?php
            if(isset($_SESSION['error'])){
            $error = $_SESSION['error'];
        ?>
        <div class="alert alert-dismissible alert-danger mt-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <?php 
            echo $error;
            unset($_SESSION['error']); 
            ?>
        </div>
        <?php
            }else{
            echo "";
            }
        ?>
        <div class="center">
            <div class="wrap">
                <h2 class="text-center display-5">ADMIN LOGIN</h2>
                <div class="row justify-content-center text-center">
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8">
                        <form action="" method="POST">
                            <div class="mt-2">
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Ente Your Email" required>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Ente Your Password" required>
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
<?php
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    if($row){
        $record = mysqli_fetch_assoc($query);
        $user_data = array($record['name'],$record['id']);
        $_SESSION['user_data'] = $user_data;
        header('location: admin/index.php');
    }else{
        $_SESSION['error'] = "<small>Invalid UserName/Password</small>";
        header("location: login.php");
    }
}

?>