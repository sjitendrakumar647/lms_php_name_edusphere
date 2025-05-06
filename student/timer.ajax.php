<?php
include('dbcon.php');
include('session.php');

$class_quiz_id = isset($_GET['class_quiz_id']) ? (int)$_GET['class_quiz_id'] : 0;

// Make sure class_quiz_id is passed
if (!$class_quiz_id) {
    die("Invalid quiz time");
}

// Fetch student's remaining time
$sql = mysqli_query($conn,"SELECT student_quiz_time FROM student_class_quiz WHERE student_id = '$session_id' AND class_quiz_id = '$class_quiz_id'") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($sql);

if (!$row) {
    die("No quiz found");
}

$quiz_time = (int)$row['student_quiz_time'];

if ($quiz_time > 0) {
    // Decrease time
    mysqli_query($conn,"UPDATE student_class_quiz SET student_quiz_time = student_quiz_time - 1 WHERE student_id = '$session_id' AND class_quiz_id = '$class_quiz_id'") or die(mysqli_error($conn));

    $minutes = floor($quiz_time / 60);
    $seconds = $quiz_time % 60;
    echo sprintf("%02dm %02ds", $minutes, $seconds);
} else {
    echo "Time's up!";
}
?>
