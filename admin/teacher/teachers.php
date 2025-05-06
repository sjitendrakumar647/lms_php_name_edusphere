<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 mt-5 p-0 d-none d-lg-block ">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Add Teacher Form -->
            <div class="col-lg-4 col-md-5 mt-5" id="adduser">
                <?php include('add_teacher.php'); ?>
            </div>

            <!-- Main Content -->
            <div class="col-lg-5 col-md-7 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-people-fill"></i> Teacher List</h5>
                        <!-- <a href="#teacher_delete" class="btn btn-danger btn-sm" data-bs-toggle="modal">
                            <i class="bi bi-trash"></i> Delete Selected
                        </a> -->
                    </div>

                    <div class="card-body">
                        <form action="delete_teacher.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-info text-center">
                                        <tr>
                                            <!-- <th><input type="checkbox" id="selectAll"></th> -->
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Actions</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $teacher_query = mysqli_query($conn, "SELECT * FROM teacher") or die(mysqli_error());
                                        while ($row = mysqli_fetch_array($teacher_query)) {
                                            $id = $row['teacher_id'];
                                            $teacher_stat = $row['teacher_stat'];
                                        ?>
                                            <tr class="text-center">
                                                <!-- <td>
                                                    <input class="form-check-input selectItem" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td> -->
                                                <td>
                                                    <img class="rounded-circle border" src="../<?php echo $row['location']; ?>" height="50" width="50">
                                                </td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td>
                                                    <a href="edit_teacher.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if ($teacher_stat == 'Activated') { ?>
                                                        <a href="de_activate.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-x-circle"></i> Deactivate
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="#" class="btn btn-primary btn-sm">
                                                            <i class="bi bi-check-circle"></i> Activate
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal" data-bs-target="#deleteSingleModal" data-id="<?php echo $id; ?>">
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

    <!-- Individual Delete Confirmation Modal -->
    <div class="modal fade" id="deleteSingleModal" tabindex="-1" aria-labelledby="deleteSingleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteSingleModalLabel"><i class="bi bi-exclamation-triangle"></i> Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Are you sure you want to delete this teacher?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>


    <script>

                    let deleteId;

                    // Set the deleteId when the "Delete" button is clicked
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function () {
                            deleteId = this.getAttribute('data-id');
                        });
                    });

                    // Handle the deletion when the "Confirm Delete" button is clicked
                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        if (deleteId) {
                            fetch('delete_teacher.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: 'id=' + deleteId
                            })
                            .then(response => response.text())
                            .then(data => {
                                console.log("Server Response:", data); // Debug the server response

                                if (data.trim() === 'success') {
                                    window.location.reload(); // Reload the page to reflect changes
                                } else {
                                    alert('Failed to delete teacher. Please try again.');
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                                alert('An error occurred. Please try again.');
                            });
                        }
                    });
    </script>

    <?php include('../footer.php'); ?>
</body>

</html>
