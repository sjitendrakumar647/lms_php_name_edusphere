<?php
include('../dbcon.php');
include('../session.php');

// Update logout time
mysqli_query($conn, "UPDATE student_log SET logout_date = NOW() WHERE student_id = '$session_id'") or die(mysqli_error());

// Start session if not already started
session_start();
session_unset();
session_destroy();

// Prevent back button from accessing the previous session
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

header("Location: ../../index.html");
exit();
?>
