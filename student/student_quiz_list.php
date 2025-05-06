<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<!-- Fetch Student Data -->
<?php
$query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);
?>

<!-- Custom Styles -->
<style>
    .quiz-table td, .quiz-table th {
        vertical-align: middle;
        text-align: center;
        white-space: nowrap; /* Prevent text wrapping */
    }
    .quiz-table th {
        background: #007bff;
        color: white;
    }
    .take-quiz-btn {
        font-weight: bold;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 5px;
    }
    .take-quiz-btn i {
        margin-right: 5px;
    }
    /* Make table scrollable */
    .table-responsive {
        overflow-x: auto;
        width: 100%;
    }
    .score{
        background: linear-gradient(to right,rgb(109, 228, 255),rgb(107, 255, 102));
    }
</style>

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
                    <h5>Welcome, <?php echo $row['firstname']; ?></h5>
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
                        <li class="active">
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

            <!-- Main Content -->
            <div class="col-md-12 col-lg-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-list-task"></i> Practice Quiz</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb Navigation -->
                        <?php 
                            $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                LEFT JOIN class ON class.class_id = teacher_class.class_id
                                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
                            $class_row = mysqli_fetch_array($class_query);
                            $class_id = $class_row['class_id'];
                            $school_year = $class_row['school_year'];
                        ?>
                        <nav aria-label="breadcrumb" class="card mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Practice Quiz</li>
                            </ol>
                        </nav>

                        <!-- Fetch and Display Quizzes -->
                        <?php 
                            $query = mysqli_query($conn, "SELECT * FROM class_quiz 
                                LEFT JOIN quiz ON class_quiz.quiz_id = quiz.quiz_id
                                WHERE teacher_class_id = '$get_id' ORDER BY class_quiz_id DESC") or die(mysqli_error($conn));
                            $count = mysqli_num_rows($query);
                        ?>
                        <div class="alert alert-info"><i class="bi bi-journal-text"></i> Available Quizzes: <strong><?php echo $count; ?></strong></div>

                        <div class="table-responsive">
							<table class="table table-bordered quiz-table">
								<thead>
									<tr>
										<th>Quiz Title</th>
										<th>Description</th>
										<th>Time (Minutes)</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php while ($row = mysqli_fetch_array($query)) {
										$id = $row['class_quiz_id'];
										$quiz_id = $row['quiz_id'];
										$quiz_time = $row['quiz_time'];

										// Check if student has taken the quiz
										$query1 = mysqli_query($conn, "SELECT * FROM student_class_quiz 
											WHERE class_quiz_id = '$id' AND student_id = '$session_id'") or die(mysqli_error($conn));
										$row1 = mysqli_fetch_array($query1);
										$grade = isset($row1['grade']) ? $row1['grade'] : 'N/A';
									?>
									<tr>
										<td><?php echo $row['quiz_title']; ?></td>
										<td><?php echo $row['quiz_description']; ?></td>
										<td><?php echo $row['quiz_time'] / 60; ?></td>
										<td>
											<?php if (mysqli_num_rows($query1) == 0) { ?>
												<a href="take_test.php?id=<?php echo $get_id ?>&class_quiz_id=<?php echo $id; ?>&test=ok&quiz_id=<?php echo $quiz_id; ?>&quiz_time=<?php echo $quiz_time; ?>" class="btn btn-success btn-sm take-quiz-btn">
													<i class="bi bi-play-circle"></i> Take This Quiz
												</a>
											<?php } else { ?>
												<span class="score rounded p-1 text-dark"><i class="bi bi-star-fill text-warning"></i> Score: <?php echo $grade; ?></span>
											<?php } ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
