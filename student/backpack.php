<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('navbar_student.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-md-3">
                <?php include('student_sidebar.php'); ?>
            </div>

            <!-- Inbox Messages (Center) -->
            <div class="col-md-6">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded">
                        <li class="breadcrumb-item"><a href="#"><b>Message</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                        <li class="breadcrumb-item">School Year: <strong><?php echo $school_year_query_row['school_year']; ?></strong> </li>
                    </ol>
                </nav>
                <!-- End Breadcrumb -->

                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Backpack</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $query_backpack = mysqli_query($conn, "SELECT * FROM student_backpack WHERE student_id = '$session_id' ORDER BY fdatein DESC") or die(mysqli_error($conn));
                        $num_row = mysqli_num_rows($query_backpack);
                        if ($num_row > 0) {
                        ?>
                            <form action="delete_backpack.php" method="post" id="deleteForm">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>File Name</th>
                                                <th>Description</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($query_backpack)) {
                                                $id = $row['file_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['fdatein']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td>
                                                    <a href="../teacher/<?php echo $row['floc']; ?>" class="btn btn-success btn-sm"><i class="bi bi-download"></i> Download</a>
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" style="width:80px;"><i class="bi bi-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        <?php } else { ?>
                            <div class="alert alert-info text-center"><i class="bi bi-info-circle"></i> No Files Inside Your Backpack.</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include('footer.php')?>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this file?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="delete_backpack.php" method="post">
                        <input type="hidden" name="delete" id="deleteFileId">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function() {
                    let fileId = this.getAttribute("data-id");
                    document.getElementById("deleteFileId").value = fileId;
                    let deleteModal = new bootstrap.Modal(document.getElementById("deleteModal"));
                    deleteModal.show();
                });
            });
        });
    </script>
</body>
</html>
