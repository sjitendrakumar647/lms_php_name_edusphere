<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body class="bg-light">

    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">

            <!-- Sidebar (Visible on Large Screens) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block mt-5 p-0">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9 col-md-12 mt-5 d-md-flex flex-row justify-content-evenly">
                <div class="row mt-2">
                    
                        <div class="col-12 p-0">
                            <div class="alert alert-success text-center" role="alert">
                                <span class="fs-3">📖</span><strong>Subject Overview</strong>
                            </div>
                        </div>
                    
                    <!-- Add Subject Section -->
                    <div class="col-lg-4 col-md-6">
                        <?php include('add_subject.php'); ?>
                    </div>

                    <!-- Subject List -->
                    <div class="col-lg-8 col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="bi bi-book"></i> Subject List</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="table-info">
                                            <tr>
                                                <th>Subject Title</th>
                                                <th>Units</th>
                                                <th>Subject Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $subject_query = mysqli_query($conn, "SELECT * FROM subject") or die(mysqli_error($conn));
                                            while ($row = mysqli_fetch_array($subject_query)) {
                                                $id = $row['subject_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['subject_title']; ?></td>
                                                <td><?php echo $row['unit']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- End Row -->
            </div> <!-- End Main Content Area -->

        </div> <!-- End Row -->
    </div> <!-- End Container -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this subject?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Delete Modal -->
    <script>
        let deleteId;
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');
            });
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (deleteId) {
                fetch('delete_subject.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + deleteId
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        window.location.reload();
                    } else {
                        alert('sucessfull deleting subject!');
                        window.location.reload();
                    }
                });
            }
        });
    </script>

    <?php include('../footer.php'); ?>

</body>
</html>
