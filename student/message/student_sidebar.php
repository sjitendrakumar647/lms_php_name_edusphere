
<?php
        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
        $school_year_query_row = mysqli_fetch_array($school_year_query);
        $school_year = $school_year_query_row['school_year'];

        // Query to count unread notifications for the student
        $query_unread_notifications = mysqli_query($conn, "SELECT * FROM notification 
        LEFT JOIN teacher_class ON teacher_class.teacher_class_id = notification.teacher_class_id
        LEFT JOIN teacher_class_student ON teacher_class_student.teacher_class_id = teacher_class.teacher_class_id
        WHERE teacher_class_student.student_id = '$session_id' AND school_year = '$school_year' 
        AND notification.notification_id NOT IN (
            SELECT notification_id FROM notification_read WHERE student_id = '$session_id'
        )") or die(mysqli_error());

        $unread_notifications = mysqli_num_rows($query_unread_notifications);

        // Query to count unread messages
        $message_query = mysqli_query($conn, "SELECT * FROM message WHERE reciever_id = '$session_id' AND message_status != 'read'") or die(mysqli_error());
        $count_message = mysqli_num_rows($message_query);
    ?>
<div class="sidebar bg-white p-4 rounded shadow-sm col-md-11">
    <!-- Student Avatar -->
    <div class="text-center mb-4">
        <img id="avatar" class="img-thumbnail rounded-circle border border-primary" src="../<?php echo $row['location']; ?>" 
            alt="Student Avatar" style="width: 120px; height: 120px; object-fit: cover;">
        <h5 class="mt-3 text-primary">Welcome, Student</h5>
        <p class="text-muted mb-0">School Year: <?php echo $school_year; ?></p>
    </div>

    <!-- Sidebar Navigation -->
    <ul class="list-group">
        <!-- My Class -->
        <li class="list-group-item list-group-item-action d-flex align-items-center">
            <i class="bi bi-house-door me-3"></i>
            <a href="../dashboard_student.php" class="text-dark text-decoration-none flex-grow-1">My Class</a>
        </li>

        <!-- Notifications -->
        <li class="list-group-item list-group-item-action d-flex align-items-center">
            <i class="bi bi-bell me-3 text-primary"></i>
            <a href="../student_notification.php" class="text-dark text-decoration-none flex-grow-1">Notifications</a>
            <span class="badge bg-primary rounded-pill"><?php echo $unread_notifications; ?></span>
        </li>

        <!-- Messages -->
        <li class="list-group-item list-group-item-action active d-flex align-items-center">
            <i class="bi bi-envelope me-3 text-primary"></i>
            <a href="message/student_message.php" class="text-white text-decoration-none flex-grow-1">Messages</a>
            <?php if ($count_message > 0) { ?>
                <span class="badge bg-danger rounded-pill"><?php echo $count_message; ?></span>
            <?php } ?>
        </li>

        <!-- Backpack -->
        <li class="list-group-item list-group-item-action d-flex align-items-center">
            <i class="bi bi-folder me-3 text-primary"></i>
            <a href="../backpack.php" class="text-dark text-decoration-none flex-grow-1">Backpack</a>
        </li>
    </ul>
</div>