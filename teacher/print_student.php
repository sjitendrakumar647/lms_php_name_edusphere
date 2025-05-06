<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-lg-9 mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-primary">Print Student List</h4>
                    <button id="print" onclick="window.print()" class="btn btn-success btn-sm">
                        <i class="bi bi-printer"></i> Print Student List
                    </button>
                </div>

                <!-- Breadcrumb -->
				<?php
				$class_query = mysqli_query($conn, "SELECT * FROM teacher_class
					LEFT JOIN class ON class.class_id = teacher_class.class_id
					LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
					WHERE teacher_class_id = '$get_id'") or die(mysqli_error($conn));
				$class_row = mysqli_fetch_array($class_query);
				?>

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="#" class="text-decoration-none"><?php echo htmlspecialchars($class_row['class_name']); ?></a>
						</li>
						<li class="breadcrumb-item">
							<a href="#" class="text-decoration-none"><?php echo htmlspecialchars($class_row['subject_code']); ?></a>
						</li>
						<li class="breadcrumb-item">
							<a href="#" class="text-decoration-none">School Year: <?php echo htmlspecialchars($class_row['school_year']); ?></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">My Students</li>
					</ol>
				</nav>

                <!-- Student List Table -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Students in Class</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $my_student = mysqli_query($conn, "SELECT * FROM teacher_class_student
                                        LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
                                        INNER JOIN class ON class.class_id = student.class_id 
                                        WHERE teacher_class_id = '$get_id' ORDER BY lastname") or die(mysqli_error($conn));
                                    while ($row = mysqli_fetch_array($my_student)) {
                                        $id = $row['teacher_class_student_id'];
                                    ?>
                                        <tr id="del<?php echo $id; ?>">
                                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>