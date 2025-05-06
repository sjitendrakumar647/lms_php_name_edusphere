<?php
include('session.php');
// Include database connection details
require("opener_db.php");
$conn = $connector->DbConnector();
$errmsg_arr = array();
// Validation error flag
$errflag = false;

// Get the uploaded by details
$uploaded_by_query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error($conn));
$uploaded_by_query_row = mysqli_fetch_array($uploaded_by_query);
$uploaded_by = $uploaded_by_query_row['firstname'] . " " . $uploaded_by_query_row['lastname'];

$id_class = $_POST['id_class'];
$name = $_POST['name'];
$get_id = $_POST['id_class'];

// Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
    global $conn;
    $str = @trim($str);
    $str = stripslashes($str);
    return mysqli_real_escape_string($conn, $str);
}

// Sanitize the POST values
$filedesc = clean($_POST['desc']);

if ($filedesc == '') {
    $errmsg_arr[] = 'File description is missing';
    $errflag = true;
}

if ($_FILES['uploaded_file']['size'] >= 1048576 * 5) {
    $errmsg_arr[] = 'File selected exceeds 5MB size limit';
    $errflag = true;
}

// If there are input validations, redirect back to the form
if ($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    ?>
    <script>
        window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
    </script>
    <?php
    exit();
}

// Generate a random name for the file
$rd2 = mt_rand(1000, 9999) . "_File";

// Check that we have a file
if ((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
    $filename = basename($_FILES['uploaded_file']['name']);
    $ext = substr($filename, strrpos($filename, '.') + 1);

    if (($ext != "exe") && ($_FILES["uploaded_file"]["type"] != "application/x-msdownload")) {
        $newname = "../teacher/uploads/" . $rd2 . "_" . $filename;
        $name_notification = 'Add Downloadable Materials file name ' . '<b>' . $name . '</b>';

        // Check if the file with the same name already exists
        if (!file_exists($newname)) {
            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newname)) {
                // Insert into the database
                $qry2 = "INSERT INTO files (fdesc, floc, fdatein, class_id, fname, uploaded_by) 
                         VALUES ('$filedesc', '$newname', NOW(), '$id_class', '$name', '$uploaded_by')";
                mysqli_query($conn, "INSERT INTO teacher_notification (teacher_class_id, notification, date_of_notification, link, student_id) 
                                     VALUES ('$get_id', '$name_notification', NOW(), 'downloadable.php', '$session_id')") or die(mysqli_error($conn));
                $result2 = $connector->query($qry2);

                if ($result2) {
                    $errmsg_arr[] = 'Record was saved in the database and the file was uploaded';
                    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    ?>
                    <script>
                        window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
                    </script>
                    <?php
                    exit();
                } else {
                    $errmsg_arr[] = 'Record was not saved in the database but the file was uploaded';
                    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                    session_write_close();
                    ?>
                    <script>
                        window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
                    </script>
                    <?php
                    exit();
                }
            } else {
                $errmsg_arr[] = 'Upload of file ' . $filename . ' was unsuccessful';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                ?>
                <script>
                    window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
                </script>
                <?php
                exit();
            }
        } else {
            $errmsg_arr[] = 'Error: File >>' . $_FILES["uploaded_file"]["name"] . '<< already exists';
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            ?>
            <script>
                window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
            </script>
            <?php
            exit();
        }
    } else {
        $errmsg_arr[] = 'Error: All file types except .exe files under 5 MB are accepted for upload';
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        ?>
        <script>
            window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
        </script>
        <?php
        exit();
    }
} else {
    $errmsg_arr[] = 'Error: No file uploaded';
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    ?>
    <script>
        window.location = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
    </script>
    <?php
    exit();
}

mysqli_close();
?>