<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<?php include('../navbar.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM school_year WHERE school_year_id = '$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
    $academic_year = $row['school_year'];
} else {
    echo "<script>window.location = 'academic_year.php';</script>";
}

if (isset($_POST['update'])) {
    $new_academic_year = $_POST['academic_year'];
    $check_query = mysqli_query($conn, "SELECT * FROM school_year WHERE school_year = '$new_academic_year' AND school_year_id != '$id'") or die(mysqli_error($conn));
    
    if (mysqli_num_rows($check_query) > 0) {
        echo "<script>alert('This academic year already exists.');</script>";
    } else {
        mysqli_query($conn, "UPDATE school_year SET school_year = '$new_academic_year' WHERE school_year_id = '$id'") or die(mysqli_error($conn));
        mysqli_query($conn, "INSERT INTO activity_log (date, username, action) VALUES (NOW(), '$user_username', 'Updated School Year $new_academic_year')") or die(mysqli_error($conn));
        echo "<script>window.location = 'academic_year.php';</script>";
    }
}
?>

<body class="h-screen w-100 ">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10  mt-3">
                <div class="card shadow-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Academic Year</h5>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="academic_year" class="form-label">Academic Year</label>
                                <input class="form-control" name="academic_year" id="academic_year" type="text" value="<?php echo htmlspecialchars($academic_year); ?>" required>
                            </div>
                            <button name="update" class="btn btn-success">
                                <i class="bi bi-pencil"></i> Update Year
                            </button>
                            <a href="academic_year.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>
</body>
</html>
