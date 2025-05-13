<?php include('../dbcon.php'); ?>
<?php
// Ensure the 'id' parameter is received
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Sanitize the input to prevent SQL injection
    mysqli_query($conn, "DELETE FROM message WHERE message_id = '$id'") or die(mysqli_error($conn));
} else {
    echo "Error: Message ID not provided.";
}
?>

<script>
    $(document).ready(function () {
        // Reload the inbox messages after deletion
        $('#message').load('inbox_message.php');
    });
</script>