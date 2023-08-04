<?php include('header.php') ?>
    <section class="mt-3" style="margin-bottom: 40.5vh;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav flex-column">
                        <li class="nav-item active">
                            <a href="index.php" class="nav-link text-secondary p-3 border">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashbord
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_student.php" class="nav-link text-secondary p-3 border">
                                <i class="fas fa-user-plus"></i>
                                Add Student
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="all_students.php" class="nav-link text-secondary p-3 border">
                                <i class="fas fa-users"></i>
                                All Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="all_users.php" class="nav-link text-secondary p-3 border">
                                <i class="fas fa-users"></i>
                                All Admins
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-2 mt-lg-0">
                  <h1 class="text-primary">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashbord
                  </h1>
                  <p class="p-2 bg-muted">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashbord
                  </p>
                  <div class="row">
                    <div class="col-md-3">
                        <div class="box">
                            <div class="top-box d-flex justify-content-between align-item-center bg-primary p-3 text-white">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <?php
                                        $sql = "SELECT * FROM `users`";
                                        $query = mysqli_query($con, $sql);
                                        $count_users = mysqli_num_rows($query);
                                    ?>
                                    <h3><?= $count_users ?></h3>
                                    <p class="mb-0">All Admin</p>
                                </div>
                            </div>
                            <a href="all_users.php">
                                <div class="bottom-box d-flex justify-content-between p-2">
                                    <p class="mb-0">See All Admins</p>
                                    <div class="arrow-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <div class="top-box d-flex justify-content-between align-item-center bg-primary p-3 text-white">
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <?php
                                        $sql = "SELECT * FROM `students`";
                                        $query = mysqli_query($con, $sql);
                                        $count_students = mysqli_num_rows($query);
                                    ?>
                                    <h3><?= $count_students ?></h3>
                                    <p class="mb-0">All Students</p>
                                </div>
                            </div>
                            <a href="all_students.php">
                                <div class="bottom-box d-flex justify-content-between p-2">
                                    <p class="mb-0">See All Students</p>
                                    <div class="arrow-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
      <p class="text-center bg-muted mb-0 py-1" style="margin-top: 7px;">2006-<?= date('Y')?> All Right Reserved. Lakshmipur Polytechnic Institute</p>
    </footer>
    <?php include('footer.php') ?>