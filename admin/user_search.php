<?php 

    include('header.php');
    $search_text = $_GET['user_search'];
    if(empty($_GET['user_search'])){
      header("location: index.php");
  }

?>
    <section class="mt-3" style="margin-bottom: 8.9vh;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
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
                        <li class="nav-item active">
                            <a href="all_users.php" class="nav-link text-secondary p-3 border">
                                <i class="fas fa-users"></i>
                                All Admins
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9 mt-2 mt-lg-0">
                    <h1 class="text-primary">
                        <i class="fas fa-users"></i>
                        All Users
                    </h1>
                    <p class="p-2 bg-muted text-muted">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashbord &nbsp;/&nbsp;
                        <span class="text-dark">
                        <i class="fas fa-users"></i>
                        All Users
                        </span>
                    </p>
                    <div class="d-flex justify-content-between">
                        <h4>Search result for: <span class="text-success"><?= $search_text ?></span></h4>
                        <form class="d-flex" action="user_search.php" method="GET">
                            <input class="form-control me-1 input-sm" type="search" name="user_search" required maxlength="70" placeholder="Email" autocomplete="off">
                            <button class="btn btn-secondary btn-sm" type="submit">Search</button>
                        </form>
                    </div>
                    <table class="table table-striped table-bordered table-hover mt-2">
                        <?php $table_top = "<thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>"; ?>
                        <?php
                            $sql = "SELECT * FROM `users` WHERE email LIKE '%$search_text%' ORDER BY date DESC";
                            $query = mysqli_query($con, $sql);
                            $rows = mysqli_num_rows($query);
                            if($rows){
                                $i = 1;
                                echo $table_top;
                                foreach($query as $row){
                           
                        ?>
                        
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= ucwords($row['name']) ?></td>
                            <td><?= $row['email']  ?></td>
                            <td><?= date('d-m-Y', strtotime($row['date'])) ?></td>
                            <td>
                                <a href="user_profile.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Profile</a>
                            </td>
                        </tr>
                        <?php }}else{echo "
                            <h5 class='text-danger display-6' >No Record Found</h5>
                            <b>Suggestions:</b>
                            <ul>
                                <li style='margin-bottom: 2px;'>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                            </ul>
                        ";}?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </section>
    <footer>
      <p class="text-center bg-muted mb-0 py-1" style="margin-top: 7px;">2006-<?= date('Y')?> All Right Reserved. Lakshmipur Polytechnic Institute</p>
    </footer>
    <?php include('footer.php') ?>