<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-lg-9">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Please fill in the required details.
                        </div>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id = '$session_id'") or die(mysqli_error($conn));
                        $row = mysqli_fetch_array($query);
                        ?>
                        <form method="post" id="change_password" class="needs-validation" novalidate>
                            <input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password" required>
                                <div class="invalid-feedback">Please enter your current password.</div>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" required>
                                <div class="invalid-feedback">Please enter a new password.</div>
                            </div>
                            <div class="mb-3">
                                <label for="retype_password" class="form-label">Re-type Password</label>
                                <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Re-type New Password" required>
                                <div class="invalid-feedback">Please retype your new password.</div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>

    <script>
        // Bootstrap validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // jQuery for password validation
        jQuery(document).ready(function () {
            jQuery("#change_password").submit(function (e) {
                e.preventDefault();

                var password = jQuery('#password').val();
                var current_password = jQuery('#current_password').val();
                var new_password = jQuery('#new_password').val();
                var retype_password = jQuery('#retype_password').val();

                if (password != current_password) {
                    alert("Current password does not match.");
                } else if (new_password != retype_password) {
                    alert("New password and re-typed password do not match.");
                } else {
                    var formData = jQuery(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "update_password.php",
                        data: formData,
                        success: function (response) {
                            alert("Your password has been successfully changed.");
                            setTimeout(function () {
                                // window.location.href = 'dashboard_teacher.php';
								window.location.reload();
                            }, 2000);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>