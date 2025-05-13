<style>
    /* Sidebar Styling */
    #sidebar {
        background-color: #343a40; /* Dark Sidebar */
        color: white;
        min-height: 100vh; /* Full height */
        padding: 20px;
        border-radius: 10px;
    }

    #sidebar .nav-link {
        color: #f8f9fa; 
        font-weight: 500;
        padding: 10px 15px;
        border-radius: 5px;
    }

    #sidebar .nav-link:hover, #sidebar .active {
        background-color: #007bff;
        color: white;
    }

    #avatar {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 3px solid white;
        display: block;
        margin: 10px auto;
        /* background-color:rgb(18, 136, 254); Light background for better visibility  */
    }

    .badge-important {
        background-color: red;
        border-radius: 50%;
        font-size: 12px;
        padding: 5px 8px;
    }

    /* Icon Styling */
    .nav-link i {
        margin-right: 8px;
    }
    
</style>

<div class="col-md-3 d-none d-lg-block mt-4" id="sidebar">
    <!-- Profile Avatar -->
    <div class="text-center">
        <img id="avatar" class="success" src="../../admin/<?php echo $row['location']; ?>">
        <h6 class="mt-2"><?php echo $row['firstname'] . " " . $row['lastname']; ?></h6>
    </div>

    <?php include('../teacher_count.php'); ?>

    <!-- Sidebar Navigation -->
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a href="../dashboard_teacher.php" class="nav-link"><i class="bi bi-people"></i> My Class</a>
        </li>
        <li class="nav-item">
            <a href="../notification_teacher.php" class="nav-link">
                <i class="bi bi-bell"></i> Notification
                <?php if ($not_read > 0) { ?>
                    <span class="badge badge-important"><?php echo $not_read; ?></span>
                <?php } ?>
            </a>
        </li>
        <li class="nav-item"><a href="teacher_message.php" class="nav-link active"><i class="bi bi-envelope"></i> Message</a></li>
        <li class="nav-item"><a href="../teacher_backpack.php" class="nav-link"><i class="bi bi-briefcase"></i> Backpack</a></li>
        <li class="nav-item"><a href="../add_downloadable.php" class="nav-link"><i class="bi bi-cloud-arrow-down"></i> Add Downloadables</a></li>
        <li class="nav-item"><a href="../add_announcement.php" class="nav-link"><i class="bi bi-megaphone"></i> Add Announcement</a></li>
        <li class="nav-item"><a href="../add_assignment.php" class="nav-link"><i class="bi bi-pencil-square"></i> Add Assignment</a></li>
        <li class="nav-item"><a href="../quiz/teacher_quiz.php" class="nav-link"><i class="bi bi-ui-checks-grid"></i> Quiz</a></li>
        <!-- <li class="nav-item"><a href="../teacher_share.php" class="nav-link"><i class="bi bi-folder"></i> Shared Files</a></li> -->
    </ul>

    <?php 
    // include('search_other_class.php'); 
    ?>
</div>
