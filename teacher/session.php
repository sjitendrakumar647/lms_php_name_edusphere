<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: ../index.html");
    exit();
}
// Prevent back button from accessing after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$session_id = $_SESSION['id'];
?>