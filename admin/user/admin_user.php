<?php include('../header.php'); ?>
<?php include('../session.php'); ?>



<body class="bg-light">
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">

            <!-- Sidebar (Visible on Large Screens, Collapses on Small) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9 col-md-12 mt-5 pt-1">
                <div class="alert alert-primary text-center">
                    <h4>👨‍💻 Admin Users List</h4>
                </div>

                <div class="row">
                    <!-- Add User Section -->
                    <div class="col-lg-4 col-md-6">
                        <?php include('add_user.php'); ?> 
                    </div>

                    <!-- Users List -->
                    <div class="col-lg-8 col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h5>📋 Admin Users</h5>
                                <a data-bs-toggle="modal" href="#deleteModal" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete Selected
                                </a>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-info">
                                        <tr>
                                            <th><input type="checkbox" id="selectAll"></th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $user_query = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($user_query)) {
                                            $id = $row['user_id'];
                                        ?> 
                                            <tr>
                                                <td><input class="form-check-input selectItem" type="checkbox" value="<?php echo $id; ?>"></td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td>
                                                    <a href="edit_user.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
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

                <!-- Delete Single User Modal -->
                <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm User Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this user?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmSingleDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JavaScript -->
                <script>
                    // Select All Checkbox
                    document.getElementById('selectAll').addEventListener('change', function () {
                        document.querySelectorAll('.selectItem').forEach(checkbox => {
                            checkbox.checked = this.checked;
                        });
                    });

                    let deleteId;
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function () {
                            deleteId = this.getAttribute('data-id');
                        });
                    });

                    document.getElementById('confirmSingleDelete').addEventListener('click', function () {
                        if (deleteId) {
                            fetch('delete_users.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: 'id=' + deleteId
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() === 'success') {
                                    window.location.reload();
                                } else {
                                    alert('Error deleting user!');
                                }
                            });
                        }
                    });
                </script>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
</body>
</html>
