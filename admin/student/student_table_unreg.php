<?php include('../dbcon.php'); ?>

<div class="card shadow-sm">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-people-fill"></i> Unregistered Student List</h5>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="students.php" class="btn btn-secondary btn-sm">All</a>
                <a href="unreg_students.php" class="btn btn-primary btn-sm">Unregistered</a>
                <a href="reg_students.php" class="btn btn-secondary btn-sm">Registered</a>
            </div>
            <input type="text" id="searchBox" class="form-control form-control-sm w-25" placeholder="Search Student...">
        </div>

        <form action="delete_student.php" method="post">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center table-light table-striped" id="example">
                    <thead class="table-info">
                        <tr>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Course & Section</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM student 
                            LEFT JOIN class ON student.class_id = class.class_id
                            WHERE status = 'Unregistered'
                            ORDER BY student.student_id DESC") or die(mysqli_error($conn));

                        // Check if there are any unregistered students
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['student_id'];
                        ?>
                                <tr>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['class_name']; ?></td>
                                    <td>
                                        <a href="edit_student.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm deleteStudent delete-btn" data-bs-toggle="modal" data-bs-target="#deleteSingleModal" data-id="<?php echo $id; ?>">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="4" class="text-center alert alert-info bg-info">No Unregistered Students Found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteSingleModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Are you sure you want to delete this student?
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
            fetch('delete_student.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + deleteId
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === 'success') {
                    window.location.reload();
                } else {
                    alert('Failed to delete student. Please try again.');
                }
            });
        }
    });
</script>
