<?php 
    include('header.php');
    $search_text = $_GET['student_search'];
    if(empty($_GET['student_search'])){
        header("location: index.php");
    }
?>
    <section class="mt-3">
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
                        <li class="nav-item active">
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
                    <i class="fas fa-users"></i>
                    All Students
                  </h1>
                  <p class="p-2 bg-muted text-muted">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashbord &nbsp;/&nbsp; 
                    <span class="text-dark">
                      <i class="fas fa-users"></i>
                      All Students
                    </span>
                  </p>
                  <div class="d-flex justify-content-between">
                    <h4>Search result for: <span class="text-success"><?= $search_text ?></span></h4>
                    <form class="d-flex" action="student_search.php" method="GET">
                        <input class="form-control me-1 input-sm" type="text" name="student_search" required maxlength="70" placeholder="Roll/Name" autocomplete="off">
                        <button class="btn btn-secondary btn-sm" type="submit">Search</button>
                    </form>
                  </div>
                  <table class="table table-striped table-bordered table-hover mt-2">
                    <?php
                    $table_top = "<thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Roll</th>
                      <th>Name</th>
                      <th>Departmant</th>
                      <th>Semester</th>
                      <th>Shift</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>";
                    ?>
                      <?php

                        $sql = "SELECT * FROM `students`  WHERE name LIKE '%$search_text%' OR roll LIKE '%$search_text%' ORDER BY time DESC";
                        $query = mysqli_query($con, $sql);
                        $rows = mysqli_num_rows($query);
                        if($rows){
                            $i = 1;
                            echo $table_top;
                          foreach($query as $row){

                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row['roll'] ?></td>
                        <td><?= ucwords($row['name']) ?></td>
                        <td><?= $row['department'] ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td><?= $row['shift'] ?></td>
                        <td>
                          <a href="edit_students.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                          <form method="POST" action="" class="d-inline" onsubmit="return confirm('Are your sure you want to delete?')">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="image" value="<?php echo $row['file'] ?>">
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm">
                          </form>
                          <a href="student_profile.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Profile</a>
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

<?php 

  include('footer.php');
  if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $hidden_file = $_POST['image'];
    $unlink = "../upload/students/".$hidden_file;
    $delete_student = "DELETE FROM `students` WHERE id = '$id'";
    $delete_query = mysqli_query($con, $delete_student);
    if($delete_query){
      unlink($unlink);
      echo $delete = "Successfully Delete record";
      header('location: all_students.php');
    }else{
      echo $failed = "Failed, Please try again";
      header('location: all_students.php');
    }
  }

?>