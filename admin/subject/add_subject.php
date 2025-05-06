<!-- Add Subject -->
<div class="add_subject">
                                <div class="card">
                                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                
                                        <h5 class="mb-0 display-6 d-md-block d-lg-none fw-bold">➕ Add Subject</h5> <!-- Medium: display-6 -->
                                        <h5 class="mb-0 d-none d-lg-block">➕ Add Subject</h5> <!-- Large: display-4 -->
                                    </div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label class="form-label">Subject Code</label>
                                                <input type="text" class="form-control" name="subject_code" placeholder="Enter Subject Code" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Subject Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Enter Subject Title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Number of Units</label>
                                                <input type="number" class="form-control" name="unit" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="description" rows="3"></textarea>
                                            </div>
                                            <button type="submit" name="save" class="btn btn-success w-100">
                                                <i class="bi bi-save"></i> Submit
                                            </button>
                                        </form>

                                        <!-- PHP Logic to Save Subject -->
                                        <?php
                                        if (isset($_POST['save'])) {
                                            $subject_code = $_POST['subject_code'];
                                            $title = $_POST['title'];
                                            $unit = $_POST['unit'];
                                            $description = $_POST['description'];

                                            $query = mysqli_query($conn, "SELECT * FROM subject WHERE subject_code = '$subject_code'") or die(mysqli_error($conn));
                                            $count = mysqli_num_rows($query);

                                            if ($count > 0) {
                                                echo "<script>alert('Data Already Exists');</script>";
                                            } else {
                                                mysqli_query($conn, "INSERT INTO subject (subject_code, subject_title, description, unit) 
                                                    VALUES ('$subject_code', '$title', '$description', '$unit')") or die(mysqli_error($conn));

                                                mysqli_query($conn, "INSERT INTO activity_log (date, username, action) 
                                                    VALUES (NOW(), '$user_username', 'Added Subject $subject_code')") or die(mysqli_error($conn));

                                                echo "<script>window.location = 'subjects.php';</script>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>