<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>

<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid">
        <div class="row mt-2">
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
            <li class="active">
                <a href="my_classmates.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-people"></i>
                    <span>My Classmates</span>
                </a>
            </li>
            <li>
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
                <?php $query = mysqli_query($conn,"SELECT * FROM teacher_class_student 
                    LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
                    JOIN class ON class.class_id = teacher_class.class_id 
                    JOIN subject ON subject.subject_id = teacher_class.subject_id
                    WHERE student_id = '$session_id'") or die(mysqli_error());
                $row = mysqli_fetch_array($query);
                ?>
                <nav aria-label="breadcrumb" class="card mb-3">
                    <ol class="breadcrumb bg-light p-2 rounded">
                        <li class="breadcrumb-item"><a href="#"><?php echo $row['class_name']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo $row['subject_code']; ?></a></li>
                        <li class="breadcrumb-item">School Year: <?php echo $row['school_year']; ?></li>
                        <li class="breadcrumb-item active" aria-current="page">My Classmates</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header bg-primary text-white">My Classmates</div>
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student 
                                LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                                INNER JOIN class ON class.class_id = student.class_id WHERE teacher_class_id = '$get_id' ORDER BY lastname") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($my_student)) {
                                $id = $row['teacher_class_student_id'];
                            ?>
                                <div class="col-md-3 text-center mb-4">
                                    <a href="#" class="text-decoration-none">
                                        <img src="<?php echo $row['location']; ?>" class="img-fluid rounded-circle" width="100" height="100">
                                        <p class="fw-bold mt-2 mb-0"> <?php echo $row['lastname']; ?></p>
                                        <p class="text-muted"> <?php echo $row['firstname']; ?></p>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <?php
	//  include('script.php'); 
	 ?>
</body>
</html>
