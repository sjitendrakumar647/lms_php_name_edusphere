<?php
include('dbcon.php');
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $result = mysqli_query($conn, "DELETE FROM student_backpack WHERE file_id='$id'");
    header("location: backpack.php");
    exit();
}
?>
