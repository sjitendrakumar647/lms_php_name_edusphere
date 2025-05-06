<?php
include('../dbcon.php');
$get_id = $_GET['id'];
mysqli_query($conn,"DELETE FROM event WHERE event_id = '$get_id'")or die(mysqli_error());
?>
<script>
window.location = 'calendar_of_events.php';
</script>