<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>
            
            <!-- Add Academic Year Form -->
            <div class="col-lg-4 col-md-5 mt-5">
                <?php include('add_department.php'); ?>
            </div>
            
            <!-- Department List -->
            <div class="col-lg-5 col-md-7 mt-5">
                        <div class="card shadow-lg">
                            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                
                                <h5 class="mb-0 display-6 d-md-block d-lg-none fw-bold">📋 Department List</h5> <!-- Medium: display-6 -->
                                <h5 class="mb-0 d-none d-lg-block">📋 Department List</h5> <!-- Large: display-4 -->

                                <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bi bi-trash"></i> Delete Selected
                                </button> -->
                            </div>
                            <div class="card-body table-responsive">
                                <form action="delete_department.php" method="post">
                                    <table class="table table-hover">
                                        <thead class="table-info">
                                            <tr>
                                                <th><input type="checkbox" id="selectAll"></th>
                                                <th>Department</th>
                                                <th>Person In-charge</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user_query = mysqli_query($conn, "SELECT * FROM department") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($user_query)) {
                                                $id = $row['department_id'];
                                            ?> 
                                                <tr>
                                                    <td>
                                                        <input class="form-check-input selectItem" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                    </td>
                                                    <td><?php echo $row['department_name']; ?></td>
                                                    <td><?php echo $row['dean']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteSingleModal">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    

    <!-- Delete Modal -->
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

    <script>
                    function toggleSidebar() {
                        document.getElementById("sidebar").classList.toggle("sidebar_open");
                    }

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

                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        if (deleteId) {
                            fetch('delete_department.php', {
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
									window.location = 'department.php';
								}
                            });
                        }
                    });
                </script>
    <?php include('../footer.php'); ?>
    <!-- <?php include('../script.php'); ?> -->
</body>
</html>