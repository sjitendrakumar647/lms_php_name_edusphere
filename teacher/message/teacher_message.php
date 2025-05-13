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

                        if ($count_my_message != '0') {
                            while ($row = mysqli_fetch_array($query_announcement)) {
                                $id = $row['message_id'];
                                $sender_name = $row['sender_name'];
                                ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <p class="mb-1"><?php echo $row['content']; ?></p>
                                        <hr>
                                        <small class="text-muted">Sent by: <strong><?php echo $sender_name; ?></strong></small>
                                        <small class="text-muted float-end"><i class="bi bi-calendar"></i> <?php echo $row['date_sended']; ?></small>
                                        <div class="mt-3 d-flex justify-content-end">
                                            <a href="#reply<?php echo $id; ?>" class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal"><i class="bi bi-reply"></i> Reply</a>
                                            <button class="btn btn-sm btn-outline-danger remove" data-id="<?php echo $id; ?>" id="removeModal<?php echo $id; ?>"><i class="bi bi-trash"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <?php include("remove_inbox_message_modal.php"); ?>
                                <?php include("reply_inbox_message_modal.php"); ?>
                            <?php }
                        } else { ?>
                            <div class="alert alert-info"><i class="bi bi-info-circle"></i> No Inbox Messages</div>
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
            // Add event listener to all remove buttons
            document.querySelectorAll('.remove').forEach(button => {
                button.addEventListener('click', function () {
                    const messageId = this.getAttribute('data-id'); // Get the message ID from the button's data-id attribute

                    // Send AJAX request to delete the message
                    fetch('remove_inbox_message.php', {
                        method: 'POST',
                        body: new URLSearchParams({ id: messageId })
                    })
                    .then(response => response.text())
                    .then(data => {
                        // Remove the message card or row from the DOM
                        const messageCard = document.getElementById('del' + messageId);
                        if (messageCard) {
                            messageCard.remove();
                        }

                        // Show success alert
                        alert('Message successfully deleted.');
                        window.location.href="teacher_message.php";
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to delete the message.');
                    });
                });
            });

            // Reply Message
            document.querySelectorAll('.modal').forEach(modal => {
                const form = modal.querySelector('form');
                if (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();

                        const formData = new FormData(this);
                        const modalId = this.id.replace('reply_form_', ''); // Extract the message ID

                        fetch('reply.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Show success message
                            alert('Message successfully sent.');

                            // Close the modal
                            const bootstrapModal = bootstrap.Modal.getInstance(document.getElementById('reply' + modalId));
                            bootstrapModal.hide();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Failed to send the message.');
                        });
                    });
                }
            });
        });
    </script>
    <?php include('../footer.php'); ?>
</body>
</html>