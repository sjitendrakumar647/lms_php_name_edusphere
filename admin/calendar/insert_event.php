<?php
include('../dbcon.php');

if (isset($_POST['date_start'], $_POST['date_end'], $_POST['title'])) {
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $title = $_POST['title'];

    $query = mysqli_query($conn, "INSERT INTO event (date_start, date_end, event_title) VALUES ('$date_start', '$date_end', '$title')") or die(mysqli_error($conn));

    if ($query) {
        echo "success";
    } else {
        echo "Error adding event.";
    }
}else {
    echo "Invalid request.";
}
?>
