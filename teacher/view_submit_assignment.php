<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
    $post_id = $_GET['post_id'];
    if ($post_id == '') {
?>
    <script>
        window.location = "assignment_student.php<?php echo '?id=' . $get_id; ?>";
    </script>
<?php
    }
?>
<body id="studentTableDiv">
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            
            <?php include('teacher_sidebar.php'); ?>
            

            <!-- Main Content -->
            <div class="col-md-9 mt-5">
                <div class="card shadow-lg">
                    <div class="d-flex justify-content-between card-header bg-primary text-white">
                        <h5 class="mb-0">Uploaded Assignments</h5>
                        <a href="assignment.php<?php echo '?id=' . $get_id; ?>" class="btn btn-light btn-sm float-end">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
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
                                        <th>Download</th>
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
                                    ?>
                                    <tr>
                                        <td><?php echo $row['assignment_fdatein']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['fdesc']; ?></td>
                                        <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                        <td>
                                            <a href="../<?php echo $row['floc']; ?>" class="btn btn-sm btn-primary">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </td>
                                        <td>
                                            <form method="post" action="save_grade.php" class="d-flex align-items-center">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                                <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                                                <input type="text" name="grade" class="form-control form-control-sm me-2" value="<?php echo $row['grade']; ?>" placeholder="Grade">
                                                <button name="save" class="btn btn-success btn-sm">
                                                    <i class="bi bi-save"></i> Save
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>