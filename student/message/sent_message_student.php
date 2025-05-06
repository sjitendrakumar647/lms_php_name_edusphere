<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar_student.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-md-3">
                <?php include('student_sidebar.php'); ?>
            </div>

            <!-- Sent Messages (Center) -->
            <div class="col-md-6">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>Message</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sent Messages</li>
                        <li class="breadcrumb-item">School Year: <strong><?php echo $school_year; ?></strong></li>
                    </ol>
                </nav>
                <!-- End Breadcrumb -->

                <!-- Messages Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5><i class="bi bi-send"></i> Sent Messages</h5>
                    </div>

                    <div class="card-body">
                        <!-- Navigation Tabs -->
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link" href="student_message.php">
                                    <i class="bi bi-envelope-fill"></i> Inbox
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="sent_message_student.php">
                                    <i class="bi bi-send"></i> Sent Messages
                                </a>
                            </li>
                        </ul>

                        <?php
                        $query_announcement = mysqli_query($conn, "
                            SELECT * FROM message_sent
                            LEFT JOIN student ON student.student_id = message_sent.reciever_id
                            WHERE sender_id = '$session_id'
                            ORDER BY date_sended DESC
                        ") or die(mysqli_error());

                        $count_my_message = mysqli_num_rows($query_announcement);

                        if ($count_my_message != '0') {
                        ?>
                            <div class="table-responsive">
                                <table id="sentMessagesTable" class="table table-striped table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="max-width: 400px; word-wrap: break-word;">Message</th>
                                            <th>Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($query_announcement)) {
                                            $id = $row['message_sent_id'];
                                        ?>
                                            <tr>
                                                <td style="max-width: 400px; word-wrap: break-word;">
                                                    <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                                                </td>
                                                <td>
                                                    <strong>Sent to:</strong> <?php echo htmlspecialchars($row['reciever_name']); ?> <br>
                                                    <i class="bi bi-calendar"></i> <?php echo htmlspecialchars($row['date_sended']); ?>
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?php echo $id; ?>" data-bs-toggle="modal" data-bs-target="#deleteSingleModal">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </button>
                                                </td>
                                            </tr>



                                            <div class="modal fade" id="deleteSingleModal" tabindex="-1" aria-labelledby="deleteSingleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this department?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                                            <?php 
                                            // include("remove_message_modal.php"); 
                                            ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-info text-center">
                                <i class="bi bi-info-circle"></i> No Messages in your Sent Items
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /Messages Card -->
            </div>

            <!-- Create Message (Right Side) -->
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5><i class="bi bi-pencil"></i> Create Message</h5>
                    </div>
                    <div class="card-body">
                        <!-- Navigation Tabs -->
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="student_message.php">For Teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="student_message_student.php">For Student</a>
                            </li>
                        </ul>

                        <!-- Message Form -->
                        <form method="post" id="send_message">
                            <div class="mb-3">
                                <label class="form-label"><strong>To:</strong></label>
                                <select name="teacher_id" class="form-select" required>
                                    <option value="">Select Teacher</option>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM teacher ORDER BY firstname");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $row['teacher_id']; ?>">
                                            <?php echo htmlspecialchars($row['firstname'] . " " . $row['lastname']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label"><strong>Message:</strong></label>
                                <textarea name="my_message" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-success"><i class="bi bi-send"></i> Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include('../footer.php'); ?>

    <script>
        // data tables
        $(document).ready(function() {
            $('#sentMessagesTable').DataTable({
                "columnDefs": [
                    { "width": "400px", "targets": 0 }
                ],
                "autoWidth": false
            });

            $("#send_message").submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: "send_message_student.php",
                    data: formData,
                    success: function (html) {
                        $.jGrowl("Message Successfully Sent", { header: 'Success' });
                        setTimeout(function () {
                            window.location = '#';
                        }, 2000);
                    }
                });

                return false;
            });
        });

        let deleteId;
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function () {
                            deleteId = this.getAttribute('data-id');
                        });
                    });

                    document.getElementById('confirmDelete').addEventListener('click', function () {
                        if (deleteId) {
                            fetch('remove_sent_message.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                body: 'id=' + deleteId
                            })
                            .then(response => response.text())
                            .then(data => {
                                if (data.trim() === 'success') {
                                    window.location.reload();
                                }
								else {
									window.location = 'sent_message_student.php';
								}
                            });
                        }
                    });
    </script>

</body>
</html>
