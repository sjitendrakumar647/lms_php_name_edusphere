<?php 
include('../header_dashboard.php'); 
include('../session.php'); 
include('../dbcon.php'); 
?>

<body>
    <?php include('navbar_teacher.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <?php include('teacher_sidebar.php'); ?>
            <div class="col-md-9 mt-5" id="content">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="card mb-3 p-1 shadow-sm">
                        <ol class="breadcrumb">
                        <?php
                        $school_year_query = mysqli_query($conn, "SELECT * FROM school_year ORDER BY school_year DESC") or die(mysqli_error($conn));
                        $school_year_row = mysqli_fetch_array($school_year_query);
                        ?>
                        <li><a href="#"><b>My Class</b></a> <span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_row['school_year']; ?></a> <span class="divider">/</span></li>
                        <li><a href="#"><b>Quiz</b></a></li>
                        </ol>
                    </nav>
                <!-- End Breadcrumb -->
                    
                    <!-- Block -->
                    <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-right"></div>
                        </div>
                        <div class="block-content in">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <!-- <a href="add_quiz.php" class="btn btn-info"><i class="bi bi-trash"></i> Add Quiz</a>
                                    <a href="add_quiz_to_class.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Quiz to Class</a> -->
                                </div>
                                
                                <form action="delete_quiz.php" method="post">
                                    
                                    <a href="add_quiz.php" class="btn btn-info"><i class="bi bi-trash"></i> Add Quiz</a>
                                    <a href="add_quiz_to_class.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Quiz to Class</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#backup_delete"><i class="bi bi-trash"></i> Delete</a>
                                    <div class="card">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="quiz_table">
                                            
                                            <!-- Delete Quiz Modal -->
                                            <div class="modal fade" id="backup_delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title" id="deleteModalLabel"><i class="bi bi-trash"></i> Delete Quiz?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Modal Body -->
                                                        <div class="modal-body text-center">
                                                            <div class="alert alert-danger">
                                                                <p class="mb-0">Are you sure you want to delete the selected Quiz?</p>
                                                            </div>
                                                        </div>
                                                        <!-- Modal Footer -->
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                                <i class="bi bi-x-circle"></i> Close
                                                            </button>
                                                            <button name="backup_delete" class="btn btn-danger">
                                                                <i class="bi bi-check-circle"></i> Yes, Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <thead>
                                                <tr>
                                                    <th>Quiz</th>
                                                </tr>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Quiz Title</th>
                                                    <th>Description</th>
                                                    <th>Date Added</th>
                                                    <th>Questions</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($conn, "SELECT * FROM quiz WHERE teacher_id = '$session_id' ORDER BY date_added DESC") or die(mysqli_error($conn));
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $id = $row['quiz_id'];
                                                ?>
                                                    <tr id="del<?php echo $id; ?>">
                                                        <td><input type="checkbox" name="selector[]" value="<?php echo $id; ?>"></td>
                                                        <td><?php echo $row['quiz_title']; ?></td>
                                                        <td><?php echo $row['quiz_description']; ?></td>
                                                        <td><?php echo $row['date_added']; ?></td>
                                                        <td><a href="quiz_question.php?id=<?php echo $id; ?>">Questions</a></td>
                                                        <td>
                                                            <a href="edit_quiz.php?id=<?php echo $id; ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Block -->
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>
</body>
</html>
