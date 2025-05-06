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
            <li class="active">
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
            <div class="col-md-9 mt-3">
                <!-- Breadcrumb -->
                <?php 
                $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                    WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                $class_row = mysqli_fetch_array($class_query);
                ?>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded">
                        <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                        <li class="breadcrumb-item">School Year: <?php echo $class_row['school_year']; ?></li>
                        <li class="breadcrumb-item active" aria-current="page"><strong>Uploaded Assignments</strong></li>
                    </ol>
                </nav>

                <!-- Assignments Section -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="bi bi-upload"></i> Uploaded Assignments</h5>
                        <?php 
                        $query = mysqli_query($conn, "SELECT * FROM assignment WHERE class_id = '$get_id' ORDER BY fdatein DESC") or die(mysqli_error());
                        $count = mysqli_num_rows($query);
                        ?>
                        <span class="badge bg-light text-dark"><?php echo $count; ?></span>
                    </div>

                    <div class="card-body">
                        <?php if ($count == 0) { ?>
                            <div class="alert alert-success text-center">No Assignments Currently Uploaded</div>
                        <?php } else { ?>
                            <div class="table-responsive">
                                <table class="table table-hover" id="assignmentsTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Date Uploaded</th>
                                            <th>File Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['assignment_id'];
                                            $floc = $row['floc'];
                                        ?>
                                            <tr>
                                                <td><?php echo $row['fdatein']; ?></td>
                                                <td><?php echo $row['fname']; ?></td>
                                                <td><?php echo $row['fdesc']; ?></td>
                                                <td>
                                                    <form method="post" action="submit_assignment.php?id=<?php echo $get_id; ?>&post_id=<?php echo $id; ?>">
                                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                        <?php if ($floc != "") { ?>
                                                            <a href="<?php echo $row['floc']; ?>" class="btn btn-info btn-sm"><i class="bi bi-download"></i> Download</a>
                                                        <?php } ?>
                                                        <button type="submit" name="btn_assign" class="btn btn-success btn-sm"><i class="bi bi-upload"></i> Submit</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            $('#assignmentsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "lengthMenu": [10, 20, 50],
                "language": {
                    "search": "Search Assignments:"
                }
            });
        });
    </script>
</body>
</html>
