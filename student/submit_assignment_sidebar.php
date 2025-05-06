<div class="col-md-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add Downloadable</h5>
        </div>
        <div class="card-body">
            <form id="add_assignment" method="post" enctype="multipart/form-data">
                <!-- File Upload -->
                <div class="mb-3">
                    <label for="fileInput" class="form-label">File</label>
                    <input name="uploaded_file" class="form-control" id="fileInput" type="file" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                    <input type="hidden" name="id" value="<?php echo $post_id; ?>">
                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
                </div>

                <!-- File Name -->
                <div class="mb-3">
                    <label for="fileName" class="form-label">File Name</label>
                    <input type="text" name="name" id="fileName" class="form-control" placeholder="File Name" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="fileDesc" class="form-label">Description</label>
                    <input type="text" name="desc" id="fileDesc" class="form-control" placeholder="Description" required>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button name="Upload" type="submit" value="Upload" class="btn btn-success">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("add_assignment");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(form);

            fetch("upload_assignment.php", {
                method: "POST",
                body: formData,
            })
                .then((response) => response.text())
                .then((html) => {
                    alert("Student Successfully Added");
                    window.location = 'submit_assignment.php<?php echo '?id=' . $get_id . '&post_id=' . $post_id; ?>';
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("An error occurred while uploading the file.");
                });
        });
    });
</script>