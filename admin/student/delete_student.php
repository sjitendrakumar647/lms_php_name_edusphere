<?php
// include('dbcon.php');
// if (isset($_POST['delete_student'])){
// $id=$_POST['selector'];
// $N = count($id);
// for($i=0; $i < $N; $i++)
// {
// 	 mysqli_query($conn,"DELETE FROM student where student_id='$id[$i]'");
// 	 mysqli_query($conn,"DELETE FROM teacher_class_student where student_id='$id[$i]'");
// }
// header("location: students.php");
// }
?>


<?php
include('../dbcon.php');  // Ensure database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM student WHERE student_id = '$id'") or die(mysqli_error($conn));
    echo 'success';
} else {
    echo 'error';
}
?>