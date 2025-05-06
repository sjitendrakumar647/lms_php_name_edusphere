<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<title>Manage Content</title>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Content Management</h5>
                        <a href="add_content.php" class="btn btn-light">
                            <i class="bi bi-plus-circle"></i> Add Content
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="delete_content.php" method="post">
                            <!-- <div class="d-flex mb-3">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete Selected
                                </button>
                            </div> -->

                            <div class="table-responsive">
                                <table id="contentTable" class="table table-striped table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <!-- <th>Select</th> -->
                                            <th>Title</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $content_query = mysqli_query($conn, "SELECT * FROM content") or die(mysqli_error());

                                            while ($row = mysqli_fetch_array($content_query)) {
                                                $id = $row['content_id'];
                                        ?>
                                        <tr>
                                            <!-- <td>
                                                <input type="checkbox" name="selector[]" value="<?php echo $id; ?>" class="form-check-input">
                                            </td> -->
                                            <td><?php echo $row['title']; ?></td>
                                            <td>
                                                <a href="edit_content.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteSingleModal">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Single Delete Modal -->
    <div class="modal fade" id="deleteSingleModal" tabindex="-1" aria-labelledby="deleteSingleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    
    <script>
        $(document).ready(function() {
            $('#contentTable').DataTable();
        });

        // Confirm Delete
        let deleteId;
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function () {
                            deleteId = this.getAttribute('data-id');
                        });
                    });

                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        if (deleteId) {
                            fetch('delete_content.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: 'id=' + deleteId
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() === 'success') {
                                    window.location.reload();
                                }
								else {
									window.location = 'content.php';
								}
                            });
                        }
                    });
    </script>
</body>
</html>
