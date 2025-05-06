
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="bi bi-plus-circle"></i> Add Downloadable</h5>
        </div>
        <div class="card-body">
            <form id="add_downloadable" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fileInput" class="form-label">File</label>
                    <input name="uploaded_file" class="form-control" id="fileInput" type="file" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                    <input type="hidden" name="id" value="<?php echo $session_id ?>">
                    <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="name" placeholder="File Name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="desc" placeholder="Description" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button name="Upload" type="submit" class="btn btn-info">
                        <i class="bi bi-upload"></i> Upload
                    </button>
                </div>
            </form>
        </div>
    </div>


<script>
    document.getElementById("add_downloadable").addEventListener("submit", function (e) {
        e.preventDefault();
        alert("Uploading File Please Wait...");

        let formData = new FormData(this);
        fetch("upload_save_student.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert("File Successfully Uploaded");
            window.location = 'downloadable_student.php<?php echo '?id='.$get_id; ?>';
        })
        .catch(error => console.error("Error:", error));
    });
</script>
