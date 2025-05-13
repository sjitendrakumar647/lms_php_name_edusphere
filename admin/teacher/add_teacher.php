<div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-plus"></i> Add Teacher</h5>
    </div>

    <div class="card-body">
        <!-- Add Teacher Form -->
        <form method="post" enctype="multipart/form-data">
            <!-- <div class="mb-3">
                <label class="form-label">Upload Photo:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div> -->

            <div class="mb-3">
                <label class="form-label">Department:</label>
                <select name="department" class="form-select" required>
                    <option value="">Select Department</option>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?php echo $row['department_id']; ?>">
                            <?php echo $row['department_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">First Name:</label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name:</label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>

            <div class="d-grid">
                <button name="save" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Add Teacher
                </button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $department_id = $_POST['department'];

    // Check if teacher already exists
    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE firstname = '$firstname' AND lastname = '$lastname'") or die(mysqli_error());
    $count = mysqli_num_rows($query);

    if ($count > 0) { ?>
        <script>
            alert('Teacher Already Exists!');
            window.location = "add_teacher.php";
        </script>
    <?php
    } else {
        // Upload Image
        $imagePath = "uploads/default.jpg"; // Default Image
        if (!empty($_FILES['image']['name'])) {
            $targetDir = "uploads/";
            $imagePath = $targetDir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
        }

        // Insert Teacher into Database with default status 'Unregistered'
        mysqli_query($conn, "INSERT INTO teacher (firstname, lastname, username, location, department_id, teacher_status) 
                             VALUES ('$firstname', '$lastname', '$username', '$imagePath', '$department_id', 'Unregistered')") or die(mysqli_error());
    ?>
        <script>
            alert('Teacher Added Successfully!');
            window.location = "teachers.php";
        </script>
<?php
    }
}
?>
