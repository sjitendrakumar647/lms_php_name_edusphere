<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body class="vh-100 d-flex flex-column bg-light">
    <?php include('navbar_teacher.php'); ?>

    <div class="container-fluid flex-grow-1 mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>

            <div class="col-lg-9 mt-5">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Upload Downloadable File</h5>
                        <a href="#" class="btn btn-light btn-sm">My Class</a>
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
                            </ol>
                        </nav>

                        <form id="add_downloadable" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4 card shadow-sm p-3">
                                    <div class="mb-3">
                                        <label class="form-label">File Upload:</label>
                                        <input type="file" name="uploaded_file" class="form-control" required>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                        <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="name" placeholder="File Name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="desc" placeholder="Description" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <div class="alert alert-info">Check the class you want to add this file to.</div>
                                    <div class="mb-3">
                                        <input type="checkbox" id="checkAll" class="form-check-input"> 
                                        <label for="checkAll">Select All</label>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th></th>
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
                                                    <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>" class="form-check-input"></td>
                                                    <td><?php echo $row['class_name']; ?></td>
                                                    <td><?php echo $row['subject_code']; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" name="Upload" class="btn btn-success">
                                    <i class="bi bi-upload"></i> Upload
                                </button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("checkAll").addEventListener("click", function () {
                document.querySelectorAll('input[name="selector[]"]').forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
        
            document.getElementById("add_downloadable").addEventListener("submit", function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                
                fetch("add_downloadable_save.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    alert("File Uploaded Successfully");
                    window.location = "add_downloadable.php";
                })
                .catch(error => console.error("Error:", error));
            });
        });
    </script>

    <?php include('footer.php'); ?>
</body>
</html>
