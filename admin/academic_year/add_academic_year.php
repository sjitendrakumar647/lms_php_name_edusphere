    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12 p-0">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Add Academic Year</h5> <!-- Large: display-4 -->

                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="font" for="academicInput">Enter Academic Year:</label>
                                <input class="form-control font" name="academic_year" id="academicInput" type="text" placeholder="Academic Year (e.g., 2024-2025)" required>
                            </div>
                            <button name="save" class="btn btn-info font">
                                <i class="bi bi-plus-circle"></i> Add Year
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $academic_year = $_POST['academic_year'];
        $query = mysqli_query($conn, "SELECT * FROM academic_year WHERE academic_year = '$academic_year'") or die(mysqli_error($conn));
        $count = mysqli_num_rows($query);

        if ($count > 0) {
            echo "<script>alert('Data Already Exist');</script>";
        } else {
            mysqli_query($conn, "INSERT INTO academic_year (academic_year) VALUES('$academic_year')") or die(mysqli_error($conn));
            mysqli_query($conn, "INSERT INTO activity_log (date, username, action) VALUES(NOW(), '$user_username', 'Added School Year $academic_year')") or die(mysqli_error($conn));
            echo "<script>window.location = 'academic_year.php';</script>";
        }
    }
    ?>