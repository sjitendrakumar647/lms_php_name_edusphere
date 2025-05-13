<?php include('header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<body>
    <?php include('../navbar_student.php'); ?>
    <div class="container-fluid mt-4">
        <div class="row g-4">
            <!-- Sidebar on the left -->
            <div class="col-lg-3">
                <?php include('student_sidebar.php'); ?>
            </div>
            <!-- Main content -->
            <div class="col-lg-9">
				<div class="row">

					<div class="col-lg-6 col-md-12">
						<?php include('create_message_student_student.php'); ?>
                    </div>
					<div class="col-lg-6 col-md-12">
                <div class="card shadow">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="bi bi-inbox"></i> Inbox</h5>
                            </div>
                            <div class="card-body">
                                <ul class="breadcrumb">
                                    <?php
                                    $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                                    $school_year_query_row = mysqli_fetch_array($school_year_query);
                                    $school_year = $school_year_query_row['school_year'];
                                    ?>
                                    <li class="breadcrumb-item"><a href="#">Message</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                                    <li class="breadcrumb-item">School Year: <?php echo $school_year; ?></li>
                                </ul>
                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="student_message.php">
                                            <i class="bi bi-envelope-fill"></i> Inbox
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="sent_message_student.php">
                                            <i class="bi bi-send"></i> Sent Messages
                                        </a>
                                    </li>
                                </ul>

                                <!-- Inbox Messages Table -->
                                <div class="table-responsive">
                                    <table id="inboxMessagesTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sender</th>
                                                <th>Message</th>
                                                <th>Date Sent</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_announcement = mysqli_query($conn, "SELECT * FROM message
                                                LEFT JOIN student ON student.student_id = message.sender_id
                                                WHERE message.reciever_id = '$session_id'
                                                ORDER BY date_sended DESC") or die(mysqli_error($conn));
                                            $count_my_message = mysqli_num_rows($query_announcement);
                                            if ($count_my_message != '0') {
                                                while ($row = mysqli_fetch_array($query_announcement)) {
                                                    $id = $row['message_id'];
                                                    $status = $row['message_status'];
                                                    $sender_name = $row['sender_name'];
                                                    ?>
                                                    <tr id="del<?php echo $id; ?>">
                                                        <td><?php echo $sender_name; ?></td>
                                                        <td><?php echo $row['content']; ?></td>
                                                        <td><?php echo $row['date_sended']; ?></td>
                                                        <td class="d-flex w-auto">
                                                            <!-- Reply Button -->
                                                            <a href="#reply<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-sm btn-primary">
                                                                <i class="bi bi-reply"></i> Reply
                                                            </a>
                                                            <!-- Remove Button -->
                                                            <a href="#remove<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-sm btn-danger">
                                                                <i class="bi bi-trash"></i> Remove
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php include("remove_inbox_message_modal.php"); ?>
                                                    <?php include("reply_inbox_message_modal_student.php"); ?>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">No messages in your inbox.</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
				</div>
				</div>
            </div>
        </div>
    </div>

<script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#inboxMessagesTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No entries available",
                    zeroRecords: "No matching records found"
                }
            });

            // Handle Remove Button Click
            $('.remove').click(function () {
                var id = $(this).attr("id");
                $.ajax({
                    type: "POST",
                    url: "remove_inbox_message.php",
                    data: ({ id: id }),
                    cache: false,
                    success: function (html) {
                        $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
                        $('#' + id).modal('hide');
                        $.jGrowl("Your Sent message is Successfully Deleted", { header: 'Data Delete' });
                    }
                });
                return false;
            });
        });
    </script>
    <?php include('../footer.php'); ?>
</body>
</html>