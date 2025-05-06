<?php include('../session.php'); ?>
<?php include('header_dashboard.php'); ?>
<body>
    <?php include('../navbar_student.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-md-3 mt-2">
                <?php require('student_sidebar.php'); ?>
            </div>

            <!-- Inbox Messages (Center) -->
            <div class="col-md-6 mt-3">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="card mb-3">
                    <ol class="breadcrumb bg-light p-2 rounded">
                        <li class="breadcrumb-item"><a href="#"><b>Message</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inbox</li>
                        <li class="breadcrumb-item">School Year: <strong><?php echo $school_year_query_row['school_year']; ?></strong> </li>
                    </ol>
                </nav>
                <!-- End Breadcrumb -->

                <!-- Messages Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5><i class="bi bi-envelope"></i> Inbox</h5>
                    </div>

                    <div class="card-body">
                        <!-- Navigation Tabs -->
                        <form action="read_message.php" method="post">
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

                        <?php
                        $query_announcement = mysqli_query($conn, "
                            SELECT * FROM message
                            LEFT JOIN student ON student.student_id = message.sender_id
                            WHERE message.reciever_id = '$session_id'
                            ORDER BY date_sended DESC
                        ") or die(mysqli_error());

                        $count_my_message = mysqli_num_rows($query_announcement);

                        if ($count_my_message != '0') {
                        ?>
                            <div class="table-responsive">
                                <table id="inboxMessagesTable" class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>From</th>
                                            <th style="max-width: 400px; word-wrap: break-word;">Message</th>
                                            <th>Date Sent</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = mysqli_fetch_array($query_announcement)) {
                                            $id = $row['message_id'];
                                            $sender_name = $row['sender_name'];
                                        ?>
                                            <tr>
                                                <td><strong><?php echo htmlspecialchars($sender_name); ?></strong></td>
                                                <td style="max-width: 400px; word-wrap: break-word;">
                                                    <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                                                </td>
                                                <td><i class="bi bi-calendar"></i> <?php echo htmlspecialchars($row['date_sended']); ?></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a class="btn btn-sm btn-warning" href="#reply<?php echo $id; ?>" data-bs-toggle="modal">
                                                            <i class="bi bi-reply"></i> Reply
                                                        </a>
                                                        <a class="btn btn-sm btn-danger" href="#remove<?php echo $id; ?>" data-id="<?php echo $id; ?>"  data-bs-toggle="modal">
                                                            <i class="bi bi-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                    <?php include("remove_message_modal.php"); ?>
                                                    <?php include("reply_inbox_message_modal_student.php"); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php 
                        } else { 
                        ?>
                            <div class="alert alert-info text-center">
                                <i class="bi bi-info-circle"></i> No Messages Found
                            </div>
                        <?php } ?>
                        </form>
                    </div>
                </div>
                <!-- /Messages Card -->
            </div>

            <!-- Create Message (Right Side) -->
            <div class="col-md-3">
                <?php include('create_message_student_student.php'); ?>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>

    <!-- Include DataTables CSS & JS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> -->

    <!-- JavaScript for DataTable & Message Removal -->
    <script>
        $(document).ready(function () {
        //     // Initialize DataTable
        //    // data tables
        //     $(document).ready(function() {
        //         $('#MessagesTable').DataTable({
        //             "columnDefs": [
        //                 { "width": "400px", "targets": 0 }
        //             ],
        //             "autoWidth": false
        //         });
        //     });

            // Message Deletion via AJAX
            $('.remove').click(function () {
                var messageElement = $(this).closest('tr'); // Find the nearest row
                var id = $(this).data("id"); // Get the message ID

                $.ajax({
                    type: "POST",
                    url: "remove_inbox_message.php",
                    data: { id: id },
                    cache: false,
                    success: function (response) {
                        messageElement.fadeOut('slow', function () {
                            $(this).remove();
                        });

                        $.jGrowl("Message successfully deleted", { header: 'Deleted' });
                    }
                });

                return false;
            });
        });
    </script>
</body>
</html>
