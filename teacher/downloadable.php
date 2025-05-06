<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <main class="col-lg-9">
                <?php
                $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                    WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
                $class_row = mysqli_fetch_array($class_query);
                ?>

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><?php echo $class_row['class_name']; ?></li>
                        <li class="breadcrumb-item"><?php echo $class_row['subject_code']; ?></li>
                        <li class="breadcrumb-item">School Year: <?php echo $class_row['school_year']; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><strong>Downloadable Materials</strong></li>
                    </ol>
                </nav>

                <!-- Downloadable Materials Block -->
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-light">
                        <h5 class="mb-0">Downloadable Materials</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll">
                            <label class="form-check-label" for="checkAll">
                                Check All
                            </label>
                        </div>
                    </div>

                    <div class="card-body">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM files WHERE class_id = '$get_id' ORDER BY fdatein DESC") or die(mysqli_error($conn));
                        if (mysqli_num_rows($query) == 0) {
                        ?>
                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle-fill"></i> No downloadable materials uploaded yet.
                            </div>
                        <?php
                        } else {
                        ?>
                            <form action="copy_file.php" method="post">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-files"></i> Copy Selected
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered align-middle">
                                        <!-- Breadcrumb -->
										<ul class="breadcrumb">
											<?php
											$school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
											$school_year_row = mysqli_fetch_array($school_year_query);
											?>
											<li><a href="#"><b>My Class</b></a> <span class="divider">/</span></li>
											<li><a href="#">School Year: <?php echo $school_year_row['school_year']; ?></a> <span class="divider">/</span></li>
											<li><a href="#"><b>Quiz</b></a></li>
										</ul>
										<!-- End Breadcrumb -->
                                        <thead class="table-light">
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>File Name</th>
                                                <th>Description</th>
                                                <th>Uploaded By</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['file_id'];
                                            ?>
                                                <tr id="del<?php echo $id; ?>">
                                                    <td><?php echo $row['fdatein']; ?></td>
                                                    <td><?php echo $row['fname']; ?></td>
                                                    <td><?php echo $row['fdesc']; ?></td>
                                                    <td><?php echo $row['uploaded_by']; ?></td>
                                                    <td>
                                                        <a href="<?php echo $row['floc']; ?>" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download">
                                                            <i class="bi bi-download"></i>
                                                        </a>
                                                        <a href="#deleteModal<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm" title="Remove">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                        <!-- Delete File Modal -->
														<div class="modal fade" id="deleteModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $id; ?>" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content shadow-lg">
																	
																	<div class="modal-header bg-danger text-white">
																		<h5 class="modal-title" id="deleteModalLabel<?php echo $id; ?>">
																			<i class="bi bi-exclamation-triangle-fill"></i> Delete File
																		</h5>
																		<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	
																	<div class="modal-body text-center">
																		<div class="alert alert-danger" role="alert">
																			<strong>Are you sure?</strong><br> This action cannot be undone!
																		</div>
																	</div>
																	
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
																			<i class="bi bi-x-circle"></i> Cancel
																		</button>
																		<button id="<?php echo $id; ?>" type="button" class="btn btn-danger remove" data-bs-dismiss="modal">
																			<i class="bi bi-trash-fill"></i> Yes, Delete
																		</button>
																	</div>

																</div>
															</div>
														</div>

                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>

            </main>

            <?php include('downloadable_sidebar.php'); ?>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Custom Scripts -->
    <script>
        // Select/Deselect All Checkboxes
        document.getElementById('checkAll').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="selector[]"]');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Ajax delete
        $(document).ready(function() {
            $('.remove').click(function() {
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "delete_file.php",
                    data: ({ id: id }),
                    cache: false,
                    success: function(html) {
                        $("#del" + id).fadeOut('slow', function() { $(this).remove(); });
                        $('#' + id).modal('hide');
                        $.jGrowl("Your File was Successfully Deleted", { header: 'File Deleted' });
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>
