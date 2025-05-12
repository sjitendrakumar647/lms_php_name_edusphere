<?php

include('dbcon.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']); // Added user type selection

    // Function to generate a secure password
    function generateSecurePassword($length = 8) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@$!%*?&';
        $password = '';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }
        // Ensure the password meets the criteria
        if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[@$!%*?&]/', $password)) {
            return generateSecurePassword($length); // Regenerate if criteria not met
        }
        return $password;
    }

    if ($user_type == 'student') {
        // Check if the username exists in the student table
        $query = mysqli_query($conn, "SELECT * FROM student WHERE username='$username'") or die(mysqli_error($conn));
        if (mysqli_num_rows($query) > 0) {
            // Generate a secure password
            $new_password = generateSecurePassword();

            // Update the student's password in the database
            mysqli_query($conn, "UPDATE student SET password='$new_password' WHERE username='$username'") or die(mysqli_error($conn));

            // Show the new password in an alert message
            echo "<script>alert('Your new password is: $new_password');</script>";
            echo '<script>window.location.href="login_register.php";</script>';
        } else {
            echo '<script>alert("This username is not registered as a student.");</script>';
        }
    } elseif ($user_type == 'teacher') {
        // Check if the username exists in the teacher table
        $query = mysqli_query($conn, "SELECT * FROM teacher WHERE username='$username'") or die(mysqli_error($conn));
        if (mysqli_num_rows($query) > 0) {
            // Generate a secure password
            $new_password = generateSecurePassword();

            // Update the teacher's password in the database
            mysqli_query($conn, "UPDATE teacher SET password='$new_password' WHERE username='$username'") or die(mysqli_error($conn));

            // Show the new password in an alert message
            echo "<script>alert('Your new password is: $new_password');</script>";
            echo '<script>window.location.href="login_register.php";</script>';
        } else {
            echo '<script>alert("This username is not registered as a teacher.");</script>';
        }
    } else {
        echo '<script>alert("Invalid user type selected.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Forgot Password</h2>
            <p class="text-center text-muted">Enter your username and select your user type to reset your password.</p>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="user_type" class="form-label">User Type</label>
                    <select class="form-select" id="user_type" name="user_type" required>
                        <option value="" disabled selected>Select user type</option>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
            </form>
            <div class="text-center mt-3">
                <a href="login_register.php" class="text-decoration-none">Back to Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>