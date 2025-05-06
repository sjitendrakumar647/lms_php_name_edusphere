<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">

            <!-- Sidebar (Visible on Large Screens) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block mt-5 p-0">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>
            
            
            <!-- Add Class Section -->
            <div class="col-lg-9 col-md-12 mt-5">
                <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-success text-center p-2" role="alert">
                                <span class="fs-3">📖</span><strong>Class Overview</strong>
                            </div>
                        </div>
                    </div>
                <div class="d-md-flex flex-row justify-content-evenly">
                    
                    <div class="col-md-4 mt-3" id="class_section">
                        <div class="col-md-5 w-100">
                            <div class="card">
                                <div class="card-header bg-primary text-white text-center">
                                    <h5>➕ Add Class</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['save'])) {
                                        $class_name = $_POST['class_name'];

                                        $query = mysqli_query($conn, "SELECT * FROM class WHERE class_name = '$class_name'") or die(mysqli_error($conn));
                                        $count = mysqli_num_rows($query);

                                        if ($count > 0) {
                                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    ⚠️ Class already exists!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                        } else {
                                            mysqli_query($conn, "INSERT INTO class (class_name) VALUES ('$class_name')") or die(mysqli_error($conn));
                                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    ✅ Class added successfully!
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>';
                                            echo '<script>setTimeout(() => { window.location = "class.php"; }, 1500);</script>';
                                        }
                                    }
                                    ?>

                                    <form method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Class Name</label>
                                            <input name="class_name" type="text" class="form-control" placeholder="Enter Class Name" required>
                                        </div>

                                        <button type="submit" name="save" class="btn btn-success w-100">
                                            <i class="bi bi-plus-lg"></i> Add Class
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Main Content -->
                    <div class="col-md-5 mt-3">
                        <div class="card">
                            <div class="card-header bg-primary text-white text-center">
                                <h5>📚 Class List</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead class="table-info">
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $class_query = mysqli_query($conn, "SELECT * FROM class") or die(mysqli_error($conn));
                                        while ($class_row = mysqli_fetch_array($class_query)) {
                                            $id = $class_row['class_id'];
                                        ?>
                                            <tr>
                                                <td><?php echo $class_row['class_name']; ?></td>
                                                <td>
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
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this class?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>

    <script>
        let deleteId;
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');
            });
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (deleteId) {
                fetch('delete_class.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + deleteId
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        window.location.reload();
                    } else {
                        window.location= 'class.php';
                    }
                });
            }
        });
    </script>

</body>
</html>
