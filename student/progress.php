<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid mt-2">
        <div class="row">
        <div class="col-md-3 student-sidebar d-none d-lg-block" id="sidebar">
        <!-- Avatar Section -->
        <div class="sidebar-profile">
            <div class="avatar-container">
                <img id="avatar" src="<?php echo $row['location']; ?>" alt="Student Profile">
                <div class="status-indicator"></div>
            </div>
            <h5>Welcome, Student</h5>
            <p class="student-status">Online</p>
        </div>

        <!-- Sidebar Navigation -->
        <div class="sidebar-nav">
            <ul>
                <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_student.php' ? 'active' : ''; ?>">
                    <a href="dashboard_student.php">
                        <i class="bi bi-chevron-left"></i>
                        <span>Back</span>
                    </a>
                </li>
                <li>
                    <a href="my_classmates.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-people"></i>
                        <span>My Classmates</span>
                    </a>
                </li>
                <li class="active">
                    <a href="progress.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-bar-chart"></i>
                        <span>My Progress</span>
                        <!-- <div class="progress-indicator" data-progress="75"></div> -->
                    </a>
                </li>
                <li>
                    <a href="downloadable_student.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-download"></i>
                        <span>Downloadable Materials</span>
                        <!-- <div class="badge">3</div> -->
                    </a>
                </li>
                <li>
                    <a href="assignment_student.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-book"></i>
                        <span>Assignments</span>
                    </a>
                </li>
                <li>
                    <a href="announcements_student.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-info-circle"></i>
                        <span>Announcements</span>
                    </a>
                </li>
                <li>
                    <a href="class_calendar_student.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-calendar"></i>
                        <span>Class Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="student_quiz_list.php<?php echo '?id=' . $get_id; ?>">
                        <i class="bi bi-list-task"></i>
                        <span>Quiz</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Quick Stats -->
        <div class="sidebar-stats">
            <div class="stat-item">
                <span class="stat-value">85%</span>
                <span class="stat-label">Attendance</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">92%</span>
                <span class="stat-label">Assignments</span>
            </div>
        </div>
    </div>
            <div class="col-md-9">
                <div class="row">
                    <?php 
                        $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                        WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                        $class_row = mysqli_fetch_array($class_query);
                    ?>
                    <nav aria-label="breadcrumb" class="card mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                            <li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Progress</li>
                        </ol>
                    </nav>
                </div>
                <div class="container">
                    <div class="row">
                        <!-- Assignment Grade Progress -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">Assignment Grade Progress</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date Upload</th>
                                                <th>Assignment</th>
                                                <th>Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM student_assignment 
                                                LEFT JOIN student on student.student_id = student_assignment.student_id
                                                RIGHT JOIN assignment on student_assignment.assignment_id = assignment.assignment_id
                                                WHERE student_assignment.student_id = '$session_id'
                                                ORDER BY fdatein DESC") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['fdatein']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><span class="badge bg-success"><?php echo $row['grade']; ?></span></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Practice Quiz Progress -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-info text-white">Practice Quiz Progress</div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Quiz Title</th>
                                                <th>Description</th>
                                                <th>Quiz Time (Minutes)</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM class_quiz 
                                                LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
                                                WHERE teacher_class_id = '$get_id' ORDER BY class_quiz_id DESC") or die(mysqli_error());
                                            while ($row = mysqli_fetch_array($query)) {
                                                $id = $row['class_quiz_id'];
                                                $quiz_time = $row['quiz_time'];
                                                $query1 = mysqli_query($conn, "SELECT * FROM student_class_quiz WHERE class_quiz_id = '$id' AND student_id = '$session_id'") or die(mysqli_error());
                                                $row1 = mysqli_fetch_array($query1);
                                                $grade = $row1['grade'];
                                                if ($grade !== "") {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['quiz_title']; ?></td>
                                                <td><?php echo $row['quiz_description']; ?></td>
                                                <td><?php echo $quiz_time / 60; ?></td>
                                                <td><b><?php echo $grade; ?></b></td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <?php include('footer.php'); ?>

</body>
</html>
