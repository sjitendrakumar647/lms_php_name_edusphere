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
                    <h4 class="text-primary">Add Students</h4>
                    <a href="my_students.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info btn-sm">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>

                <!-- Breadcrumb -->
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
                        <li class="breadcrumb-item"><a href="my_students.php<?php echo '?id=' . $get_id; ?>">My Students</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                    </ol>
                </nav>

                <!-- Add Students Table -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Available Students</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <button name="submit" type="submit" class="btn btn-success mb-3">
                                <i class="bi bi-check-circle"></i> Add Selected Students
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Course Year and Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 0;
                                        $query = mysqli_query($conn, "SELECT * FROM student 
                                            LEFT JOIN class ON class.class_id = student.class_id") or die(mysqli_error($conn));
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['student_id'];
                                            $a++;
                                        ?>
                                            <tr>
                                                <input type="hidden" name="test" value="<?php echo $a; ?>">
                                                <td width="70">
                                                    <img class="img-thumbnail" src="../student/<?php echo $row['location']; ?>" height="50" width="40" alt="Student Photo">
                                                </td>
                                                <td><?php echo htmlspecialchars($row['firstname'] . " " . $row['lastname']); ?></td>
                                                <td><?php echo htmlspecialchars($row['class_name']); ?></td>
                                                <td width="150">
                                                    <select name="add_student<?php echo $a; ?>" class="form-select">
                                                        <option value="">Select</option>
                                                        <option value="Add">Add</option>
                                                    </select>
                                                    <input type="hidden" name="student_id<?php echo $a; ?>" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="class_id<?php echo $a; ?>" value="<?php echo $get_id; ?>">
                                                    <input type="hidden" name="teacher_id<?php echo $a; ?>" value="<?php echo $session_id; ?>">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>

    <?php
    if (isset($_POST['submit'])) {
        $test = $_POST['test'];
        for ($b = 1; $b <= $test; $b++) {
            $test1 = "student_id" . $b;
            $test2 = "class_id" . $b;
            $test3 = "teacher_id" . $b;
            $test4 = "add_student" . $b;

            $id = $_POST[$test1];
            $class_id = $_POST[$test2];
            $teacher_id = $_POST[$test3];
            $Add = $_POST[$test4];

            $query = mysqli_query($conn, "SELECT * FROM teacher_class_student WHERE student_id = '$id' AND teacher_class_id = '$class_id'") or die(mysqli_error($conn));
            $count = mysqli_num_rows($query);

            if ($count > 0) {
                echo "<script>alert('Student Added successfully');</script>";
                echo "<script>window.location = 'my_students.php?id=$get_id';</script>";
            } else if ($Add == 'Add') {
                mysqli_query($conn, "INSERT INTO teacher_class_student (student_id, teacher_class_id, teacher_id) VALUES ('$id', '$class_id', '$teacher_id')") or die(mysqli_error($conn));
            }
        }
        echo "<script>window.location = 'my_students.php?id=$get_id';</script>";
    }
    ?>
</body>
</html>