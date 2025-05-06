<style>
    .container {
        max-width: 600px;
        margin: auto;
        /* padding: 20px; */
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn-primary {
        width: 100%;
    }
</style>

<body>
    
         
    <div class="container p-0">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h4>👤 Add New User</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    
                    <button type="submit" name="save" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Add User
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['save'])) {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure Password Hashing

        // Check if user already exists
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($conn));
        $count = mysqli_num_rows($query);

        if ($count > 0) { ?>
            <script>
                alert('⚠ User Already Exists');
            </script>
        <?php
        } else {
            mysqli_query($conn, "INSERT INTO users (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')") or die(mysqli_error($conn));

            mysqli_query($conn, "INSERT INTO activity_log (date, username, action) VALUES (NOW(), '$user_username', 'Added User $username')") or die(mysqli_error($conn));
        ?>
            <script>
                alert('✅ User Added Successfully');
                window.location = "admin_user.php";
            </script>
        <?php
        }
    }
    ?>

</body>
</html>
