<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
    <?php include('../navbar.php'); ?>
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Edit Teacher Form -->
            <div class="col-lg-4 mt-5">
                <?php include('edit_teacher_form.php'); ?>
            </div>

            
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel"><i class="bi bi-exclamation-triangle"></i> Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure you want to delete the selected teachers?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="deleteForm" name="delete_teacher" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>

    <script>
        // Select All Checkbox
        document.getElementById('selectAll').addEventListener('change', function () {
            document.querySelectorAll('.selectItem').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
</body>
</html>