<?php

include('dbcon.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department_id = $_POST['department_id'];
$user = $_POST['user'];

// Check if the user is already registered
if ($user == 'student') {
    $check_status = mysqli_query($conn, "SELECT * FROM student WHERE firstname='$firstname' AND lastname='$lastname' AND department_id='$department_id' AND status='Registered'") or die(mysqli_error($conn));
    if (mysqli_num_rows($check_status) > 0) {
        echo '<script>alert("This student is already registered.");</script>';
        echo '<script>window.location.href="login_register.php";</script>';
        exit;
    }
} elseif ($user == 'teacher') {
    $check_status = mysqli_query($conn, "SELECT * FROM teacher WHERE firstname='$firstname' AND lastname='$lastname' AND department_id='$department_id' AND teacher_status='Registered'") or die(mysqli_error($conn));
    if (mysqli_num_rows($check_status) > 0) {
        echo '<script>alert("This teacher is already registered.");</script>';
        echo '<script>window.location.href="login_register.php";</script>';
        exit;
    }
}

if ($user == 'student') {
    // Query to check if the student exists
    $query = mysqli_query($conn, "SELECT * FROM student WHERE firstname='$firstname' AND lastname='$lastname' AND department_id='$department_id'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $row = mysqli_fetch_array($query);
        $id = $row['student_id'];

        // Update the student's username, password, and status
        mysqli_query($conn, "UPDATE student SET username='$username', password='$password', status='Registered' WHERE student_id='$id'") or die(mysqli_error($conn));
        $_SESSION['id'] = $id;
        echo 'true student';
?>
        <script type="text/javascript">
            setTimeout(function () { 
                window.location = 'student/dashboard_student.php'; 
            }, 1000);
        </script>
<?php
    } else {
        echo 'false'; // No matching student found
?>
        <script type="text/javascript">
            alert("No matching student found.");
            window.location.href = "login_register.php";
        </script>

<?php
        
    }
} elseif ($user == 'teacher') {
    // Query to check if the teacher exists
    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE firstname='$firstname' AND lastname='$lastname' AND department_id='$department_id'") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $row = mysqli_fetch_array($query);
        $id = $row['teacher_id'];

        // Update the teacher's username, password, and status
        mysqli_query($conn, "UPDATE teacher SET username='$username', password='$password', teacher_status='Registered' WHERE teacher_id='$id'") or die(mysqli_error($conn));
        $_SESSION['id'] = $id;
        echo 'true teacher';
?>
    <script type="text/javascript">
        setTimeout(function () { 
            window.location = 'teacher/dashboard_teacher.php'; 
        }, 1000);
    </script>
<?php
    } else {
        echo 'false'; // No matching teacher found
        ?>
        <script type="text/javascript">
            alert("No matching teacher found.");
            window.location.href = "login_register.php";
        </script>

<?php
    }
}
?>