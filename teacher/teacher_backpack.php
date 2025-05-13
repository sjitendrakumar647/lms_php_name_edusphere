<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body class="vh-100 d-flex flex-column bg-light">
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid flex-grow-1 mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-lg-9 mt-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Backpack</h5>
                        <a href="dashboard_teacher.php" class="btn btn-light btn-sm">My Class</a>
                    </div>

                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <?php
                                $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                                $school_year_query_row = mysqli_fetch_array($school_year_query);
                                ?>
                                <li class="breadcrumb-item"><a href="#">My Class</a></li>
                                <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                                <li class="breadcrumb-item active" aria-current="page">Backpack</li>
                            </ol>
                        </nav>

                        <?php
                        $query_backpack = mysqli_query($conn, "SELECT * FROM teacher_backpack WHERE teacher_id = '$session_id' ORDER BY fdatein DESC") or die(mysqli_error());
                        $num_row = mysqli_num_rows($query_backpack);

                        if ($num_row > 0) {
                        ?>
                            <form action="delete_backpack_teacher.php" method="post">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <input type="checkbox" id="checkAll" class="form-check-input"> <label for="checkAll">Select All</label>
                                    </div>
                                    <button class="btn btn-danger btn-sm" name="delete"><i class="bi bi-trash"></i> Delete Selected</button>
                                </div>

                                <script>
                                    document.getElementById("checkAll").addEventListener("click", function() {
                                        let checkboxes = document.querySelectorAll('input[name="selector[]"]');
                                        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                    });
                                </script>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="table-dark">
                                            <tr>
                                                <th></th>
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
                                                    <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>" class="form-check-input"></td>
                                                    <td><?php echo $row['fdatein']; ?></td>
                                                    <td><?php echo $row['fname']; ?></td>
                                                    <td><?php echo $row['fdesc']; ?></td>
                                                    <td><a href="<?php echo $row['floc']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-download"></i></a></td>
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

	<?php include('footer.php'); ?>


</body>
</html>
