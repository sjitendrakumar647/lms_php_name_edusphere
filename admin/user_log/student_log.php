<?php include('../header.php'); ?>
<?php include('../session.php'); ?>


<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid">
	
        <div class="row mt-4">
            
            <!-- Sidebar (Visible on Large Screens, Collapses on Small) -->
            <div class="col-lg-3 col-md-4 d-none d-md-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>
            <div class="col-lg-9 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h5 class="mb-0">Users Log List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-container">
                            <table id="userLogTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date Login</th>
                                        <th>Date Logout</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user_query = mysqli_query($conn, "SELECT * FROM student_log ORDER BY student_log_id") or die(mysqli_error());

                                        while ($row = mysqli_fetch_array($user_query)) {
                                            $id = $row['student_log_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['login_date']; ?></td>
                                        <td><?php echo $row['logout_date']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
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

    <?php include('../footer.php'); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#userLogTable').DataTable();
        });
    </script>
</body>
</html>
