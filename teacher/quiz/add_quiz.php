<?php include('../header_dashboard.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-md-9 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-3 rounded">
                        <?php
							$school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
							$school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item active">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                        <li class="breadcrumb-item active"><b>Quiz</b></li>
                    </ol>
                </nav>

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Quiz</h5>
                        <a href="teacher_quiz.php" class="btn btn-light">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="quizTitle" class="form-label">Quiz Title</label>
                                <input type="text" name="quiz_title" id="quizTitle" class="form-control" placeholder="Enter Quiz Title" required>
                            </div>

                            <div class="mb-3">
                                <label for="quizDescription" class="form-label">Quiz Description</label>
                                <textarea class="form-control" name="description" id="quizDescription" rows="3" placeholder="Enter Quiz Description" required></textarea>
                            </div>

                            <button type="submit" name="save" class="btn btn-success">
                                <i class="bi bi-save"></i> Save
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['save'])) {
                            $quiz_title = $_POST['quiz_title'];
                            $description = $_POST['description'];

                            mysqli_query($conn, "INSERT INTO quiz (quiz_title, quiz_description, date_added, teacher_id) 
                                VALUES ('$quiz_title', '$description', NOW(), '$session_id')") or die(mysqli_error());
                        ?>
                            <script>
                                alert("Quiz Successfully Added!");
                                window.location = 'teacher_quiz.php';
                            </script>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>

</body>
</html>
