<?php
include('header_dashboard.php');
include('session.php');

// Validate and sanitize GET parameters
$get_id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : null;
$class_quiz_id = isset($_GET['class_quiz_id']) ? mysqli_real_escape_string($conn, $_GET['class_quiz_id']) : null;
$quiz_id = isset($_GET['quiz_id']) ? mysqli_real_escape_string($conn, $_GET['quiz_id']) : null;
$quiz_time = isset($_GET['quiz_time']) ? (int)$_GET['quiz_time'] : null;

// Check if required parameters are missing
if (!$get_id || !$class_quiz_id || !$quiz_id || !$quiz_time) {
    die('<script>alert("Missing required parameters."); window.location.href="student_quiz_list.php?id=' . $get_id . '";</script>');
}

// Check if the student has already taken the quiz
$query1 = mysqli_query($conn, "SELECT * FROM student_class_quiz WHERE student_id = '$session_id' AND class_quiz_id = '$class_quiz_id'") or die(mysqli_error($conn));
$count = mysqli_num_rows($query1);
$quiz_data = mysqli_fetch_array($query1);

// If the quiz has already been submitted or the timer is 0, prevent access
if ($count > 0 && (!empty($quiz_data['grade']) || $quiz_data['student_quiz_time'] <= 0)) {
    die('<script>alert("You have already submitted this quiz. You cannot take it again."); window.location.href="student_quiz_list.php?id=' . $get_id . '";</script>');
}

// If the quiz is not yet started, initialize it
if ($count == 0) {
    mysqli_query($conn, "INSERT INTO student_class_quiz (class_quiz_id, student_id, student_quiz_time) VALUES ('$class_quiz_id', '$session_id', '$quiz_time')") or die(mysqli_error($conn));
    $remaining_time = $quiz_time;
} else {
    $remaining_time = $quiz_data['student_quiz_time'];
}
?>

