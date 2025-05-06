<nav class="navbar navbar-expand-lg navbar-dark fixed-top edu-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span class="brand-text">EduSphere</span>
            <span class="brand-highlight">LMS</span>
        </a>
        <button class="navbar-toggler pulse-animation" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-link navbar-link-animation" href="dashboard_student.php">
                        <i class="bi bi-house-door"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-link navbar-link-animation" href="courses.php">
                        <i class="bi bi-book"></i> Courses
                    </a>
                </li>
                <?php 
                $query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error());
                $row = mysqli_fetch_array($query);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-link dropdown-toggle profile-link" href="#" id="studentDropdown" role="button" data-bs-toggle="dropdown">
                        <div class="avatar-container1">
                            <?php 
                            $avatar = $row['location'] ? $row['location'] : 'default_avatar.png';
                            ?>
                            <img src="<?php echo $avatar; ?>" alt="Profile" class="avatar-img">
                        </div>
                        <span class="profile-name"><?php echo $row['firstname'] . " " . $row['lastname']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-animation">
                        <li class="dropdown-user-details">
                            <div class="user-info">
                                <img src="<?php echo $avatar; ?>" alt="Profile" class="dropdown-avatar">
                                <div>
                                    <h6><?php echo $row['firstname'] . " " . $row['lastname']; ?></h6>
                                </div>
                            </div>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item menu-item-animation" href="profile.php">
                                <i class="bi bi-person me-2"></i> My Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item menu-item-animation" href="change_password_student.php">
                                <i class="bi bi-key me-2"></i> Change Password
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item menu-item-animation" href="#" data-bs-toggle="modal" data-bs-target="#myModal_student">
                                <i class="bi bi-camera me-2"></i> Change Avatar
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item menu-item-animation text-danger" href="logout.php">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal for Changing Avatar -->
<div class="modal fade" id="myModal_student" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="avatar-preview-container mb-4">
                    <div class="avatar-preview">
                        <img src="<?php echo $avatar; ?>" id="imagePreview" alt="Avatar Preview">
                    </div>
                </div>
                <form action="student_avatar.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Upload New Avatar</label>
                        <div class="custom-file-upload">
                            <input type="file" class="form-control" name="image" id="avatar" required onchange="previewImage(this)">
                            <label for="avatar" class="file-upload-label">
                                <i class="bi bi-cloud-arrow-up"></i> Choose File
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 upload-btn">
                        <i class="bi bi-check-circle me-2"></i> Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>