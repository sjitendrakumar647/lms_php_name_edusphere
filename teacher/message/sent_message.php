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
                        <h5 class="mb-0"><i class="bi bi-send"></i> Sent Messages</h5>
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
                                <li class="breadcrumb-item active" aria-current="page">Sent Messages</li>
                                <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                            </ol>
                        </nav>

                        <!-- Navigation Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li class="nav-item">
                                <a class="nav-link" href="teacher_message.php"><i class="bi bi-inbox"></i> Inbox</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="sent_message.php"><i class="bi bi-send"></i> Sent Messages</a>
                            </li>
                        </ul>

                        <!-- Sent Messages -->
                        <?php
                        $query_announcement = mysqli_query($conn, "SELECT * FROM message_sent
                            LEFT JOIN teacher ON teacher.teacher_id = message_sent.reciever_id
                            WHERE sender_id = '$session_id' ORDER BY date_sended DESC") or die(mysqli_error($conn));
                        $count_my_message = mysqli_num_rows($query_announcement);

                        if ($count_my_message > 0) {
                            while ($row = mysqli_fetch_array($query_announcement)) {
                                $id = $row['message_sent_id'];
                                ?>
                                <div class="card mb-3" id="del<?php echo $id; ?>">
                                    <div class="card-body">
                                        <p class="mb-1"><?php echo $row['content']; ?></p>
                                        <hr>
                                        <small class="text-muted">Sent to: <strong><?php echo $row['reciever_name']; ?></strong></small>
                                        <small class="text-muted float-end"><i class="bi bi-calendar"></i> <?php echo $row['date_sended']; ?></small>
                                        <div class="mt-3 d-flex justify-content-end">
                                            <a href="#removeModal<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"><i class="bi bi-trash"></i> Remove</a>
                                            <?php include("remove_sent_message_modal.php"); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <div class="alert alert-info"><i class="bi bi-info-circle"></i> No messages in your Sent Items</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			<!-- Create Message input field -->
			<?php include('create_message.php') ?>
        </div>
    </div>

    <!-- JavaScript for AJAX -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.remove').forEach(button => {
        button.addEventListener('click', function () {
            const id = this.id.replace('remove', '');
            console.log('Deleting message ID:', id); // 👈 Debug line

            fetch('remove_sent_message.php', {
                method: 'POST',
                body: new URLSearchParams({ id }),
            })
            .then(response => response.text())
            .then(data => {
                console.log('Server response:', data); // 👈 Debug line
                document.getElementById('del' + id).remove();
                const modalElement = document.getElementById('removeModal' + id);
                const modal = bootstrap.Modal.getInstance(modalElement);
                
				window.location = "sent_message.php"; // 👈 Redirect to the same page to refresh the list
            })
            .catch(error => console.error('Error:', error)); // 👈 Catch any errors
        });
    });
});

    </script>

    <?php include('../footer.php'); ?>
</body>
</html>