
<?php
// $id = $_POST['id'];
// mysqli_query($conn,"delete from message_sent where message_sent_id = '$id'")or die(mysqli_error());

?>

<?php
include('../dbcon.php');  // Ensure database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM message_sent WHERE message_sent_id = '$id'") or die(mysqli_error($conn));
    echo 'success';
} else {
    echo 'error';
}
?>