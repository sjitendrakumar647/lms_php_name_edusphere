<ul id="da-thumbs" class="list-unstyled d-flex flex-wrap gap-3">
    <?php 
    $query = mysqli_query($conn, "SELECT * FROM teacher_class
        LEFT JOIN class ON class.class_id = teacher_class.class_id
        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
        WHERE teacher_id = '$session_id' AND school_year = '$school_year'") or die(mysqli_error());
    $count = mysqli_num_rows($query);
    
    if ($count > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['teacher_class_id'];
    ?>
        <li id="del<?php echo $id; ?>" class="card shadow-sm p-3" style="width: 200px;">
            <a href="my_students.php<?php echo '?id=' . $id; ?>" class="text-decoration-none text-dark d-flex flex-column">
                <img src="<?php echo $row['thumbnails']; ?>" class="img-fluid rounded shadow-sm" alt="" style="height: 140px; object-fit: cover;">
                <div class="text-center mt-2">
                    <p class="fw-bold mb-1"> <?php echo $row['class_name']; ?> </p>
                    <p class="text-muted mb-2"> <?php echo $row['subject_title']; ?> </p>
                </div>
            </a>
            <div class="text-center">
                <a href="#modal<?php echo $id; ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i> Remove</a>
            </div>
        </li>

        <!-- Modal -->
        <div id="modal<?php echo $id; ?>" class="modal fade" tabindex="-1" aria-labelledby="modalLabel<?php echo $id; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel<?php echo $id; ?>">Remove Class</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">Are you sure you want to remove this class?</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button id="remove<?php echo $id; ?>" class="btn btn-danger remove" data-class-id="<?php echo $id; ?>">Yes</button>
						</div>
                </div>
            </div>
        </div>
    <?php } } else { ?>
        <div class="alert alert-info text-center w-100">
            <i class="bi bi-info-circle"></i> No Class Currently Added
        </div>
    <?php } ?>
</ul>