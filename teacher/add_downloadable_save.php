<?php
include('dbcon.php');
include('session.php');
require("opener_db.php");


$errmsg_arr = array();
$errflag = false;
$conn = $connector->DbConnector();

$uploaded_by_query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($conn));
$uploaded_by_query_row = mysqli_fetch_array($uploaded_by_query);
$uploaded_by = $uploaded_by_query_row['firstname'] . " " . $uploaded_by_query_row['lastname'];

$name = $_POST['name'] ?? '';
$filedesc = $_POST['desc'] ?? '';
$id = $_POST['selector'] ?? [];

function clean($str, $conn) {
    return mysqli_real_escape_string($conn, trim(stripslashes($str)));
}

$filedesc = clean($filedesc, $conn);

if (empty($filedesc)) {
    $errmsg_arr[] = 'File description is missing';
    $errflag = true;
}

if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['size'] >= 5 * 1048576) {
    $errmsg_arr[] = 'File selected exceeds 5MB size limit';
    $errflag = true;
}

if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    echo "<script>window.location = 'downloadable.php?id={$get_id}';</script>";
    exit();
}

$rd2 = mt_rand(1000, 9999) . "_File";

if (!empty($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($ext !== "exe") {
        $newname = "uploads/" . $rd2 . "_" . $filename;
        $name_notification = "Added Downloadable Material: <b>" . htmlspecialchars($name) . "</b>";

        if (!file_exists($newname)) {
            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)) {
                foreach ($id as $class_id) {
                    $class_id = clean($class_id, $conn);
                    mysqli_query($conn, "INSERT INTO files (fdesc, floc, fdatein, teacher_id, class_id, fname, uploaded_by) VALUES ('$filedesc', '$newname', NOW(), '$session_id', '$class_id', '$name', '$uploaded_by')") or die(mysqli_error($conn));
                    mysqli_query($conn, "INSERT INTO notification (teacher_class_id, notification, date_of_notification, link) VALUES ('$class_id', '$name_notification', NOW(), 'downloadable_student.php')") or die(mysqli_error($conn));
                }
                echo "<script>alert('File uploaded successfully'); window.location = 'add_downloadable.php';</script>";
            } else {
                echo "<script>alert('Error uploading file'); window.location = 'add_downloadable.php';</script>";
            }
        } else {
            echo "<script>alert('File already exists'); window.location = 'add_downloadable.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid file type'); window.location = 'add_downloadable.php';</script>";
    }
} else {
    echo "<script>alert('No file uploaded'); window.location = 'add_downloadable.php';</script>";
}

?>
