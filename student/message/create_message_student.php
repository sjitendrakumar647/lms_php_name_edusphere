<div class="col-md-3 w-100">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5><i class="bi bi-pencil"></i> Create Message</h5>
        </div>
        <div class="card-body">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="student_message.php">For Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_message_student.php">For Students</a>
                </li>
            </ul>

            <!-- Message Form -->
            <form id="send_message" method="post">
                <!-- Select Teacher -->
                <div class="mb-3">
                    <label class="form-label"><strong>To:</strong></label>
                    <select name="teacher_id" class="form-select" required>
                        <option value="">Select Teacher</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM teacher ORDER BY firstname");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['teacher_id']; ?>">
                                <?php echo $row['firstname'] . " " . $row['lastname']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Message Content -->
                <div class="mb-3">
                    <label class="form-label"><strong>Message:</strong></label>
                    <textarea name="my_message" class="form-control" rows="4" required></textarea>
                </div>

                <!-- Send Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-send"></i> Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for AJAX Form Submission (Pure JS) -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("send_message");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Create FormData object
            let formData = new FormData(form);

            // Send AJAX request using Fetch API
            fetch("send_message_student.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                showToast("Message Successfully Sent!", "success");

                // Refresh page after 2 seconds
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            })
            .catch(error => {
                showToast("Message Sending Failed!", "error");
                console.error("Error:", error);
            });
        });
    });

    // Toast Notification Function
    function showToast(message, type) {
        let toast = document.createElement("div");
        toast.className = "toast-message " + (type === "success" ? "success" : "error");
        toast.innerText = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.opacity = "0";
            setTimeout(() => { toast.remove(); }, 500);
        }, 3000);
    }
</script>

<!-- Toast Notification Styles -->
<style>
    .toast-message {
        position: fixed;
        top: 500px;
        right: 20px;
        padding: 10px 20px;
        color: white;
        background: #28a745;
        border-radius: 5px;
        opacity: 1;
        transition: opacity 0.5s;
        z-index: 1000;
    }
    .toast-message.error {
        background: #dc3545;
    }
</style>
