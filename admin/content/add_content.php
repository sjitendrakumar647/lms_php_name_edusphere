<?php include('../header.php'); ?>
<?php include('../session.php'); ?>
<body class="bg-light">
    <?php include('../navbar.php'); ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-md-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Main Content -->
            <div class="col-lg-6 col-md-12 mt-md-5">
                <div class="card shadow-lg p-4 mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Add Content</h4>
                    </div>
                    <div class="card-body">
                        <a href="content.php" class="btn btn-outline-secondary mb-3">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>

                        <form method="POST">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" required>
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="ckeditor_full" class="form-label fw-bold">Content:</label>
                                <textarea name="content" id="ckeditor_full" class="form-control" rows="5" placeholder="Write content here..." required></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button name="save" type="submit" class="btn btn-success w-100">
                                <i class="bi bi-save"></i> Save Content
                            </button>
                        </form>

                        <!-- PHP for Form Handling -->
                        <?php
                        if (isset($_POST['save'])) {
                            $title = mysqli_real_escape_string($conn, $_POST['title']);
                            $content = mysqli_real_escape_string($conn, $_POST['content']);

                            $query = "INSERT INTO content (title, content) VALUES ('$title', '$content')";
                            if (mysqli_query($conn, $query)) {
                                echo '<script>window.location = "content.php";</script>';
                            } else {
                                echo '<div class="alert alert-danger mt-3">Error: ' . mysqli_error($conn) . '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>
</body>
</html>
