<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
		<script>
		window.location = "assignment_student.php<?php echo '?id='.$get_id; ?>";
		</script>
	  <?php
	  }
	
 ?>
<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <?php include('student_sidebar.php'); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Submit Assignment</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <?php 
                            $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                LEFT JOIN class ON class.class_id = teacher_class.class_id
                                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
                            $class_row = mysqli_fetch_array($class_query);
                        ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Uploaded Assignments</li>
                            </ol>
                        </nav>

                        <!-- Assignment Info -->
                        <?php
                            $query1 = mysqli_query($conn, "SELECT * FROM assignment WHERE assignment_id = '$post_id'") or die(mysqli_error($conn));
                            $row1 = mysqli_fetch_array($query1);
                        ?>
                        <div class="alert alert-info">
                            Submit Assignment in: <strong><?php echo $row1['fname']; ?></strong>
                        </div>

                        <!-- Assignment Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date Upload</th>
                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Submitted By</th>
                                        <th>Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM student_assignment 
                                            LEFT JOIN student ON student.student_id = student_assignment.student_id
                                            WHERE assignment_id = '$post_id' ORDER BY assignment_fdatein DESC") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['student_assignment_id'];
                                            $student_id = $row['student_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['assignment_fdatein']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['fdesc']; ?></td>
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                        <td>
                                            <?php if ($session_id == $student_id) { ?>
                                                <span class="badge bg-success"><?php echo $row['grade']; ?></span>
                                            <?php } else { ?>
                                                <span class="text-muted">N/A</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php 
                include('submit_assignment_sidebar.php');
                ?>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    
</body>
</html>