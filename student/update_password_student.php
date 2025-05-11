 <?php
//  include('dbcon.php');
//  include('session.php');
//  $new_password  = $_POST['new_password'];
//  mysqli_query($conn,"update student set password = '$new_password' where student_id = '$session_id'")or die(mysqli_error());
 ?>

<?php
include('dbcon.php');
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = trim($_POST['new_password']);

    // Check if the password is not empty
    if (!empty($new_password)) {
        // Hash the new password before storing it
        // $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("UPDATE student SET password = ? WHERE student_id = ?");
        $stmt->bind_param("si", $new_password, $session_id);

        if ($stmt->execute()) {
            // Redirect back to the change password page with a success message
            echo '<script>alert("Password updated sucessfully...");</script>';
            header("Location: change_password_student.php?status=success");
            exit();
        } else {
            // Redirect back with an error message
            header("Location: change_password_student.php?status=error");
            exit();
        }

        $stmt->close();
    } else {
        // Redirect back with an error message if password is empty
        header("Location: change_password_student.php?status=empty");
        exit();
    }
}

$conn->close();
?>
