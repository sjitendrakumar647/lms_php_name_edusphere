<!-- <?php
// include('dbcon.php');
// if (isset($_POST['delete_user'])){
// $id=$_POST['selector'];
// $N = count($id);
// for($i=0; $i < $N; $i++)
// {
// 	$result = mysqli_query($conn,"DELETE FROM users where user_id='$id[$i]'");
// }
// header("location: admin_user.php");
// }
?> -->

<?php
include('../dbcon.php');  // Ensure database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM users WHERE user_id = '$id'") or die(mysqli_error($conn));
    echo 'success';
} else {
    echo 'error';
}
?>