<body>
<?php include('navbar_student.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="span9" id="content">
            <div class="col-md-9">
                <?php
                $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                    WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
                $class_row = mysqli_fetch_array($class_query);
                ?>
                <ul class="breadcrumb">
                    <li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
                    <li><a href="#"><?php echo $class_row['subject_code']; ?></a> <span class="divider">/</span></li>
                    <li><a href="#">School Year: <?php echo $class_row['school_year']; ?></a> <span class="divider">/</span></li>
                    <li><a href="#"><b>Practice Quiz</b></a></li>
                </ul>

                <div id="block_bg" class="block col-md-12">
                    <div class="">
                        <?php if ($_GET['test'] == 'ok') {
                            $sqlp = mysqli_query($conn, "SELECT * FROM class_quiz WHERE class_quiz_id = '$class_quiz_id'") or die(mysqli_error($conn));
                            $rowp = mysqli_fetch_array($sqlp);
                            $x = 0;
                        ?>

                        <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const timerElement = document.getElementById("timer");
                            const messageElement = document.getElementById("msg");
                            const submitButton = document.getElementById("submit-test");
                            const questionInputs = document.querySelectorAll(".questions-table input[type='radio']");
                            let timeLeft = <?php echo $remaining_time; ?>; // Fetch remaining time from PHP

                            // Function to update the timer in the database
                            function updateTimerInDatabase(timeLeft) {
                                fetch("update_timer.php", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/x-www-form-urlencoded",
                                    },
                                    body: `class_quiz_id=<?php echo $class_quiz_id; ?>&student_id=<?php echo $session_id; ?>&time_left=${timeLeft}`,
                                })
                                .then(response => response.text())
                                .then(data => {
                                    if (data !== "success") {
                                        console.error("Failed to update timer in the database:", data);
                                    }
                                })
                                .catch(error => {
                                    console.error("Error updating timer in the database:", error);
                                });
                            }

                            // Countdown timer
                            const countdown = setInterval(() => {
                                if (timeLeft <= 0) {
                                    clearInterval(countdown);

                                    // Disable all inputs and create hidden inputs for their values
                                    questionInputs.forEach(input => {
                                        if (input.checked) {
                                            const hiddenInput = document.createElement("input");
                                            hiddenInput.type = "hidden";
                                            hiddenInput.name = input.name;
                                            hiddenInput.value = input.value;
                                            input.closest("form").appendChild(hiddenInput);
                                        }
                                        input.disabled = true;
                                    });

                                    // Show a message to the student
                                    messageElement.textContent = "Time's up! You can no longer select answers.";

                                    // Show the submit button
                                    submitButton.style.display = "block";

                                    // Prevent further test attempts
                                    updateTimerInDatabase(0);

                                    return;
                                }

                                // Update the timer display
                                const minutes = Math.floor(timeLeft / 60);
                                const seconds = timeLeft % 60;
                                timerElement.textContent = `${minutes}m ${seconds < 10 ? '0' + seconds : seconds}s`;

                                // Update the timer in the database
                                updateTimerInDatabase(timeLeft);

                                timeLeft--;
                            }, 1000);
                        });
                        </script>

                        <form action="take_test.php?id=<?php echo $get_id; ?>&class_quiz_id=<?php echo $class_quiz_id; ?>&test=done&quiz_id=<?php echo $quiz_id; ?>&quiz_time=<?php echo $quiz_time; ?>" method="POST" id="test-form">
                            <input type="hidden" id="quiz-time" value="<?php echo $quiz_time; ?>">
                            <?php
                            $sqla = mysqli_query($conn, "SELECT * FROM class_quiz LEFT JOIN quiz ON quiz.quiz_id = class_quiz.quiz_id WHERE teacher_class_id = '$get_id' ORDER BY date_added DESC") or die(mysqli_error($conn));
                            $rowa = mysqli_fetch_array($sqla);
                            ?>
                            <h3>Test Title: <b><?php echo $rowa['quiz_title']; ?></b></h3>
                            <p><b>Description: <?php echo $rowa['quiz_description']; ?></b></p>
                            <p>Time Remaining: <span id="timer">Loading...</span></p>
                            <div id="msg" class="text-danger fw-bold"></div>

                            <table class="questions-table table">
                                <?php
                                $sqlw = mysqli_query($conn, "SELECT * FROM quiz_question WHERE quiz_id = '$quiz_id' ORDER BY RAND()");
                                $qt = mysqli_num_rows($sqlw);
                                while ($roww = mysqli_fetch_array($sqlw)) {
                                    $x++;
                                ?>
                                <tr id="q_<?php echo $x; ?>" class="questions" style="display: none;">
                                    <td colspan="2">
                                        <div class="card shadow-sm mb-4">
                                            <div class="card-body">
                                                <h5 class="card-title">Question <?php echo $x; ?></h5>
                                                <p class="card-text"><?php echo $roww['question_text']; ?></p>
                                                <hr>
                                                <div class="options">
                                                    <?php
                                                    if ($roww['question_type_id'] == '2') {
                                                        echo '<div class="form-check">
                                                                <input class="form-check-input" type="radio" name="q-' . $roww['quiz_question_id'] . '" value="True" id="q' . $x . '_true">
                                                                <label class="form-check-label" for="q' . $x . '_true">True</label>
                                                              </div>';
                                                        echo '<div class="form-check">
                                                                <input class="form-check-input" type="radio" name="q-' . $roww['quiz_question_id'] . '" value="False" id="q' . $x . '_false">
                                                                <label class="form-check-label" for="q' . $x . '_false">False</label>
                                                              </div>';
                                                    } else if ($roww['question_type_id'] == '1') {
                                                        $sqly = mysqli_query($conn, "SELECT * FROM answer WHERE quiz_question_id = '" . $roww['quiz_question_id'] . "'");
                                                        while ($rowy = mysqli_fetch_array($sqly)) {
                                                            echo '<div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="q-' . $roww['quiz_question_id'] . '" value="' . $rowy['choices'] . '" id="q' . $x . '_choice' . $rowy['choices'] . '">
                                                                    <label class="form-check-label" for="q' . $x . '_choice' . $rowy['choices'] . '">' . $rowy['choices'] . '. ' . $rowy['answer_text'] . '</label>
                                                                  </div>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mt-4 d-flex justify-content-between">
                                                    <button type="button" qn="<?php echo $x; ?>" class="prevq btn btn-secondary" id="prev_<?php echo $x; ?>">Previous</button>
                                                    <button type="button" qn="<?php echo $x; ?>" class="nextq btn btn-success" id="next_<?php echo $x; ?>">Next</button>
                                                </div>
                                                <input type="hidden" name="x-<?php echo $x; ?>" value="<?php echo $roww['quiz_question_id']; ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>

                            <br>
                            <div style="text-align: center;">
                                <button class="btn btn-info" id="submit-test" name="submit_answer" style="display: none;"><i class="icon-check"></i> Submit Answer</button>
                            </div>
                            <input type="hidden" name="x" value="<?php echo $x; ?>">
                        </form>

                        <?php } else if (isset($_POST['submit_answer'])) {
                            $x1 = $_POST['x'];
                            $score = 0;

                            for ($x = 1; $x <= $x1; $x++) {
                                $x2 = $_POST["x-$x"];
                                $q = isset($_POST["q-$x2"]) ? $_POST["q-$x2"] : null;

                                if ($q !== null) {
                                    $sql = mysqli_query($conn, "SELECT * FROM quiz_question WHERE quiz_question_id = $x2");
                                    $row = mysqli_fetch_array($sql);
                                    if ($row['answer'] == $q) {
                                        $score++;
                                    }
                                }
                            }

                            // Update the student's grade in the database
                            mysqli_query($conn, "UPDATE student_class_quiz SET `student_quiz_time` = 0, `grade` = '$score out of " . ($x - 1) . "' WHERE student_id = '$session_id' AND class_quiz_id = '$class_quiz_id'") or die(mysqli_error($conn));

                            // Redirect to the quiz list with a success message
                            echo "<script>
                                alert('Your score is $score out of " . ($x - 1) . ". You cannot take this quiz again.');
                                window.location = 'student_quiz_list.php?id=$get_id';
                            </script>";
                            exit();
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Added Script for Next/Previous -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".questions");
    const totalQuestions = questions.length;
    let currentQuestion = 0;

    function showQuestion(index) {
        questions.forEach((q, i) => {
            q.style.display = (i === index) ? "table-row" : "none";
        });

        // Hide submit button until the last question
        if (index === totalQuestions - 1) {
            document.getElementById("submit-test").style.display = "block";
        } else {
            document.getElementById("submit-test").style.display = "none";
        }
    }

    showQuestion(currentQuestion);

    document.querySelectorAll(".nextq").forEach(button => {
        button.addEventListener("click", function () {
            if (currentQuestion < totalQuestions - 1) {
                currentQuestion++;
                showQuestion(currentQuestion);
            }
        });
    });

    document.querySelectorAll(".prevq").forEach(button => {
        button.addEventListener("click", function () {
            if (currentQuestion > 0) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        });
    });
});
</script>

<?php include('footer.php'); ?>
</body>
</html>
