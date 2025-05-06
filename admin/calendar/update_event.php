<?php
include('../dbcon.php');

if (isset($_POST['id'], $_POST['start'], $_POST['end'])) {
    $id = $_POST['id'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $query = mysqli_query($conn, "UPDATE event SET date_start='$start', date_end='$end' WHERE event_id='$id'") or die(mysqli_error($conn));

    if ($query) {
        echo "Event updated successfully!";
    } else {
        echo "Error updating event.";
    }
}
?>
