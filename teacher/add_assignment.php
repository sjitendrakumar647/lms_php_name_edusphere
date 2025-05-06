<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body id="class_div">
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-md-9 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                    </ol>
                </nav>
                
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Upload Assignment</h5>
                    </div>
                    <div class="card-body">
                        <form id="add_downloadble" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fileInput" class="form-label">File</label>
                                <input name="uploaded_file" class="form-control" id="fileInput" type="file" required>
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                <input type="hidden" name="id" value="<?php echo $session_id ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">File Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter file name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="assigntextare" name="desc" class="form-control alert alert-warning border border-warning" rows="5" placeholder="Enter description" required></textarea>
                            </div>
                        
                        
                        
                            <div class="alert alert-info">Select the class you want to assign this file to.</div>

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label" for="checkAll">Check All</label>
                            </div>

                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Select</th>
                                        <th>Class Name</th>
                                        <th>Subject Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM teacher_class
                                        LEFT JOIN class ON class.class_id = teacher_class.class_id
                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                        WHERE teacher_id = '$session_id' AND school_year = '$school_year'") or die(mysqli_error());
                                    
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id = $row['teacher_class_id'];
                                    ?>
                                        <tr>
                                            <td><input type="checkbox" class="form-check-input" name="selector[]" value="<?php echo $id; ?>"></td>
                                            <td><?php echo $row['class_name']; ?></td>
                                            <td><?php echo $row['subject_code']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success"><i class="bi bi-upload"></i> Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("add_downloadble").addEventListener("submit", function (e) {
                e.preventDefault();
                
                alert("Uploading File Please Wait......");

                let formData = new FormData(this);

                fetch("add_assignment_save.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(() => {
                    alert("Assignment Successfully Added");
                    window.location = "add_assignment.php";
                })
                .catch(error => console.error("Error:", error));
            });

            // Select "Check All" checkbox
            const checkAll = document.getElementById("checkAll");
            const checkboxes = document.querySelectorAll("input[name='selector[]']");

            // Toggle all checkboxes when "Check All" is clicked
            checkAll.addEventListener("change", function () {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkAll.checked;
                });
            });
        });

    </script>
    <?php include('footer.php'); ?>
</body>

</html>
