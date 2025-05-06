<div class="col-lg-3">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="bi bi-plus-circle-fill"></i> Add Downloadable
            </h5>
        </div>
        <div class="card-body">
            <form id="add_downloadble" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="fileInput" class="form-label">Select File</label>
                    <input name="uploaded_file" class="form-control" id="fileInput" type="file" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="hidden" name="id" value="<?php echo $session_id; ?>" />
                    <input type="hidden" name="id_class" value="<?php echo $get_id; ?>" />
                </div>

                <div class="mb-3">
                    <label for="fileName" class="form-label">File Name</label>
                    <input type="text" id="fileName" name="name" class="form-control" placeholder="Enter File Name" required>
                </div>

                <div class="mb-3">
                    <label for="fileDesc" class="form-label">Description</label>
                    <input type="text" id="fileDesc" name="desc" class="form-control" placeholder="Enter Description" required>
                </div>

                <div class="d-grid">
                    <button name="Upload" type="submit" value="Upload" class="btn btn-success">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Upload AJAX Script -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('add_downloadble');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Show uploading notification (using jGrowl or a fallback)
        if (typeof $.jGrowl === "function") {
            $.jGrowl("Uploading File. Please Wait...", { sticky: true });
        } else {
            alert("Uploading File. Please Wait...");
        }

        const formData = new FormData(form);

        fetch('upload_save.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(html => {
            if (typeof $.jGrowl === "function") {
                $.jGrowl("File Successfully Added!", { header: 'Success' });
            } else {
                alert("File Successfully Added!");
            }

            setTimeout(function() {
                window.location.href = 'downloadable.php<?php echo '?id=' . $get_id; ?>';
            }, 2000);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

</script>
