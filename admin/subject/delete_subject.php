<!-- <?php
// include('dbcon.php');
// if (isset($_POST['delete_subject'])){
// $id=$_POST['selector'];
// $N = count($id);
// for($i=0; $i < $N; $i++)
// {
// 	$result = mysqli_query($conn,"DELETE FROM subject where subject_id='$id[$i]'");
// }
// header("location: subjects.php");
// }
?> -->

<?php
include('../dbcon.php');  // Ensure database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM subject WHERE subject_id = '$id'") or die(mysqli_error($conn));
    echo 'success';
} else {
    echo 'error';
}
?>
