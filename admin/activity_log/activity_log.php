<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">
            <!-- Sidebar (Visible on Large Screens, Collapses on Small) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <div class="col-lg-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Activity Log</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="activityLogTable" class="table table-striped table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = mysqli_query($conn, "SELECT * FROM activity_log") or die(mysqli_error());

                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['date']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['action']; ?></td>
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
    
    <script>
        $(document).ready(function() {
            $('#activityLogTable').DataTable();
        });
    </script>
</body>


</html>