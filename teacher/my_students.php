<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-lg-9 mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-primary">My Students</h4>
                    <div>
                        <a href="add_student.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info btn-sm">
                            <i class="bi bi-plus-circle"></i> Add Student
                        </a>
                        <a onclick="window.open('print_student.php<?php echo '?id=' . $get_id; ?>')" class="btn btn-success btn-sm">
                            <i class="bi bi-list"></i> Student List
                        </a>
                    </div>
                </div>

                <?php
                $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                    WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
                $class_row = mysqli_fetch_array($class_query);
                ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><?php echo $class_row['class_name']; ?></li>
                        <li class="breadcrumb-item"><?php echo $class_row['subject_code']; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="my_students.php<?php echo '?id=' . $get_id; ?>">My Students</a></li>
                    </ol>
                </nav>

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Students in Class</h6>
                        <?php
                        $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student
                            LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                            INNER JOIN class ON class.class_id = student.class_id 
                            WHERE teacher_class_id = '$get_id' ORDER BY lastname") or die(mysqli_error($conn));
                        $count_my_student = mysqli_num_rows($my_student);
                        ?>
                        <span class="badge bg-info">Number of Students: <?php echo $count_my_student; ?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="studentTable" class="table table-bordered table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = mysqli_fetch_array($my_student)) {
                                        $id = $row['teacher_class_student_id'];
                                    ?>
                                        <tr id="del<?php echo $id; ?>">
                                            <td><?php echo $counter++; ?></td>
                                            <td>
                                                <img src="uploads/thumbnails.jpg" class="img-thumbnail" alt="Student Image" style="height: 70px; width: 70px; object-fit: cover;">
                                            </td>
                                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                            <td>
                                                <a href="#removeModal<?php echo $id; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal">
                                                    <i class="bi bi-trash"></i> Remove
                                                </a>
                                            </td>
                                        </tr>

                                        <!-- Remove Student Modal -->
                                        <div class="modal fade" id="removeModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="removeModalLabel<?php echo $id; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="removeModalLabel<?php echo $id; ?>">Remove Student</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to remove <strong><?php echo htmlspecialchars($row['lastname'] . ', ' . $row['firstname']); ?></strong> from this class?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger remove" id="<?php echo $id; ?>">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#studentTable').DataTable();

            // Handle Remove Button Click
            document.querySelectorAll('.remove').forEach(function (button) {
                button.addEventListener('click', function () {
                    const id = this.id;

                    fetch("remove_student.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `id=${id}`
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log("Server Response:", data);

                            if (data.trim() === "success") {
                                document.getElementById(`removeModal${id}`).querySelector('.btn-close').click();
                                document.getElementById(`del${id}`).remove();
                                alert("Student successfully removed!");
                            } else {
                                alert("Failed to remove student. Please try again.");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            alert("An error occurred. Please try again.");
                        });
                });
            });
        });
    </script>
</body>
</html>