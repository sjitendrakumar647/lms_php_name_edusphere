<div class="row ">
    
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-center"><i class="bi bi-building"></i> Add Department</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <!-- Department Name -->
                    <div class="mb-3">
                        <label for="departmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="departmentName" name="d" placeholder="Enter department name" required>
                    </div>

                    <!-- Person In-Charge -->
                    <div class="mb-3">
                        <label for="personInCharge" class="form-label">Person In-Charge</label>
                        <input type="text" class="form-control" id="personInCharge" name="pi" placeholder="Enter name" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" name="save" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Department
                        </button>
                    </div>
                </form>
            </div>
        </div>
    
</div>

<?php
if (isset($_POST['save'])) {
    $pi = mysqli_real_escape_string($conn, trim($_POST['pi']));
    $d = mysqli_real_escape_string($conn, trim($_POST['d']));

    // Check if department already exists
    $query = mysqli_query($conn, "SELECT * FROM department WHERE department_name = '$d' AND dean = '$pi'") or die(mysqli_error());
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('⚠️ Department already exists!');
        </script>
    <?php
    } else {
        mysqli_query($conn, "INSERT INTO department (department_name, dean) VALUES ('$d', '$pi')") or die(mysqli_error());
    ?>
        <script>
            alert('✅ Department added successfully!');
            window.location = "department.php";
        </script>
    <?php
    }
}
?>
