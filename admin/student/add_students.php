<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-person-plus-fill"></i> Add Student</h5>
    </div>

    <div class="card-body">
        <form id="add_student" action="#" method="post">
            <!-- Course Selection -->
             <div class="mb-3">
                <label class="form-label"><i class="bi bi-book"></i> Select Department</label>
                <select name="department_id" class="form-select" required>
                    <option value="">-- Select Department --</option>
                    <?php
                    $dept_query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name");
                    while ($dept_row = mysqli_fetch_array($dept_query)) {
                        echo '<option value="' . htmlspecialchars($dept_row['department_id']) . '">' . htmlspecialchars($dept_row['department_name']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-book"></i> Select Class</label>
                <select name="class_id" class="form-select" required>
                    <option value="">-- Select Class --</option>
                    <?php
                    include('../dbcon.php');
                    $cys_query = mysqli_query($conn, "SELECT * FROM class ORDER BY class_name");
                    while ($cys_row = mysqli_fetch_array($cys_query)) {
                        echo '<option value="' . htmlspecialchars($cys_row['class_id']) . '">' . htmlspecialchars($cys_row['class_name']) . '</option>';
                    }
                    ?>
                </select>
            </div>
            

            <!-- ID Number -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-credit-card"></i> ID Number</label>
                <input name="un" type="text" class="form-control" minlength="8" placeholder="Enter ID Number" required>
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> First Name</label>
                <input name="fn" type="text" class="form-control" placeholder="Enter First Name" required>
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person"></i> Last Name</label>
                <input name="ln" type="text" class="form-control" placeholder="Enter Last Name" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button name="save" class="btn btn-success"><i class="bi bi-check-circle"></i> Add Student</button>
            </div>
        </form>
    </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../dbcon.php');

    // Sanitize user input
    $un = $_POST['un']; // ID Number
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $class_id = $_POST['class_id'];
    $department_id = $_POST['department_id'];

    // Check if ID number already exists
    $check_query = mysqli_query($conn, "SELECT * FROM student WHERE username = '$un'");
    if (mysqli_num_rows($check_query) > 0) {
        echo '<div class="alert alert-danger">Error: ID Number already exists! Please use a different ID.</div>';
    } else {
        // Insert student into the database
        $insert_query = "INSERT INTO student (username, firstname, lastname, location, class_id, department_id, status)
                         VALUES ('$un', '$fn', '$ln', 'uploads/NO-IMAGE-AVAILABLE.jpg', '$class_id', '$department_id', 'Unregistered')";
        if (mysqli_query($conn, $insert_query)) {
            echo '<div class="alert alert-success">Student Successfully Added!</div>';
            echo '<script>setTimeout(() => { window.location.href = "students.php"; }, 2000);</script>';
        } else {
            echo '<div class="alert alert-danger">Error: ' . htmlspecialchars(mysqli_error($conn)) . '</div>';
        }
    }
}
?>
