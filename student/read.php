<?php
include('dbcon.php');
include('session.php');

if (isset($_POST['read'])) {
    // Check if 'selector' is set and is an array
    if (isset($_POST['selector']) && is_array($_POST['selector'])) {
        $id = $_POST['selector'];
        $N = count($id);

        for ($i = 0; $i < $N; $i++) {
            // Sanitize the notification ID to prevent SQL injection
            $notification_id = mysqli_real_escape_string($conn, $id[$i]);

            // Insert into notification_read table
            $query = "INSERT INTO notification_read (student_id, student_read, notification_id) 
                      VALUES ('$session_id', 'yes', '$notification_id')";
            mysqli_query($conn, $query) or die(mysqli_error($conn));
        }
    } else {
        // If no notifications are selected
        echo "<script>alert('No notifications selected.');</script>";
    }
}
?>
<script>
    // Redirect back to the notifications page
    window.location = 'student_notification.php';
</script>