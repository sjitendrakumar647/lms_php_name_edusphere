<?php
include('dbcon.php');
include('session.php');

if (isset($_POST['copy_to_backpack'])) {
    $id = $_POST['selector'];

    if (!empty($id)) {
        $N = count($id);
        for ($i = 0; $i < $N; $i++) {
            $result = mysqli_query($conn, "SELECT * FROM files WHERE file_id = '$id[$i]'") or die(mysqli_error($conn));
            
            while ($row = mysqli_fetch_array($result)) {
                $fname = $row['fname'];
                $floc = $row['floc'];
                $fdesc = $row['fdesc'];

                // Insert into student_backpack table
                mysqli_query($conn, "INSERT INTO student_backpack (floc, fdatein, fdesc, student_id, fname) 
                                     VALUES ('$floc', NOW(), '$fdesc', '$session_id', '$fname')") 
                or die(mysqli_error($conn));
            }
        }
        echo "<script>alert('Files copied successfully to backpack!'); window.location = 'backpack.php';</script>";
    } else {
        echo "<script>alert('No files selected!');</script>";
    }
}
?>
