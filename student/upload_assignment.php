<?php

include('session.php');
require("opener_db.php");

$conn = $connector->DbConnector();
$errmsg_arr = array();
$errflag = false;

// Constants
define('MAX_FILE_SIZE', 1048576 * 5); // 5 MB
define('UPLOAD_DIR', '../admin/uploads/');
define('DISALLOWED_EXTENSIONS', ['exe']);
define('DISALLOWED_MIME_TYPES', ['application/x-msdownload']);

// Sanitize input
function clean($str) {
    global $conn;
    $str = trim($str);
    return mysqli_real_escape_string($conn, stripslashes($str));
}

// Handle errors
function handleError($errors, $redirectUrl) {
    $_SESSION['ERRMSG_ARR'] = $errors;
    session_write_close();
    echo "<script>window.location = '$redirectUrl';</script>";
    exit();
}

// Input validation
$assignment_id = clean($_POST['id']);
$name = clean($_POST['name']);
$get_id = clean($_POST['get_id']);
$filedesc = clean($_POST['desc']);

if (empty($filedesc)) {
    $errmsg_arr[] = 'File description is missing';
    $errflag = true;
}

if ($_FILES['uploaded_file']['size'] > MAX_FILE_SIZE) {
    $errmsg_arr[] = 'File exceeds the 5MB size limit';
    $errflag = true;
}

if ($errflag) {
    handleError($errmsg_arr, "downloadable.php?id=$get_id");
}

// Generate a unique file name
$rd2 = mt_rand(1000, 9999) . "_File";

// Check if a file is uploaded
if (!empty($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] == 0) {
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $mime_type = $_FILES['uploaded_file']['type'];

    // Validate file type
    if (in_array($ext, DISALLOWED_EXTENSIONS) || in_array($mime_type, DISALLOWED_MIME_TYPES)) {
        $errmsg_arr[] = 'Error: Disallowed file type';
        handleError($errmsg_arr, "downloadable.php?id=$get_id");
    }

    // Sanitize file name and determine upload path
    $sanitized_filename = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', $filename);
    $newname = UPLOAD_DIR . $rd2 . "_" . $sanitized_filename;

    // Check if file already exists
    if (file_exists($newname)) {
        $errmsg_arr[] = "Error: File '$sanitized_filename' already exists";
        handleError($errmsg_arr, "downloadable.php?id=$get_id");
    }

    // Attempt to move the uploaded file
    if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)) {
        $name_notification = 'Submit Assignment file name <b>' . $name . '</b>';

        // Use prepared statements for database queries
        $stmt = $conn->prepare("INSERT INTO student_assignment (fdesc, floc, assignment_fdatein, fname, assignment_id, student_id) VALUES (?, ?, NOW(), ?, ?, ?)");
        $stmt->bind_param('ssssi', $filedesc, $newname, $name, $assignment_id, $session_id);

        if ($stmt->execute()) {
            $conn->query("INSERT INTO teacher_notification (teacher_class_id, notification, date_of_notification, link, student_id, assignment_id) VALUES ('$get_id', '$name_notification', NOW(), 'view_submit_assignment.php', '$session_id', '$assignment_id')");
            $errmsg_arr[] = 'File uploaded and record saved successfully';
        } else {
            $errmsg_arr[] = 'File uploaded but record could not be saved';
        }

        $stmt->close();
        handleError($errmsg_arr, "downloadable.php?id=$get_id");
    } else {
        $errmsg_arr[] = "Error: Unable to upload file '$sanitized_filename'";
        handleError($errmsg_arr, "downloadable.php?id=$get_id");
    }
} else {
    $errmsg_arr[] = 'Error: No file uploaded';
    handleError($errmsg_arr, "downloadable.php?id=$get_id");
}

mysqli_close($conn);
?>