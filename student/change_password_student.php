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
                        <form action="update_password_student.php" method="post"  class="needs-validation" novalidate>
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
                            </div>

                            <div class="mb-3">
                                <label for="retype_password" class="form-label">Re-type Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Re-type new password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
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
	<?php if (isset($_GET['status'])): ?>
		<?php if ($_GET['status'] == 'success'): ?>
			<div class="alert alert-success">Password successfully updated.</div>
		<?php elseif ($_GET['status'] == 'error'): ?>
			<div class="alert alert-danger">Error updating password. Please try again.</div>
		<?php elseif ($_GET['status'] == 'empty'): ?>
			<div class="alert alert-warning">Password cannot be empty.</div>
		<?php endif; ?>
	<?php endif; ?>
    

    <?php include('footer.php'); ?>

    <script>
        // jQuery Validation and Password Change Request
        jQuery(document).ready(function () {
            jQuery("#change_password").submit(function (e) {
                e.preventDefault();

                var password = jQuery('#password').val();
                var current_password = jQuery('#current_password').val();
                var new_password = jQuery('#new_password').val();
                var retype_password = jQuery('#retype_password').val();

                if (password != current_password) {
                    $.jGrowl("Incorrect current password!", { header: 'Change Password Failed', theme: 'bg-danger' });
                } else if (new_password !== retype_password) {
                    $.jGrowl("New passwords do not match!", { header: 'Change Password Failed', theme: 'bg-warning' });
                } else {
                    var formData = jQuery(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "update_password_student.php",
                        data: formData,
                        success: function (response) {
                            $.jGrowl("Your password has been successfully changed!", { header: 'Change Password Success', theme: 'bg-success' });
                            setTimeout(function () { window.location = 'dashboard_student.php'; }, 2000);
                        }
                    });
                }
            });

            // Toggle Password Visibility
            $(".toggle-password").click(function () {
                var input = $(this).prev("input");
                var icon = $(this).find("i");
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                    icon.removeClass("bi-eye").addClass("bi-eye-slash");
                } else {
                    input.attr("type", "password");
                    icon.removeClass("bi-eye-slash").addClass("bi-eye");
                }
            });
        });
    </script>
</body>
</html>
