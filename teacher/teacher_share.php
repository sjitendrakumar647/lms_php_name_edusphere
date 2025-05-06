<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            <?php include('teacher_sidebar.php'); ?>
            <!-- Main Content -->
            <div class="col-md-9 mt-5">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-folder2-open"></i> Shared Files</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                                <li class="breadcrumb-item"><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shared Files</li>
                            </ol>
                        </nav>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a data-bs-toggle="modal" href="#backup_delete" id="delete" class="btn btn-success btn-sm">
                                    <i class="bi bi-folder-symlink"></i> Move
                                </a>
                                <?php 
								// include('modal_share_delete.php'); 
								?>
                            </div>
                            <div>
                                <label class="me-2">Check All</label>
                                <input type="checkbox" name="selectAll" id="checkAll" />
                            </div>
                        </div>

                        <script>
                            document.getElementById("checkAll").addEventListener("click", function () {
                                const checkboxes = document.querySelectorAll('input[name="selector[]"]');
                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                            });
                        </script>

                        <!-- Shared Files Table -->
                        <form action="delete_shared.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 5%;"><input type="checkbox" disabled></th>
                                            <th scope="col">Date Uploaded</th>
                                            <th scope="col">File Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Shared By</th>
                                            <th scope="col" style="width: 5%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM teacher_shared
                                            LEFT JOIN teacher ON teacher_shared.teacher_id = teacher.teacher_id
                                            WHERE shared_teacher_id = '$session_id' 
                                            ORDER BY fdatein DESC") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['teacher_shared_id'];
                                        ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td>
                                                    <input class="form-check-input" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php echo $row['fdatein']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td>
                                                    <a href="<?php echo $row['floc']; ?>" class="btn btn-primary btn-sm">
                                                        <i class="bi bi-download"></i>
                                                    </a>
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
    <?php include('footer.php'); ?>
</body>
</html>