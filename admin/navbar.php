<?php 
    $query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($query);
?>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid">
        <!-- Brand Name with Icon -->
        <a class="navbar-brand d-flex align-items-center p-lg-3 p-md-3" href="#" onclick="openNav()">
            <!-- <h5 class="mb-0 display-6 d-md-block d-lg-none fw-bold p-3"><i class="fas fa-book-reader me-2"></i>M-Learning Admin Panel</h5>  -->
            <h5 class="mb-0"><i class="fas fa-book-reader me-2"></i>M-Learning Admin Panel</h5> <!-- Large: display-4 -->

        </a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a class="nav-link" href="../dashboard/dashboard.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>

                <!-- Manage Users -->
                <li class="nav-item">
                    <a class="nav-link" href="../user/admin_user.php">
                        <i class="fas fa-users-cog"></i> Manage Users
                    </a>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user-circle"></i> <?php echo $row['firstname']." ".$row['lastname']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end animate-dropdown">
                        <li>
                            <a class="dropdown-item" href="profile.php">
                                <i class="fa fa-user"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="settings.php">
                                <i class="fa fa-cog"></i> Settings
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="../logout.php">
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu (Visible only on small screens) -->
            <ul class="nav flex-column navbar_sidebarlink d-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-link active" href="../dashboard/dashboard.php" ><i class="fa fa-home"></i> Dashboard</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../subject/subjects.php"><i class="fa fa-book"></i> Subjects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../class/class.php"><i class="fa fa-chalkboard"></i> Classes</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="../user/admin_user.php"><i class="fa fa-user-shield"></i> Admin Users</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../department/department.php"><i class="fa fa-building"></i> Department</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/students.php"><i class="fa fa-user-graduate"></i> Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../teacher/teachers.php"><i class="fa fa-chalkboard-teacher"></i> Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../material/downloadable.php"><i class="fa fa-download"></i> Downloadable Materials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../assignment/assignment.php"><i class="fa fa-upload"></i> Uploaded Assignments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../content/content.php"><i class="fa fa-file-alt"></i> Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user_log/user_log.php"><i class="fa fa-history"></i> User Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../user_log/student_log.php"><i class="fa fa-history"></i> student Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../activity_log/activity_log.php"><i class="fa fa-list"></i> Activity Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../academic_year/academic_year.php"><i class="fa fa-calendar"></i> Academic Year</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../calendar/calendar_of_events.php"><i class="fa fa-calendar-alt"></i> Calendar of Events</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar Styling -->

