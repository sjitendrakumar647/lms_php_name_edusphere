<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body id="class_div">
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid">
        <div class="row mt-5">
			<?php include('teacher_sidebar.php'); ?>
            <div class="col-lg-9 mx-auto mt-5">
                
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light rounded">
                        <?php
                        $school_year_query = mysqli_query($conn,"SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page">School Year: <?php echo $school_year; ?></li>
                    </ol>
                </nav>

                <!-- Add Class Section -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add Class</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" id="add_class">
                            <div class="mb-3">
                                <label class="form-label">Class Name:</label>
                                <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                                <select name="class_id" class="form-select" required>
                                    <option value="">Select Class</option>
                                    <?php
                                    $query = mysqli_query($conn,"SELECT * FROM class ORDER BY class_name");
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Subject:</label>
                                <select name="subject_id" class="form-select" required>
                                    <option value="">Select Subject</option>
                                    <?php
                                    $query = mysqli_query($conn,"SELECT * FROM subject ORDER BY subject_code");
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_title']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">School Year:</label>
                                <?php
                                $query = mysqli_query($conn,"SELECT * FROM school_year ORDER BY school_year DESC");
                                $row = mysqli_fetch_array($query);
                                ?>
                                <input type="text" class="form-control" name="school_year" value="<?php echo $row['school_year']; ?>" readonly>
                            </div>
                            
                            <div class="mb-3 text-center">
                                <button type="submit" name="save" class="btn btn-success w-50"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>

				<!-- My Classes Section -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">My Classes</h5>
                    </div>
                    <div class="card-body">
                        <?php include('teacher_class.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
	<script>
		// add class
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("add_class").addEventListener("submit", function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                fetch("add_class_action.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    if (html === "true") {
                        alert("Class Already Exists");
                    } else {
                        alert("Class Successfully Added");
                        setTimeout(() => { window.location = 'dashboard_teacher.php'; }, 500);
                    }
                })
                .catch(error => console.error('Error:', error));
            });

			// delete class
			document.querySelectorAll(".remove").forEach(button => {
				button.addEventListener("click", function () {
					let id = this.getAttribute("data-class-id");
					
					fetch("delete_class.php", {
						method: "POST",
						headers: { "Content-Type": "application/x-www-form-urlencoded" },
						body: `id=${id}`
					})
					.then(response => response.text())
					.then(html => {
						if (html.trim() === "success") {
							window.location.reload();
						} else {
							//alert("Failed to delete class. Please try again.");
							window.location = 'dashboard_teacher.php';
						}
					})
					.catch(error => console.error('Error:', error));
				});
			});

        });
    </script>
</body>
</html>
