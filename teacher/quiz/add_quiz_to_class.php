<?php include('../header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-md-9 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-3 rounded alert alert-info">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                        <li class="breadcrumb-item active"><b>Assign Quiz</b></li>
                    </ol>
                </nav>

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Assign Quiz</h5>
                        <a href="teacher_quiz.php" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="quizSelect" class="form-label">Select Quiz</label>
                                <select name="quiz_id" id="quizSelect" class="form-select" required>
                                    <option value="" disabled selected>Select a quiz</option>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM quiz WHERE teacher_id = '$session_id'") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) { ?>
                                        <option value="<?php echo $row['quiz_id']; ?>"><?php echo $row['quiz_title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="testTime" class="form-label">Test Time (in minutes)</label>
                                <input type="number" class="form-control" name="time" id="testTime" placeholder="Enter time in minutes" required>
                            </div>

                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Class</th>
                                        <th>Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM teacher_class
                                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                        WHERE teacher_id = '$session_id' AND school_year = '$school_year'") or die(mysqli_error());

                                    while ($row = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selector[]" value="<?php echo $row['teacher_class_id']; ?>">
                                            </td>
                                            <td><?php echo $row['class_name']; ?></td>
                                            <td><?php echo $row['subject_code']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <button type="submit" name="save" class="btn btn-success">
                                <i class="bi bi-save"></i> Assign Quiz
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['save'])) {
                            $quiz_id = $_POST['quiz_id'];
                            $time = $_POST['time'] * 60;
                            $selected_classes = $_POST['selector'] ?? [];

                            if (!empty($selected_classes)) {
                                $name_notification = 'New Practice Quiz Added';

                                foreach ($selected_classes as $class_id) {
                                    mysqli_query($conn, "INSERT INTO class_quiz (teacher_class_id, quiz_time, quiz_id) 
                                        VALUES ('$class_id', '$time', '$quiz_id')") or die(mysqli_error());

                                    mysqli_query($conn, "INSERT INTO notification (teacher_class_id, notification, date_of_notification, link) 
                                        VALUES ('$class_id', '$name_notification', NOW(), 'student_quiz_list.php')") or die(mysqli_error());
                                }
                                echo "<script>alert('Quiz assigned successfully!'); window.location = 'teacher_quiz.php';</script>";
                            } else {
                                echo "<script>alert('Please select at least one class.');</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>

</body>
</html>
