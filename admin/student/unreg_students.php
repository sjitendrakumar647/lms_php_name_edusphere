<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid mt-4">
        <div class="row mt-4">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Add Student Form -->
            
                
            <div class="col-lg-4 col-md-5 mt-5">
                <?php include('add_students.php'); ?>
            </div>
                
            

            <!-- Student List -->
            <div class="col-lg-5 col-md-7 mt-5">
                
                    
                    <div class="card-body">
                        <div id="studentTableDiv">
                            <?php include('student_table_unreg.php'); ?>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete the selected students?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>
</body>

</html>
