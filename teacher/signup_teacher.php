<?php include('header.php')?>
<?php include('dbcon.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Signup - EduSphere LMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/rgb.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .signup-container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .notification {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #444;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        body{
            background-image: url(https://img.freepik.com/free-photo/illustration-geometric-shapes-with-neon-laser-lights-great-backgrounds-wallpapers_181624-32746.jpg?t=st=1738265761~exp=1738269361~hmac=b74ec85cfa9a59ce8640a4ec2ba07d552bfab76bde040d130d5ffaac8f282a82&w=1380);
        }
       
    </style>
</head>
<body class="bg-dark vh-100 d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card container3 shadow-lg p-4" style="width: 500px;">
            <h3 class="text-center">Sign up as Teacher</h3>
            <form id="signin_teacher" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select name="department_id" class="form-control" required>
                        <option value="">Select Department</option>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM department ORDER BY department_name") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                echo "<option value='{$row['department_id']}'>{$row['department_name']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
                </div>
                <button id="signin" name="login" class="btn btn-primary w-100" type="submit">Sign up</button>
            </form>
            <div class="text-center mt-3">
                <a href="index1.html" class="btn btn-outline-secondary w-100"><i class="icon-signin"></i> Click here to Login</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("signin_teacher").addEventListener("submit", function (e) {
                e.preventDefault();
                
                var password = document.getElementById("password").value;
                var cpassword = document.getElementById("cpassword").value;
                
                if (password === cpassword) {
                    var formData = new FormData(this);
                    fetch("teacher_signup.php", {
                        method: "POST",
                        body: formData
                    }).then(response => response.text())
                    .then(data => {
                        if (data.trim() === 'true') {
                            showNotification("Welcome to EduSphere Learning Management System", 'Sign up Success');
                            setTimeout(() => window.location = 'dashboard_teacher.php', 1000);
                        } else {
                            showNotification("Your data is not found in the database", 'Sign Up Failed');
                        }
                    });
                } else {
                    showNotification("Passwords do not match", 'Sign Up Failed');
                }
            });
        });

        function showNotification(message, header = '') {
            let notification = document.createElement("div");
            notification.className = "notification alert alert-dark";
            notification.innerHTML = `<strong>${header}</strong><br>${message}`;
            document.body.appendChild(notification);
            setTimeout(() => {
                notification.style.opacity = "0";
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }
    </script>
</body>
</html>
