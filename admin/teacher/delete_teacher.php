<?php
// include('dbcon.php');
// if (isset($_POST['delete_teacher'])){
// $id=$_POST['selector'];
// $N = count($id);
// for($i=0; $i < $N; $i++)
// {
// 	$result = mysqli_query($conn,"DELETE FROM teacher where teacher_id='$id[$i]'");
// }
// header("location: teachers.php");
// }
?>

<?php
include('../dbcon.php'); // Ensure database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the teacher record
    $query = mysqli_query($conn, "DELETE FROM teacher WHERE teacher_id = '$id'") or die(mysqli_error($conn));

    if ($query) {
        echo 'success'; // Return success if the deletion is successful
    } else {
        echo 'error'; // Return error if the deletion fails
    }
} else {
    echo 'error'; // Return error if no ID is provided
}
?>