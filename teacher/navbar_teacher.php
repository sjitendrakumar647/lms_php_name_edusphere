<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow py-4">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand fw-bold fs-4" href="#">Edusphere</a>

        <!-- Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php 
                    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error());
                    $row = mysqli_fetch_array($query);
                ?>
                
                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle me-2"></i>
                        <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="profile_teacher.php"><i class="bi bi-person"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="change_password_teacher.php"><i class="bi bi-key"></i> Change Password</a></li>
                        <li><a class="dropdown-item" href="#myModal" data-bs-toggle="modal"><i class="bi bi-image"></i> Change Avatar</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav flex-column mt-3 d-lg-none">
    <li class="nav-item"><a href="dashboard_teacher.php" class="nav-link active text-white bg-primary"><i class="bi bi-people"></i> My Class</a></li>
    <li class="nav-item"><a href="notification_teacher.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-bell"></i> Notification</a></li>
    <li class="nav-item"><a href="teacher_message.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-envelope"></i> Message</a></li>
    <li class="nav-item"><a href="teacher_backack.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-briefcase"></i> Backpack</a></li>
    <li class="nav-item"><a href="add_downloadable.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-cloud-arrow-down"></i> Add Downloadables</a></li>
    <li class="nav-item"><a href="add_announcement.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-megaphone"></i> Add Announcement</a></li>
    <li class="nav-item"><a href="add_assignment.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-pencil-square"></i> Add Assignment</a></li>
    <li class="nav-item"><a href="quiz/teacher_quiz.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-ui-checks-grid"></i> Quiz</a></li>
    <li class="nav-item"><a href="teacher_share.php" class="nav-link text-white bg-dark bg-opacity-75"><i class="bi bi-folder"></i> Shared Files</a></li>
</ul>

        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="myModalLabel"><i class="bi bi-person-circle"></i> Change Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="post" action="teacher_avatar.php" enctype="multipart/form-data">
                    <div class="mb-3 text-center">
                        <label for="fileInput" class="form-label">Upload a new avatar</label>
                        <input name="image" class="form-control" id="fileInput" type="file" required>
                    </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Close
                </button>
                <button type="submit" class="btn btn-info" name="change">
                    <i class="bi bi-save"></i> Save
                </button>
            </div>
                </form>
        </div>
    </div>
</div>