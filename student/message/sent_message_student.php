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
						<?php include('create_message_student.php'); ?>
					</div>
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

								<!-- Sent Messages -->
								<?php
								$query_announcement = mysqli_query($conn, "SELECT * FROM message_sent
									LEFT JOIN student ON student.student_id = message_sent.reciever_id
									WHERE sender_id = '$session_id' ORDER BY date_sended DESC") or die(mysqli_error($conn));
								$count_my_message = mysqli_num_rows($query_announcement);
								if ($count_my_message != '0') {
									while ($row = mysqli_fetch_array($query_announcement)) {
										$id = $row['message_sent_id'];
										?>
										<div class="card mb-3" id="del<?php echo $id; ?>">
											<div class="card-body">
												<p><?php echo $row['content']; ?></p>
												<p class="text-muted small">
													<strong>Sent to:</strong> <?php echo $row['reciever_name']; ?> <br>
													<i class="bi bi-calendar"></i> <?php echo $row['date_sended']; ?>
												</p>
												<div class="d-flex justify-content-end">
													<a href="#remove<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-link text-danger"><i class="bi bi-trash"></i> Remove</a>
													<?php include("remove_sent_message_modal.php"); ?>
												</div>
											</div>
										</div>
									<?php }
								} else { ?>
									<div class="alert alert-info"><i class="bi bi-info-circle"></i> No messages in your sent items.</div>
								<?php } ?>
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
                    url: "remove_sent_message.php",
                    data: ({ id: id }),
                    cache: false,
                    success: function (html) {
                        $("#del" + id).fadeOut('slow', function () { $(this).remove(); });
                        $('#' + id).modal('hide');
                        $.jGrowl("Your sent message has been successfully deleted.", { header: 'Data Deleted' });
                    }
                });
                return false;
            });
        });
    </script>
    <?php include('../footer.php'); ?>
</body>
</html>