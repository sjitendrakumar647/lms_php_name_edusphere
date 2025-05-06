<?php
// include('dbcon.php');
// $get_id = $_POST['id'];
// mysqli_query($conn,"delete from teacher_class  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
// mysqli_query($conn,"delete from teacher_class_student  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
// mysqli_query($conn,"delete from teacher_class_announcements  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
// mysqli_query($conn,"delete from teacher_notification  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
// mysqli_query($conn,"delete from class_subject_overview where  teacher_class_id = '$get_id' ")or die(mysqli_error());
// header('location:dasboard_teacher.php');
?>

<?php
include('dbcon.php'); // Ensure the database connection is included

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    mysqli_query($conn,"delete from teacher_class  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
    mysqli_query($conn,"delete from teacher_class_student  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
    mysqli_query($conn,"delete from teacher_class_announcements  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
    mysqli_query($conn,"delete from teacher_notification  where  teacher_class_id = '$get_id' ")or die(mysqli_error());
    mysqli_query($conn,"delete from class_subject_overview where  teacher_class_id = '$get_id' ")or die(mysqli_error());

    $query = "DELETE FROM teacher_class WHERE teacher_class_id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "success"; // Return a success response
    } else {
        echo "error"; // Return an error response
    }
}
?>
