<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body class="">
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-lg-9 mt-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Notifications</h5>
                    </div>
                    <div class="card-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <?php
                                $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                                $school_year_query_row = mysqli_fetch_array($school_year_query);
                                ?>
                                <li class="breadcrumb-item"><a href="#">My Class</a></li>
                                <li class="breadcrumb-item">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                                <li class="breadcrumb-item active" aria-current="page">Notification</li>
                            </ol>
                        </nav>

                        <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <input type="checkbox" id="checkAll" class="form-check-input"> <label for="checkAll">Check All</label>
                            </div>
                            <?php if ($not_read != '0') { ?>
                                <button class="btn btn-info" name="read"><i class="bi bi-check-lg"></i> Mark as Read</button>
                            <?php } ?>
                        </div>

                        <script>
                            document.getElementById("checkAll").addEventListener("click", function () {
                                let checkboxes = document.querySelectorAll('input[name="selector[]"]');
                                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                            });
                        </script> -->

                        <form id="domainTable" action="read_teacher.php" method="post">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM teacher_notification
                                LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_notification.teacher_class_id
                                LEFT JOIN student ON student.student_id = teacher_notification.student_id
                                LEFT JOIN assignment ON assignment.assignment_id = teacher_notification.assignment_id
                                LEFT JOIN class ON teacher_class.class_id = class.class_id
                                LEFT JOIN subject ON teacher_class.subject_id = subject.subject_id
                                WHERE teacher_class.teacher_id = '$session_id' ORDER BY teacher_notification.date_of_notification DESC")
                                or die(mysqli_error());

                            while ($row = mysqli_fetch_array($query)) {
                                $assignment_id = $row['assignment_id'];
                                $get_id = $row['teacher_class_id'];
                                $id = $row['teacher_notification_id'];

								$query_yes_read = mysqli_query($conn,"SELECT * FROM notification_read_teacher WHERE notification_id = '$id' AND teacher_id = '$session_id'") or die(mysqli_error());
								$read_row = mysqli_fetch_array($query_yes_read);
								
								// Check if a row exists before accessing array elements
								$yes = $read_row ? $read_row['student_read'] : 'no';
                            ?>
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <!-- <?php if ($yes != 'yes') { ?>
                                                    <input type="checkbox" name="selector[]" value="<?php echo $id; ?>" class="form-check-input">
                                                <?php } ?> -->
												<input type="radio" name="" id="" checked>
                                                <strong class="text-primary"><?php echo $row['firstname'] . " " . $row['lastname']; ?></strong>
                                                <?php echo $row['notification']; ?> in 
												<!-- <b><?php echo $row['fname']; ?></b> -->
												<a href="<?php echo $row['link']; ?>?id=<?php echo $get_id; ?>&post_id=<?php echo $assignment_id; ?>" class="text-decoration-none text-primary">
                                            		<?php echo $row['class_name']; ?> - <?php echo $row['subject_code']; ?>
                                        		</a>
                                            </div>
                                            <div class="text-muted small">
                                                <i class="bi bi-calendar"></i> <?php echo $row['date_of_notification']; ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
