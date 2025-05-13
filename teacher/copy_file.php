<?php
include('dbcon.php');
session_start();

if (isset($_POST['selector']) && !empty($_POST['selector'])) {
    $ids = $_POST['selector']; // Array of selected file IDs
    $session_id = $_SESSION['id']; // Teacher's session ID

    foreach ($ids as $id) {
        // Fetch file details from the database
        $result = mysqli_query($conn, "SELECT * FROM files WHERE file_id = '$id'") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            $fname = $row['fname'];
            $floc = $row['floc'];
            $fdesc = $row['fdesc'];

            // Insert file details into the teacher's backpack
            mysqli_query($conn, "INSERT INTO teacher_backpack (floc, fdatein, fdesc, teacher_id, fname) 
                                 VALUES ('$floc', NOW(), '$fdesc', '$session_id', '$fname')") or die(mysqli_error($conn));
        }
    }

    // Redirect with success message
    ?>
    <script>
        alert("Files successfully copied to your backpack.");
        window.location = 'teacher_backpack.php';
    </script>
    <?php
} else {
    // Redirect with error message if no files are selected
    ?>
    <script>
        alert("No files selected. Please select files to copy.");
        window.location = 'downloadable.php';
    </script>
    <?php
}
?>