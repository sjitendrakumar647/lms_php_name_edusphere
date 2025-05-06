<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<title>Downloadable material</title>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">
            
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 mt-5 p-0 d-none d-lg-block ">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Downloadable File Uploaded List</h5>
                    </div>
                    <div class="card-body">
                        <?php
                            // Fetch files from the database
                            $query = mysqli_query($conn, "SELECT * FROM files 
                                LEFT JOIN teacher ON teacher.teacher_id = files.teacher_id 
                                LEFT JOIN teacher_class ON teacher_class.teacher_class_id = files.class_id 
                                INNER JOIN class ON class.class_id = teacher_class.class_id") 
                                or die(mysqli_error());

                            // Check if there are any files
                            if (mysqli_num_rows($query) > 0) {
                        ?>
                        <div class="">
                            <table id="fileTable" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Date Upload</th>
                                        <th>File Name</th>
                                        <th>Description</th>
                                        <th>Upload By</th>
                                        <th>Class</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $row['fdatein']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['fdesc']; ?></td>
                                        <td><?php echo $row['uploaded_by']; ?></td>
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
                                // Show alert if no files are available
                        ?>
                        <div class="alert alert-warning text-center" role="alert">
                            <i class="bi bi-exclamation-triangle"></i> No downloadable materials available at the moment.
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
            $('#fileTable').DataTable();
        });
    </script>
</body>
</html>
