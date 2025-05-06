<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid mt-2">
        <div class="row">
            <!-- Sidebar -->
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
            <li class="active">
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

            <!-- Main Content -->
            <div class="col-md-6">
                <!-- Breadcrumb -->
                <?php 
                    $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                        WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                    $class_row = mysqli_fetch_array($class_query);
                ?>

                <nav aria-label="breadcrumb" class="card mb-3">
                    <ol class="breadcrumb bg-light p-2 rounded">
                        <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                        <li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Downloadable Materials</li>
                    </ol>
                </nav>

                <!-- Downloadable Materials -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-download"></i> Downloadable Materials</h5>
                    </div>
                    <div class="card-body">
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM files WHERE class_id = '$get_id' ORDER BY fdatein DESC") or die(mysqli_error());
                            $count = mysqli_num_rows($query);
                        ?>
                        <div class="mb-2">
                            <span class="badge bg-info"><?php echo $count; ?></span>
                        </div>

                        <?php if ($count == 0) { ?>
                            <div class="alert alert-info text-center">
                                <i class="bi bi-info-circle"></i> No downloadable material currently uploaded.
                            </div>
                        <?php } else { ?>
                            <form action="copy_file_student.php" method="post">
                                <button type="submit" name="copy_to_backpack" class="btn btn-info mb-3">
                                    <i class="bi bi-copy"></i> Copy Selected to Backpack
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="filesTable">
                                        <thead class="table-dark">
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>Date</th>
                                                <th>File Name</th>
                                                <th>Description</th>
                                                <th>Uploaded by</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                                <tr>
                                                    <td><input type="checkbox" name="selector[]" value="<?php echo $row['file_id']; ?>"></td>
                                                    <td><?php echo $row['fdatein']; ?></td>
                                                    <td><?php echo $row['fname']; ?></td>
                                                    <td><?php echo $row['fdesc']; ?></td>
                                                    <td><?php echo $row['uploaded_by']; ?></td>
                                                    <td>
                                                        <a href="../teacher/<?php echo $row['floc']; ?>" class="btn btn-success btn-sm">
                                                            <i class="bi bi-download"></i> Download
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-3">
                <?php include('downloadable_sidebar_student.php'); ?>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- DataTable & Checkbox Script -->
    <script>
        $(document).ready(function () {
            $('#filesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [10, 20, 50],
                "language": {
                    "search": "Search Files:"
                }
            });

            // Select All Checkbox
            $("#checkAll").click(function () {
                $("input[name='selector[]']").prop("checked", this.checked);
            });
        });
    </script>
</body>
</html>
