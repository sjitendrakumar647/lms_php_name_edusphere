<?php
include('../dbcon.php');

// Check if the ID is provided
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Sanitize input
    $query = "DELETE FROM message WHERE message_id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "Message deleted successfully.";
    } else {
        echo "Error deleting message: " . mysqli_error($conn);
    }
} else {
    echo "No message ID provided.";
}
?>

