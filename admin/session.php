<?php
// Start the session
session_start();

// Check if the session ID is set and valid
if (!isset($_SESSION['id']) || trim($_SESSION['id']) == '') {
    header("Location: ../index.php");
    exit();
}

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Retrieve session ID
$session_id = $_SESSION['id'];

// Fetch user details from the database
$user_query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$session_id'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_query);
$user_username = $user_row['username'];
?>