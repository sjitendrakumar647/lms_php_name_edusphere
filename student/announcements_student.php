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
            <li>
                <a href="assignment_student.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-book"></i>
                    <span>Assignments</span>
                </a>
            </li>
            <li class="active">
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
                <div class="row">
					<!-- Breadcrumb -->
					<?php 
                	$class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                    	LEFT JOIN class ON class.class_id = teacher_class.class_id
                    	LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                    	WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                	$class_row = mysqli_fetch_array($class_query);
                	?>

					<nav aria-label="breadcrumb">
                    	<ol class="breadcrumb">
                        	<li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                        	<li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                        	<li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                        	<li class="breadcrumb-item active" aria-current="page">Downloadable Materials</li>
                    	</ol>
                	</nav>
				</div>

                <!-- Announcements Section -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-megaphone"></i> Announcements</h5>
                    </div>

                    <div class="card-body">
                        <?php
                        $query_announcement = mysqli_query($conn, "SELECT * FROM teacher_class_announcements
                                                                    WHERE teacher_class_id = '$get_id' 
                                                                    ORDER BY date DESC") or die(mysqli_error());
                        $count = mysqli_num_rows($query_announcement);

                        if ($count > 0) { ?>
                            <div class="table-responsive">
                                <table class="table table-hover" id="announcementsTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Date</th>
                                            <th>Announcement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($query_announcement)) { 
                                            $id = $row['teacher_class_announcements_id'];
                                        ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['content']; ?></td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm remove" id="<?php echo $id; ?>">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-info text-center">
                                <i class="bi bi-info-circle"></i> No Announcements Found.
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- DataTable Initialization -->
    <script>
        $(document).ready(function () {
            $('#announcementsTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 20, 50],
                "language": {
                    "search": "Search Announcements:"
                }
            });

            // Delete announcement
            $('.remove').click(function () {
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "remove_announcements.php",
                    data: { id: id },
                    cache: false,
                    success: function (html) {
                        $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
                        alert("Announcement successfully deleted!");
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>
