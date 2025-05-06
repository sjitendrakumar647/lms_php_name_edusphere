<?php include('../header_dashboard.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $quiz_question_id = $_GET['quiz_question_id']; ?>

<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-md-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between">
                        <h5 class="mb-0">Edit Quiz Question</h5>
                        <a href="quiz_question.php?id=<?php echo $get_id; ?>" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM quiz_question 
                            LEFT JOIN question_type ON quiz_question.question_type_id = question_type.question_type_id 
                            WHERE quiz_id = '$get_id' AND quiz_question_id = '$quiz_question_id' 
                            ORDER BY date_added DESC") or die(mysqli_error());

                        $row = mysqli_fetch_array($query);
                        ?>

                        <form method="post">
                            <!-- Question Input -->
                            <div class="mb-3">
                                <label class="form-label">Question</label>
                                <textarea name="question" id="ckeditor_full" class="form-control" required><?php echo $row['question_text']; ?></textarea>
                            </div>

                            <!-- Question Type Selection -->
                            <div class="mb-3">
                                <label class="form-label">Question Type:</label>
                                <select id="qtype" name="question_type" class="form-select" required>
                                    <option value="<?php echo $row['question_type_id']; ?>" selected>
                                        <?php echo $row['question_type']; ?>
                                    </option>
                                    <?php
                                    $query_question = mysqli_query($conn, "SELECT * FROM question_type") or die(mysqli_error());
                                    while ($query_question_row = mysqli_fetch_array($query_question)) {
                                    ?>
                                        <option value="<?php echo $query_question_row['question_type_id']; ?>">
                                            <?php echo $query_question_row['question_type']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Answer Options -->
                            <div id="opt11" class="mb-3">
							<?php
								// Initialize answer variables to prevent undefined variable warnings
								$a = $b = $c = $d = '';
								$correct_answer = '';

								// Fetch answers from the database
								$sqlz = mysqli_query($conn, "SELECT * FROM answer WHERE quiz_question_id = '$quiz_question_id'");
								while ($rowz = mysqli_fetch_array($sqlz)) {
									// Check if the 'choice' key exists before accessing it
									if (isset($rowz['choice'])) {
										if ($rowz['choice'] == 'A') {
											$a = $rowz['value'];
										} else if ($rowz['choice'] == 'B') {
											$b = $rowz['value'];
										} else if ($rowz['choice'] == 'C') {
											$c = $rowz['value'];
										} else if ($rowz['choice'] == 'D') {
											$d = $rowz['value'];
										}
									}

									// Check if the 'correct' key exists before accessing it
									if (isset($rowz['correct']) && $rowz['correct'] == 1) {
										$correct_answer = $rowz['choice'];
									}
								}
							?>
                            <!-- Multiple Choice Options -->
                                <label class="form-label">Options:</label>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">A</span>
                                    <input type="text" name="ans1" class="form-control" value="<?php echo $a; ?>">
                                    <input name="answer" value="A" class="form-check-input ms-2" type="radio" <?php if ($correct_answer == 'A') echo 'checked'; ?>>
                                </div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">B</span>
                                    <input type="text" name="ans2" class="form-control" value="<?php echo $b; ?>">
									<input name="answer" value="B" class="form-check-input ms-2" type="radio" <?php if ($correct_answer == 'B') echo 'checked'; ?>>
								</div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">C</span>
                                    <input type="text" name="ans3" class="form-control" value="<?php echo $c; ?>">
									<input name="answer" value="C" class="form-check-input ms-2" type="radio" <?php if ($correct_answer == 'C') echo 'checked'; ?>>
								</div>
                                <div class="input-group mb-2">
                                    <span class="input-group-text">D</span>
                                    <input type="text" name="ans4" class="form-control" value="<?php echo $d; ?>">
									<input name="answer" value="D" class="form-check-input ms-2" type="radio" <?php if ($correct_answer == 'D') echo 'checked'; ?>>
								</div>
                            </div>

                            <!-- True/False Option -->
                            <div id="opt12" class="mb-3">
                                <label class="form-label">Select Answer:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correctt" value="True" <?php if ($row['answer'] == 'True') echo 'checked'; ?>>
                                    <label class="form-check-label">True</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="correctt" value="False" <?php if ($row['answer'] == 'False') echo 'checked'; ?>>
                                    <label class="form-check-label">False</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button name="save" type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Save
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['save'])) {
                            $question = $_POST['question'];
                            $type = $_POST['question_type'];


                            if ($type == '2') {
								$correctt = $_POST['correctt'];
                                // mysqli_query($conn, "INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id) 
                                //     VALUES ('$get_id', '$question', NOW(), '$correctt', '$type')") or die(mysqli_error());
								mysqli_query($conn, "UPDATE quiz_question 
									SET question_text = '$question', answer = '$correctt', question_type_id = '$type' 
									WHERE quiz_question_id = '$quiz_question_id'") or die(mysqli_error($conn));
                            } else {
								$answer = $_POST['answer'];
								$ans1 = $_POST['ans1'];
								$ans2 = $_POST['ans2'];
								$ans3 = $_POST['ans3'];
								$ans4 = $_POST['ans4'];
                                // mysqli_query($conn, "INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id) 
                                //     VALUES ('$get_id', '$question', NOW(), '$answer', '$type')") or die(mysqli_error());
								        // Update the quiz question
										mysqli_query($conn, "UPDATE quiz_question 
										SET question_text = '$question', answer = '$answer', question_type_id = '$type' 
										WHERE quiz_question_id = '$quiz_question_id'") or die(mysqli_error($conn));

										
                            }

                            echo '<script>window.location = "quiz_question.php?id=' . $get_id . '";</script>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Handling Question Type -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let opt11 = document.getElementById("opt11");
            let opt12 = document.getElementById("opt12");
            let qtype = document.getElementById("qtype");

            opt11.style.display = "none";
            opt12.style.display = "none";

            qtype.addEventListener("change", function () {
                let selectedValue = this.value;
                opt11.style.display = selectedValue === "1" ? "block" : "none";
                opt12.style.display = selectedValue === "2" ? "block" : "none";
            });
        });
    </script>

    <?php include('../footer.php'); ?>
</body>
</html>
