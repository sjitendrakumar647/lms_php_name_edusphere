<?php
include('dbcon.php');

if (isset($_POST['delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($conn,"DELETE FROM teacher_backpack where file_id='$id[$i]'");
}
header("location: teacher_backpack.php");
}
?>