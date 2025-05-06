<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
    <?php include('../navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <!-- Edit Student Form -->
            <div class="col-lg-8 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> Edit Student</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM student 
                            LEFT JOIN class ON class.class_id = student.class_id 
                            WHERE student_id = '$get_id'") or die(mysqli_error($conn));
                        $row = mysqli_fetch_array($query);
                        ?>
                        <form method="post">
                            <!-- Class Selection -->
                            <div class="mb-3">
                                <label for="class" class="form-label"><i class="bi bi-building"></i> Class</label>
                                <select name="cys" id="class" class="form-select" required>
                                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                                    <?php
                                    $cys_query = mysqli_query($conn, "SELECT * FROM class ORDER BY class_name");
                                    while ($cys_row = mysqli_fetch_array($cys_query)) {
                                    ?>
                                        <option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- ID Number -->
                            <div class="mb-3">
                                <label for="idNumber" class="form-label"><i class="bi bi-credit-card"></i> ID Number</label>
                                <input name="un" value="<?php echo $row['username']; ?>" id="idNumber" type="text" class="form-control" placeholder="Enter ID Number" required>
                            </div>

                            <!-- First Name -->
                            <div class="mb-3">
                                <label for="firstName" class="form-label"><i class="bi bi-person"></i> First Name</label>
                                <input name="fn" value="<?php echo $row['firstname']; ?>" id="firstName" type="text" class="form-control" placeholder="Enter First Name" required>
                            </div>

                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="lastName" class="form-label"><i class="bi bi-person"></i> Last Name</label>
                                <input name="ln" value="<?php echo $row['lastname']; ?>" id="lastName" type="text" class="form-control" placeholder="Enter Last Name" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
							<button name="refresh" onclick="window.reload()" class="btn btn-danger">
                                    <i class="bi bi-arrow-clockwise"></i> refresh
                                </button>
                                <button name="update" class="btn btn-success">
                                    <i class="bi bi-save"></i> Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                if (isset($_POST['update'])) {
                    $un = $_POST['un'];
                    $fn = $_POST['fn'];
                    $ln = $_POST['ln'];
                    $cys = $_POST['cys'];

                    mysqli_query($conn, "UPDATE student SET username = '$un', firstname = '$fn', lastname = '$ln', class_id = '$cys' WHERE student_id = '$get_id'") or die(mysqli_error($conn));
                    echo "<script>window.location = 'students.php';</script>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>