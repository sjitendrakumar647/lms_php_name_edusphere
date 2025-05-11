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
                                <form action="read_message.php" method="post">
                                    <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                                        <button class="btn btn-info" name="read"><i class="bi bi-check-circle"></i> Mark as Read</button>
                                        <div>
                                            <label class="form-check-label me-2" for="checkAll">Check All</label>
                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                        </div>
                                    </div> -->
                                    <!-- <script>
                                        document.getElementById('checkAll').addEventListener('click', function () {
                                            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                                            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                        });
                                    </script> -->
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
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <p><?php echo $row['content']; ?></p>
                                                    <p class="text-muted small">
                                                        <strong>Sent by:</strong> <?php echo $sender_name; ?> <br>
                                                        <i class="bi bi-calendar"></i> <?php echo $row['date_sended']; ?>
                                                    </p>
                                                    <div class="d-flex justify-content-end">
                                                        <?php if ($status != 'read') { ?>
                                                            <input type="checkbox" name="selector[]" value="<?php echo $id; ?>" class="form-check-input me-2">
                                                        <?php } ?>
                                                        <a href="#reply<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-link"><i class="bi bi-reply"></i> Reply</a>
                                                        <a href="#remove<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-link text-danger"><i class="bi bi-trash"></i> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php include("remove_inbox_message_modal.php"); ?>
                                            <?php include("reply_inbox_message_modal_student.php"); ?>
                                        <?php }
                                    } else { ?>
                                        <div class="alert alert-info"><i class="bi bi-info-circle"></i> No messages in your inbox.</div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
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