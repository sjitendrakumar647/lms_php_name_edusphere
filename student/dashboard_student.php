<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<style>
    body {
        background-color: #f8f9fa; /* Light background for better readability */
    }
</style>

<body>
    <?php include('navbar_student.php'); ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar (Left Side) -->
            <div class="col-md-3">
                <?php include('student_sidebar.php'); ?>
            </div>

            <!-- Main Content (Right Side) -->
            <div class="col-md-9" id="content">
                <div class="row">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="card mb-3">
                        <ol class="breadcrumb bg-light p-2 rounded">
                            <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                School Year: <strong><?php echo $school_year_query_row['school_year']; ?></strong>
                            </li>
                        </ol>
                    </nav>

                    <!-- Enrolled Classes Section -->
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            <h5><i class="bi bi-journal-bookmark"></i> Enrolled Classes</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM teacher_class_student
                                    LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id
                                    LEFT JOIN class ON class.class_id = teacher_class.class_id
                                    LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                    LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                                    WHERE student_id = '$session_id' AND school_year = '$school_year'") or die(mysqli_error());

                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_array($query)) {
                                ?>
                                        <div class="col-md-3"> <!-- Adjusted column size to make cards smaller -->
                                            <div class="card mb-3 shadow-sm" style="height: 100%;"> <!-- Added height adjustment for consistency -->
                                                <img src="images/classroom.jpg" class="card-img-top" alt="Class Thumbnail" style="height: 120px; object-fit: cover;"> <!-- Adjusted image height -->
                                                <div class="card-body p-2"> <!-- Reduced padding -->
                                                    <h6 class="card-title text-truncate"><?php echo $row['class_name']; ?></h6> <!-- Truncated long titles -->
                                                    <p class="card-text mb-1"><strong>Subject:</strong> <?php echo $row['subject_title']; ?></p>
                                                    <p class="card-text mb-1"><strong>Teacher:</strong> <?php echo $row['firstname'] . " " . $row['lastname']; ?></p>
                                                    <a href="my_classmates.php?id=<?php echo $row['teacher_class_id']; ?>" class="btn btn-primary btn-sm w-100">View Class</a> <!-- Full-width button -->
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } else { ?>
                                    <div class="col-12 text-center">
                                        <div class="alert alert-info">You are currently not enrolled in any class.</div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include('footer.php')?>
</body>
</html>
