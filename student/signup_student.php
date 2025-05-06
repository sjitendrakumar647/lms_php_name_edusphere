<?php include('header_dashboard.php'); ?>
<link rel="stylesheet" href="../admin/assets/css/rgb.css">
<style>
    
    body{
        background-image: url(https://img.freepik.com/free-vector/realistic-polygonal-background_23-2148913454.jpg?t=st=1738266431~exp=1738270031~hmac=79beaf148fbc661a224c7651530d14e80e39ae2c7b8732e7d4384118e5e31d33&w=996);
    }
</style>
<body id="login" class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card container3 shadow-lg p-4 mt-5" style="width: 500px;">
            <h3 class="text-center mb-4"><i class="icon-lock"></i> Sign Up as Student</h3>
            <form id="signin_student" method="post">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-4 col-form-label text-md-end">ID Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter user id" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="firstname" class="col-sm-4 col-form-label text-md-end">Firstname</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="lastname" class="col-sm-4 col-form-label text-md-end">Lastname</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="department_id" class="col-sm-4 col-form-label text-md-end">Department</label>
                    <div class="col-sm-8">
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Select Department</option>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                echo "<option value='{$row['department_id']}'>{$row['department_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-4 col-form-label text-md-end">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password"zplaceholder="Enter password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cpassword" class="col-sm-4 col-form-label text-md-end">Re-type Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter password" required>
                    </div>
                </div>
                <button id="signin" name="login" class="btn btn-primary w-100" type="submit">
                    <i class="icon-check"></i> Sign Up
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="../index1.html" class="btn btn-outline-secondary w-100"><i class="icon-signin"></i> Click here to Login</a>
            </div>

            <div id="notification" class="mt-3 text-center"></div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("signin_student").addEventListener("submit", function (e) {
                e.preventDefault();
                
                var password = document.getElementById("password").value;
                var cpassword = document.getElementById("cpassword").value;
                var notification = document.getElementById("notification");

                if (password === cpassword) {
                    var formData = new FormData(this);
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "student_signup.php", true);
                    
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            var response = xhr.responseText.trim();
                            
                            if (response === 'true') {
                                showNotification("Welcome to EduSphere Learning Management System", 'success');
                                setTimeout(() => { window.location = 'dashboard_student.php'; }, 2000);
                            } else {
                                showNotification("Student not found in the database. Please check your details.", 'danger');
                            }
                        }
                    };
                    
                    xhr.send(formData);
                } else {
                    showNotification("Passwords do not match", 'warning');
                }
            });

            function showNotification(message, type) {
                notification.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
                setTimeout(() => { notification.innerHTML = ""; }, 3000);
            }
        });
    </script>
</body>
</html>
