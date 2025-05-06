<div class="row mb-3">
    <div class="col-12">
        <a href="teachers.php" class="btn btn-info btn-sm">
            <i class="bi bi-plus-circle"></i> Add Teacher
        </a>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Teacher</h5>
    </div>
    <div class="card-body">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$get_id'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        ?>
        <form method="post">
            <!-- Department Selection -->
            <div class="mb-3">
                <label for="department" class="form-label"><i class="bi bi-building"></i> Department</label>
                <select name="department" id="department" class="form-select" required>
                    <?php
                    $query_teacher = mysqli_query($conn, "SELECT * FROM teacher JOIN department ON teacher.department_id = department.department_id WHERE teacher.teacher_id = '$get_id'") or die(mysqli_error($conn));
                    $row_teacher = mysqli_fetch_array($query_teacher);
                    ?>
                    <option value="<?php echo $row_teacher['department_id']; ?>">
                        <?php echo $row_teacher['department_name']; ?>
                    </option>
                    <?php
                    $department = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name");
                    while ($department_row = mysqli_fetch_array($department)) {
                    ?>
                        <option value="<?php echo $department_row['department_id']; ?>"><?php echo $department_row['department_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- First Name -->
            <div class="mb-3">
                <label for="firstname" class="form-label"><i class="bi bi-person"></i> First Name</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']; ?>" placeholder="Enter First Name" required>
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="lastname" class="form-label"><i class="bi bi-person"></i> Last Name</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['lastname']; ?>" placeholder="Enter Last Name" required>
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" name="update" class="btn btn-success">
                    <i class="bi bi-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $department_id = $_POST['department'];

    // Check if the teacher already exists
    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE firstname = '$firstname' AND lastname = '$lastname'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    if ($count > 1) {
        echo "<script>alert('Data Already Exists');</script>";
    } else {
        mysqli_query($conn, "UPDATE teacher SET firstname = '$firstname', lastname = '$lastname', department_id = '$department_id' WHERE teacher_id = '$get_id'") or die(mysqli_error($conn));
        echo "<script>window.location = 'teachers.php';</script>";
    }
}
?>

