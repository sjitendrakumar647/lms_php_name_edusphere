<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-pencil"></i> Create Message</h5>
                </div>
                <div class="card-body">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="student_message.php">For Teachers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_message_student.php">For Students</a>
                        </li>
                    </ul>

                    <!-- Message Form -->
                    <form method="post" id="send_message">
                        <div class="mb-3">
                            <label for="teacher_id" class="form-label">To:</label>
                            <select name="teacher_id" id="teacher_id" class="form-select" required>
                                <option value="" disabled selected>Select a Teacher</option>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM teacher ORDER BY firstname");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $row['teacher_id']; ?>">
                                        <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="my_message" class="form-label">Content:</label>
                            <textarea name="my_message" id="my_message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-envelope"></i> Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        jQuery("#send_message").submit(function (e) {
            e.preventDefault();
            var formData = jQuery(this).serialize();
            $.ajax({
                type: "POST",
                url: "send_message_student.php",
                data: formData,
                success: function (html) {
                    $.jGrowl("Message Successfully Sent", { header: 'Message Sent' });
                    var delay = 2000;
                    setTimeout(function () {
                        window.location = 'student_message.php';
                    }, delay);
                }
            });
            return false;
        });
    });
</script>