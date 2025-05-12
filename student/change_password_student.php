<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <?php include('student_sidebar.php'); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h5><i class="bi bi-key"></i> Change Password</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><b>Change Password</b></a></li>
                                <li class="breadcrumb-item active" aria-current="page">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                            </ol>
                        </nav>

                        <!-- Instruction Message -->
                        <div class="alert alert-info"><i class="bi bi-info-circle"></i> Please fill in the required details.</div>

                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '$session_id'") or die(mysqli_error());
                        $row = mysqli_fetch_array($query);
                        ?>

                        <!-- Password Change Form -->
                        <form action="update_password_student.php" method="post" id="change_password" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>">
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="text-muted">Password must be at least 8 characters long, include at least one letter, one number, and one special character.</small>
                            </div>

                            <div class="mb-3">
                                <label for="retype_password" class="form-label">Re-type Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Re-type new password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small id="password-match-error" class="text-danger d-none">Passwords do not match.</small>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-info"><i class="bi bi-save"></i> Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector("#change_password");
            const newPasswordInput = document.querySelector("#new_password");
            const retypePasswordInput = document.querySelector("#retype_password");
            const passwordMatchError = document.querySelector("#password-match-error");

            // Form submission handler
            form.addEventListener("submit", function (e) {
                const currentPassword = document.querySelector("#current_password").value;
                const newPassword = newPasswordInput.value;
                const retypePassword = retypePasswordInput.value;

                // Password validation regex
                const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

                // Validate current password
                if (currentPassword !== document.querySelector("#password").value) {
                    e.preventDefault();
                    alert("Incorrect current password!");
                    return;
                }

                // Validate new password
                if (!passwordRegex.test(newPassword)) {
                    e.preventDefault();
                    alert("New password must be at least 8 characters long, include at least one letter, one number, and one special character.");
                    return;
                }

                // Validate password match
                if (newPassword !== retypePassword) {
                    e.preventDefault();
                    passwordMatchError.classList.remove("d-none");
                    return;
                } else {
                    passwordMatchError.classList.add("d-none");
                }
            });

            // Toggle Password Visibility
            document.querySelectorAll(".toggle-password").forEach(button => {
                button.addEventListener("click", function () {
                    const input = this.previousElementSibling;
                    const icon = this.querySelector("i");
                    if (input.type === "password") {
                        input.type = "text";
                        icon.classList.remove("bi-eye");
                        icon.classList.add("bi-eye-slash");
                    } else {
                        input.type = "password";
                        icon.classList.remove("bi-eye-slash");
                        icon.classList.add("bi-eye");
                    }
                });
            });
        });
    </script>
</body>
</html>
