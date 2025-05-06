<?php include('../header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-md-9 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-3 rounded alert alert-info">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                        <li class="breadcrumb-item active"><b>Quiz Questions</b></li>
                    </ol>
                </nav>

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Manage Quiz Questions</h5>
                        <div>
                            <a href="teacher_quiz.php" class="btn btn-light"><i class="bi bi-arrow-left"></i> Back</a>
                            <a href="add_question.php?id=<?php echo $get_id; ?>" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Question</a>
                        </div>
                    </div>


					<?php
                        $query = mysqli_query($conn, "SELECT * FROM quiz_question
                        LEFT JOIN question_type ON quiz_question.question_type_id = question_type.question_type_id
                    	WHERE quiz_id = '$get_id' ORDER BY date_added DESC") or die(mysqli_error());

						$count = mysqli_num_rows($query);
						if ($count > 0){
                    ?>
					
                    <div class="card-body">
                        <form action="delete_quiz_question.php" method="post">
                            <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">

							<a class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#backup_delete">
								<i class="bi bi-trash"></i> Delete Selected
							</a>

							<!-- Delete Confirmation Modal -->
							<div class="modal fade" id="backup_delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<!-- Modal Header -->
										<div class="modal-header bg-danger text-white">
											<h5 class="modal-title" id="deleteModalLabel">
												<i class="bi bi-exclamation-triangle-fill"></i> Confirm Deletion
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>

										<!-- Modal Body -->
										<div class="modal-body">
											<div class="alert alert-warning d-flex align-items-center" role="alert">
												<i class="bi bi-exclamation-circle-fill me-2"></i>
												<div>Are you sure you want to delete the selected question(s)? This action cannot be undone.</div>
											</div>
										</div>

										<!-- Modal Footer -->
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
												<i class="bi bi-x-circle"></i> Cancel
											</button>
											<button type="submit" name="backup_delete" class="btn btn-danger">
												<i class="bi bi-trash-fill"></i> Yes, Delete
											</button>
										</div>
									</div>
								</div>
							</div>


                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Question Text</th>
                                        <th>Type</th>
                                        <th>Answer</th>
                                        <th>Date Added</th>
                                        <th width="10%">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM quiz_question
                                        LEFT JOIN question_type ON quiz_question.question_type_id = question_type.question_type_id
                                        WHERE quiz_id = '$get_id' ORDER BY date_added DESC") or die(mysqli_error());

                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['quiz_question_id'];
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selector[]" value="<?php echo $id; ?>">
                                            </td>
                                            <td><?php echo $row['question_text']; ?></td>
                                            <td><?php echo $row['question_type']; ?></td>
                                            <td><?php echo $row['answer']; ?></td>
                                            <td><?php echo date("d M Y", strtotime($row['date_added'])); ?></td>
                                            <td class="text-center">
                                                <a href="edit_question.php?id=<?php echo $get_id; ?>&quiz_question_id=<?php echo $id; ?>" class="btn btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
					<?php
                        }
                    else {
                    ?>
		                <div class="alert alert-danger text-center m-md-3 m-1">
                            <strong>No Questions Found</strong>
                        </div>
					<?php } ?>
                </div>

            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>

</body>
</html>
