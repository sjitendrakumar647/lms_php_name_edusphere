<?php
// include('dbcon.php');
// if (isset($_POST['delete_user'])){
// $id=$_POST['selector'];
// $N = count($id);
// for($i=0; $i < $N; $i++)
// {
// 	$result = mysqli_query($conn,"DELETE FROM school_year where school_year_id='$id[$i]'");
// }
// header("location: school_year.php");
// }
?>

<?php
include('../dbcon.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM school_year WHERE school_year_id = '$id'") or die(mysqli_error($conn));
    echo 'success';
} else {
    echo 'error';
}
?>