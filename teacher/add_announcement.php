<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body id="class_div">
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-md-9" id="content">
                <div class="row">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php
                            $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                            $school_year_query_row = mysqli_fetch_array($school_year_query);
                            ?>
                            <li class="breadcrumb-item"><a href="#"><b>My Class</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page">School Year: <?php echo $school_year_query_row['school_year']; ?></li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                    
                    <!-- Block -->
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Add Announcement</h5>
                        </div>
                        <div class="card-body p-md-3 p-lg-3 p-0 pb-3">
                            <form id="add_downloadable" method="post">
                                <label for="ckeditor_full" class="fs-5">Enter Announcement:</label>
                                <div class="mb-3">
                                    <textarea rows="10" name="content" id="ckeditor_full" class="form-control alert alert-warning border border-warning" placeholder="Enter announcement that to be added.."></textarea>
                                </div>
                                <script>
                                    // jQuery(document).ready(function($){
                                    //     $("#add_downloadable").submit(function(e){
                                    //         e.preventDefault();
                                    //         var formData = $(this).serialize();
                                    //         $.ajax({
                                    //             type: "POST",
                                    //             url: "add_announcement_save.php",
                                    //             data: formData,
                                    //             success: function(html){
                                    //                 $.jGrowl("Student Successfully Added", { header: 'Success' });
                                    //                 window.location = 'add_announcement.php';
                                    //             }
                                    //         });
                                    //     });
                                    // });
                                    document.addEventListener("DOMContentLoaded", function () {
                                        document.getElementById("add_downloadable").addEventListener("submit", async function (e) {
                                            e.preventDefault();

                                            let formData = new FormData(this);

                                            try {
                                                let response = await fetch("add_announcement_save.php", {
                                                    method: "POST",
                                                    body: formData
                                                });

                                                if (response.ok) {
                                                    alert("Student Successfully Added"); // Replace jGrowl with a simple alert
                                                    window.location = "add_announcement.php";
                                                } else {
                                                    console.error("Error in submission");
                                                }
                                            } catch (error) {
                                                console.error("Request failed", error);
                                            }
                                        });
                                    });

                                </script>
                                
                                <div class="alert alert-info">Check the class you want to include this announcement for.</div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="checkAll">
                                    <label class="form-check-label" for="checkAll">Check All</label>
                                </div>
                                <script>
                                    $("#checkAll").click(function () {
                                        $('input:checkbox').not(this).prop('checked', this.checked);
                                    });
                                </script>
                                
                                <table class="table table-striped table-bordered">
                                    <thead class="table-dark">
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
                                            WHERE teacher_id = '$session_id' AND school_year = '$school_year'") or die(mysqli_error($conn));
                                        while($row = mysqli_fetch_array($query)){
                                            $id = $row['teacher_class_id'];
                                        ?>
                                        <tr>
                                            <td>
                                                <input class="form-check-input" type="checkbox" name="selector[]" value="<?php echo $id; ?>">
                                            </td>
                                            <td><?php echo $row['class_name']; ?></td>
                                            <td><?php echo $row['subject_code']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success w-50"><i class="bi bi-check-lg"></i> Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /Block -->
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
