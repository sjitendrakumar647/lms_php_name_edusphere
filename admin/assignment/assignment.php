<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<title>Assignment Files</title>
<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">
            <!-- sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Assignment File Uploaded List</h5>
                    </div>
                    <div class="card-body">
                        <?php
                            // Fetch assignments from the database
                            $query = mysqli_query($conn, "SELECT * FROM assignment 
                                LEFT JOIN teacher ON teacher.teacher_id = assignment.teacher_id 
                                LEFT JOIN teacher_class ON teacher_class.teacher_class_id = assignment.class_id 
                                INNER JOIN class ON class.class_id = teacher_class.class_id") 
                                or die(mysqli_error());

                            // Check if there are any assignments
                            if (mysqli_num_rows($query) > 0) {
                        ?>
                        <div class="table-responsive">
                            <table id="assignmentTable" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Date Upload</th>
                                        <th>Upload By</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['fdesc']; ?></td>
                                        <td><?php echo $row['fdatein']; ?></td>
                                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                        <td><?php echo $row['class_name']; ?></td>
                                        <td>
                                            <a href="uploads/<?php echo $row['fname']; ?>" download class="btn btn-sm btn-success">
                                                <i class="bi bi-download"></i> Download
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php 
                            } else { 
                                // Show alert if no assignments are available
                        ?>
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> No assignments have been uploaded yet.
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    
    <script>
        $(document).ready(function() {
            $('#assignmentTable').DataTable();
        });
    </script>
</body>
</html>
