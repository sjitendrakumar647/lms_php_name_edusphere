<?php
include('dbcon.php');

$events = array();
$query = mysqli_query($conn, "SELECT * FROM event");

while ($row = mysqli_fetch_assoc($query)) {
    $events[] = array(
        'id' => $row['event_id'],
        'title' => $row['event_title'],
        'start' => $row['date_start'],
        'end' => $row['date_end']
    );
}

echo json_encode($events);
?>
