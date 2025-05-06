<?php
include('dbcon.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_quiz_id = isset($_POST['class_quiz_id']) ? mysqli_real_escape_string($conn, $_POST['class_quiz_id']) : null;
    $student_id = isset($_POST['student_id']) ? mysqli_real_escape_string($conn, $_POST['student_id']) : null;
    $time_left = isset($_POST['time_left']) ? (int)$_POST['time_left'] : null;

    if ($class_quiz_id && $student_id && $time_left !== null) {
        $query = "UPDATE student_class_quiz SET student_quiz_time = '$time_left' WHERE class_quiz_id = '$class_quiz_id' AND student_id = '$student_id'";
        if (mysqli_query($conn, $query)) {
            echo "success";
        } else {
            echo "error: " . mysqli_error($conn);
        }
    } else {
        echo "error: Missing parameters.";
    }
} else {
    echo "error: Invalid request method.";
}
?>