<?php include('../header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<body>
    <?php include('../navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
			<?php include('teacher_sidebar.php'); ?>

            <!-- Main Content -->
            <div class="col-md-6 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-envelope"></i> Inbox</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Message</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                                <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                            </ol>
                        </nav>

                        <!-- Inbox Navigation -->
                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="teacher_message.php"><i class="bi bi-inbox"></i> Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sent_message.php"><i class="bi bi-send"></i> Sent Messages</a>
                            </li>
                        </ul>

                        <!-- Messages -->
                        <?php
                        $query_announcement = mysqli_query($conn, "SELECT * FROM message
                            LEFT JOIN teacher ON teacher.teacher_id = message.sender_id
                            WHERE message.reciever_id = '$session_id' ORDER BY date_sended DESC") or die(mysqli_error($conn));
                        $count_my_message = mysqli_num_rows($query_announcement);

                        if ($count_my_message > 0) {
                            while ($row = mysqli_fetch_array($query_announcement)) {
                                $id = $row['message_id'];
                                ?>
                                <div class="card mb-3" id="del<?php echo $id; ?>">
                                    <div class="card-body">
                                        <p class="mb-1"><?php echo $row['content']; ?></p>
                                        <hr>
                                        <small class="text-muted">Sent by: <strong><?php echo $row['sender_name']; ?></strong></small>
                                        <small class="text-muted float-end"><i class="bi bi-calendar"></i> <?php echo $row['date_sended']; ?></small>
                                        <div class="mt-3 d-flex justify-content-end">
                                            <a href="#remove<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"><i class="bi bi-trash"></i> Remove</a>
                                            <?php include("remove_inbox_message_modal.php"); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="alert alert-info"><i class="bi bi-info-circle"></i> No Inbox Messages</div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Create Message Section -->
			<?php include('create_message_teacher.php') ?>

        </div>
    </div>

    <!-- JavaScript for AJAX Form Submission -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("send_message");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch("send_message.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Show success message
                    showToast("Message Successfully Sent", "success");

                    // Redirect after a delay
                    setTimeout(() => {
                        window.location = "teacher_message.php";
                    }, 2000);
                })
                .catch(error => {
                    showToast("Failed to send message", "error");
                    console.error("Error:", error);
                });
            });

            // Function to show toast notifications
            function showToast(message, type) {
                const toast = document.createElement("div");
                toast.className = `toast align-items-center text-bg-${type === "success" ? "success" : "danger"} border-0`;
                toast.style.position = "fixed";
                toast.style.bottom = "20px";
                toast.style.right = "20px";
                toast.innerHTML = `
                    <div class="d-flex">
                        <div class="toast-body">${message}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;
                document.body.appendChild(toast);

                const bootstrapToast = new bootstrap.Toast(toast);
                bootstrapToast.show();

                setTimeout(() => {
                    toast.remove();
                }, 3000);
            }
        });
    </script>

    <?php include('../footer.php'); ?>
</body>
</html>