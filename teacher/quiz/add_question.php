<?php 
include('../header_dashboard.php'); 
include('../session.php'); 
$get_id = $_GET['id'];
?>

<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-3 rounded">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                        <li class="breadcrumb-item active"><b>Quiz Question</b></li>
                    </ol>
                </nav>

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Quiz Question</h5>
                        <a href="quiz_question.php?id=<?php echo $get_id; ?>" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <textarea name="question" id="question" class="form-control" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="qtype" class="form-label">Question Type</label>
                                <select id="qtype" name="question_type" class="form-select" required>
                                    <option value="" disabled selected>Select Type</option>
                                    <?php
                                    $query_question = mysqli_query($conn, "SELECT * FROM question_type") or die(mysqli_error($conn));
                                    while ($query_question_row = mysqli_fetch_array($query_question)) {
                                    ?>
                                        <option value="<?php echo $query_question_row['question_type_id']; ?>">
                                            <?php echo $query_question_row['question_type']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Multiple Choice Options -->
                            <div id="multiple_choice" class="mb-3" style="display: none;">
                                <label class="form-label">Options</label>
                                <div class="form-check">
                                    <input type="text" name="ans1" class="form-control mb-2" placeholder="Option A">
                                    <input name="answer" value="A" type="radio" class="form-check-input"> A
                                </div>
                                <div class="form-check">
                                    <input type="text" name="ans2" class="form-control mb-2" placeholder="Option B">
                                    <input name="answer" value="B" type="radio" class="form-check-input"> B
                                </div>
                                <div class="form-check">
                                    <input type="text" name="ans3" class="form-control mb-2" placeholder="Option C">
                                    <input name="answer" value="C" type="radio" class="form-check-input"> C
                                </div>
                                <div class="form-check">
                                    <input type="text" name="ans4" class="form-control mb-2" placeholder="Option D">
                                    <input name="answer" value="D" type="radio" class="form-check-input"> D
                                </div>
                            </div>

                            <!-- True/False Options -->
                            <div id="true_false" class="mb-3" style="display: none;">
                                <label class="form-label">Select Correct Answer</label>
                                <div class="form-check">
                                    <input name="correctt" value="True" type="radio" class="form-check-input"> True
                                </div>
                                <div class="form-check">
                                    <input name="correctt" value="False" type="radio" class="form-check-input"> False
                                </div>
                            </div>

                            <button name="save" type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> Save Question
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['save'])) {
                            $question = mysqli_real_escape_string($conn, $_POST['question']);
                            $type = $_POST['question_type'];

                            if ($type == '2') { // True/False
                                $correctt = $_POST['correctt'];
                                $stmt = mysqli_prepare($conn, "INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id) VALUES (?, ?, NOW(), ?, ?)");
                                mysqli_stmt_bind_param($stmt, 'issi', $get_id, $question, $correctt, $type);
                                mysqli_stmt_execute($stmt);
                            } else { // Multiple Choice
                                $answer = $_POST['answer'];
                                $ans1 = $_POST['ans1'];
                                $ans2 = $_POST['ans2'];
                                $ans3 = $_POST['ans3'];
                                $ans4 = $_POST['ans4'];

                                $stmt = mysqli_prepare($conn, "INSERT INTO quiz_question (quiz_id, question_text, date_added, answer, question_type_id) VALUES (?, ?, NOW(), ?, ?)");
                                mysqli_stmt_bind_param($stmt, 'issi', $get_id, $question, $answer, $type);
                                mysqli_stmt_execute($stmt);

                                $quiz_question_id = mysqli_insert_id($conn);

                                $answers = [
                                    ['text' => $ans1, 'choice' => 'A'],
                                    ['text' => $ans2, 'choice' => 'B'],
                                    ['text' => $ans3, 'choice' => 'C'],
                                    ['text' => $ans4, 'choice' => 'D'],
                                ];

                                foreach ($answers as $ans) {
                                    $stmt = mysqli_prepare($conn, "INSERT INTO answer (quiz_question_id, answer_text, choices) VALUES (?, ?, ?)");
                                    mysqli_stmt_bind_param($stmt, 'iss', $quiz_question_id, $ans['text'], $ans['choice']);
                                    mysqli_stmt_execute($stmt);
                                }
                            }
                            echo "<script>window.location = 'quiz_question.php?id=$get_id';</script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("qtype").addEventListener("change", function () {
                let type = this.value;
                document.getElementById("multiple_choice").style.display = type == "1" ? "block" : "none";
                document.getElementById("true_false").style.display = type == "2" ? "block" : "none";
            });
        });
    </script>

    <?php include('../footer.php'); ?>
</body>
</html>
