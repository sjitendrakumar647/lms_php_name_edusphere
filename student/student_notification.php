<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<style>
    body {
        background-color: #f8f9fa; /* Light background for better readability */
    }
    .radio-read {
        color: green;
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
                            <li class="breadcrumb-item"><a href="#"><b>Notifications</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                School Year: <strong><?php echo $school_year_query_row['school_year']; ?></strong>
                            </li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <!-- Notifications Section -->
                    <div id="block_bg" class="card shadow-lg">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-bell"></i> Notifications</h5>
                        </div>
                        <div class="card-body">
                            <form action="read.php" method="post">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <button id="delete" class="btn btn-info" name="read">
                                        <i class="bi bi-check-lg"></i> Mark as Read
                                    </button>
                                    <div>
                                        <label class="me-2">Check All</label>
                                        <input type="checkbox" name="selectAll" id="checkAll" />
                                    </div>
                                </div>
                                <script>
                                    document.getElementById("checkAll").addEventListener("click", function () {
                                        const checkboxes = document.querySelectorAll('input[name="selector[]"]');
                                        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                                    });
                                </script>

                                <!-- DataTable Wrapper -->
                                <div class="table-responsive">
                                    <table id="notificationTable" class="table table-borderless">
                                        <!-- Add a <thead> section -->
                                        <thead>
                                            <tr>
                                                <th>Notifications</th> <!-- Single column header for the notifications -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch all notifications for the logged-in student
                                            $query = mysqli_query($conn, "SELECT * FROM teacher_class_student
                                                LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id
                                                LEFT JOIN class ON class.class_id = teacher_class.class_id
                                                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id
                                                JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id
                                                WHERE teacher_class_student.student_id = '$session_id' AND school_year = '$school_year'
                                                ORDER BY notification.date_of_notification DESC") or die(mysqli_error($conn));

                                            $count = mysqli_num_rows($query);
                                            if ($count > 0) {
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $get_id = $row['teacher_class_id'];
                                                    $id = $row['notification_id'];

                                                    // Fetch read status for the notification
                                                    $query_yes_read = mysqli_query($conn, "SELECT * FROM notification_read WHERE notification_id = '$id' AND student_id = '$session_id'") or die(mysqli_error($conn));
                                                    $read_row = mysqli_fetch_array($query_yes_read);

                                                    // Check if the notification is read
                                                    $yes = isset($read_row['student_read']) ? $read_row['student_read'] : 'no';
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="alert alert-light shadow-sm p-3 rounded">
                                                                <?php if ($yes === 'yes') { ?>
                                                                    <!-- Green radio button for read notifications -->
                                                                    <i class="bi bi-circle-fill radio-read me-2"></i>
                                                                <?php } else { ?>
                                                                    <!-- Checkbox for unread notifications -->
                                                                    <input class="form-check-input me-2" type="checkbox" name="selector[]" value="<?php echo $id; ?>">
                                                                <?php } ?>
                                                                <strong class="text-primary"><?php echo $row['firstname'] . " " . $row['lastname']; ?></strong> 
                                                                <?php echo $row['notification']; ?> in 
                                                                <a href="<?php echo $row['link']; ?><?php echo '?id=' . $get_id; ?>" class="text-decoration-none fw-bold">
                                                                    <?php echo $row['class_name']; ?> <?php echo $row['subject_code']; ?>
                                                                </a>
                                                                <span class="float-end text-muted"><i class="bi bi-calendar"></i> <?php echo $row['date_of_notification']; ?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <div class="alert alert-danger text-center p-4">
                                                            <strong>No Notifications Found</strong>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End DataTable Wrapper -->
                            </form>
                        </div>
                    </div>
                    <!-- /Notifications Section -->
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <?php include('footer.php')?>

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#notificationTable').DataTable({
                paging: true,
                searching: true,
                ordering: false, // Disable column sorting
                info: true, // Enable "Showing X of Y entries"
                lengthChange: true, // Enable "Show X entries" dropdown
                pageLength: 10, // Default number of records per page
                lengthMenu: [10, 25, 50, 100] // Options for number of records per page
            });
        });
    </script>
</body>
</html>