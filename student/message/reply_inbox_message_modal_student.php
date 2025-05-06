<!-- Reply Modal -->
<div class="modal fade" id="reply<?php echo $id; ?>" tabindex="-1" aria-labelledby="replyModalLabel<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="replyModalLabel<?php echo $id; ?>">
                    <i class="bi bi-reply-fill"></i> Reply to <?php echo htmlspecialchars($sender_name); ?>
                </h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                
                <form id="send_message_stu">
                <!-- Select Student -->
                <div class="mb-3">
                    <label class="form-label"><strong>To:</strong></label>
                    <select name="student_id" class="form-select" required>
                        <option value="">Select Student</option>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM student ORDER BY firstname ASC");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['student_id']; ?>">
                            <?php echo htmlspecialchars($sender_name); ?>
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
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("send_message_stud").addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent default form submission

            let formData = new FormData(this);

            fetch("send_message_student_to_student.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Show success message
                showToast("Message Successfully Sent", "success");

                // Wait 2 seconds before refreshing the page
                setTimeout(function () {
                    location.reload();
                }, 2000);
            })
            .catch(error => {
                showToast("Message Sending Failed", "error");
                console.error("Error:", error);
            });
        });
    });

    // Function to show toast message
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
        font-size: 25px;
        position: fixed;
        top: 500px;
        right: 20px;
        padding: 10px 20px;
        color: rgb(0, 255, 60);
        background:rgba(112, 255, 145, 0.54);
        border-radius: 5px;
        opacity: 1;
        transition: opacity 0.5s;
        z-index: 1;
    }
    .toast-message.error {
        background: #dc3545;
    }
</style>
