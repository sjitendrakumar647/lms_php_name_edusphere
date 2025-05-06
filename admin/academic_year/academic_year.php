<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<head>

</head>
<body>
    <?php include('../navbar.php'); ?>
    <div class="container-fluid">
        <div class="row  mt-4">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>
            
            <div class="col-lg-9 col-md-12 d-md-flex justify-content-evenly mt-5">
                <div class="row mt-2">
                    
                        <div class="col-12 p-0">
                            <div class="alert alert-success text-center mt-2" role="alert">
                                <strong><h2>Add Academic Year</h2> </strong>
                            </div>
                        </div>
                    
                    <!-- Add Academic Year Form -->
                    <div class="col-lg-4 col-md-6">
                        <?php include('add_academic_year.php'); ?>
                    </div>
                    
                    <!-- School Year List -->
                    <div class="col-lg-8 col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">School Year List</h5>
                            </div>
                            <div class="card-body">
                                <!-- <form action="delete_academic_year.php" method="post"> -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="example">
                                            <thead class="table-dark">
                                                <tr>
                                                    <!-- <th><input type="checkbox" id="checkAll"></th> -->
                                                    <th class="font">School Year</th>
                                                    <th class="font">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $user_query = mysqli_query($conn, "SELECT * FROM school_year") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($user_query)) {
                                                    $id = $row['school_year_id'];
                                                ?>
                                                    <tr>
                                                        <!-- <td>
                                                            <input class="form-check-input" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                        </td> -->
                                                        <td class="font"><?php echo $row['school_year']; ?></td>
                                                        <td>
                                                            <a href="edit_academic_year.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm font">
                                                                <i class="bi bi-pencil"></i>Edit
                                                            </a>
                                                            <button class="btn btn-danger btn-sm delete-btn font" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                                <i class="bi bi-trash"></i> Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-danger mt-2"><i class="bi bi-trash"></i> Delete Selected</button> -->
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this academic year?
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
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                deleteId = this.getAttribute('data-id');
            });
        });

        document.getElementById('confirmDelete').addEventListener('click', function () {
            if (deleteId) {
                fetch('delete_academic_year.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + deleteId
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === 'success') {
                        window.location.reload();
                    } else {
                        alert('Error deleting record');
                    }
                });
            }
        });
    </script>
    <?php include('../footer.php'); ?>
    <!-- <?php include('../script.php'); ?> -->
</body>
</html>