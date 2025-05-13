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
                <div class="row g-4">
                    <!-- Create Message Section -->
                    <div class="col-lg-6 col-md-12">
						<?php include('create_message_student.php'); ?>
                    </div>
                    <!-- Inbox Section -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-send"></i> Sent Messages</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb -->
                        <ul class="breadcrumb">
                            <?php
                            $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                            $school_year_query_row = mysqli_fetch_array($school_year_query);
                            $school_year = $school_year_query_row['school_year'];
                            ?>
                            <li class="breadcrumb-item"><a href="#">Message</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sent Messages</li>
                            <li class="breadcrumb-item">School Year: <?php echo $school_year; ?></li>
                        </ul>

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

                        <!-- Sent Messages Table -->
                        <div class="table-responsive">
                            <table id="sentMessagesTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Recipient</th>
                                        <th>Message</th>
                                        <th>Date Sent</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_announcement = mysqli_query($conn, "SELECT * FROM message_sent
                                        LEFT JOIN student ON student.student_id = message_sent.reciever_id
                                        WHERE sender_id = '$session_id' ORDER BY date_sended DESC") or die(mysqli_error($conn));
                                    $count_my_message = mysqli_num_rows($query_announcement);
                                    if ($count_my_message != '0') {
                                        while ($row = mysqli_fetch_array($query_announcement)) {
                                            $id = $row['message_sent_id'];
                                            ?>
                                            <tr id="del<?php echo $id; ?>">
                                                <td><?php echo $row['reciever_name']; ?></td>
                                                <td><?php echo $row['content']; ?></td>
                                                <td><?php echo $row['date_sended']; ?></td>
                                                <td>
                                                    <a href="#remove<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Remove</a>
                                                    <?php include("remove_sent_message_modal.php"); ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No messages in your sent items.</td>
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

    <!-- DataTables Initialization -->
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize DataTable
        const table = new DataTable('#sentMessagesTable', {
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
        document.querySelectorAll('.confirm-remove').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id'); // Get the message ID from the data-id attribute
                fetch("remove_sent_message.php", {
                    method: "POST",
                    body: new URLSearchParams({ id: id })
                })
                .then(response => response.text())
                .then(data => {
                    // Remove the row from the table
                    const row = document.getElementById('del' + id);
                    if (row) {
                        row.remove();
                    }
                    // alert("Message successfully deleted.");
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

    <?php include('../footer.php'); ?>
</body>
</html>