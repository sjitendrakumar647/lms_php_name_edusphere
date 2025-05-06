<?php
include('dbcon.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = mysqli_query($conn, "DELETE FROM teacher_class_student WHERE teacher_class_student_id = '$id'") or die(mysqli_error($conn));

    if ($query) {
        echo "success"; // Return "success" if the deletion is successful
    } else {
        echo "error"; // Return "error" if the deletion fails
    }
} else {
    echo "error"; // Return "error" if no ID is provided
}
?>
