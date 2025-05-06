<div class="col-md-3 mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-pencil"></i> Create Message</h5>
        </div>
        <div class="card-body">
            <!-- Tabs for Message Type -->
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link" href="teacher_message.php"><i class="bi bi-person"></i> For Teacher</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="teacher_message_teacher.php"><i class="bi bi-people"></i> For Student</a>
                </li>
            </ul>

            <!-- Message Form -->
            <form method="post" id="send_message_student">
                <!-- Recipient Selection -->
                <div class="mb-3">
                    <label for="studentSelect" class="form-label">To:</label>
                    <select name="student_id" id="studentSelect" class="form-select" required>
                        <option value="" disabled selected>Select a student</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM teacher_class_student
                            LEFT JOIN student ON student.student_id = teacher_class_student.student_id
                            GROUP BY teacher_class_student.student_id ORDER BY firstname ASC");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['student_id']; ?>">
                                <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Message Content -->
                <div class="mb-3">
                    <label for="messageContent" class="form-label">Content:</label>
                    <textarea name="my_message" id="messageContent" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-info">
                        <i class="bi bi-envelope"></i> Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for AJAX Form Submission -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("send_message_student");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch("send_message_teacher_to_student.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Show success message
                showToast("Message Successfully Sent", "success");

                // Redirect after a delay
                setTimeout(() => {
                    window.location = "teacher_message.php";
                }, 2000);
            })
            .catch(error => {
                showToast("Failed to send message", "error");
                console.error("Error:", error);
            });
        });

        // Function to show toast notifications
        function showToast(message, type) {
            const toast = document.createElement("div");
            toast.className = `toast align-items-center text-bg-${type === "success" ? "success" : "danger"} border-0`;
            toast.style.position = "fixed";
            toast.style.bottom = "20px";
            toast.style.right = "20px";
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;
            document.body.appendChild(toast);

            const bootstrapToast = new bootstrap.Toast(toast);
            bootstrapToast.show();

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    });
</script>