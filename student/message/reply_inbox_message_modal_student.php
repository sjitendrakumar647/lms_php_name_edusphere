<!-- Modal -->
<div class="modal fade" id="reply<?php echo $id; ?>" tabindex="-1" aria-labelledby="replyModalLabel<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="replyModalLabel<?php echo $id; ?>"><i class="bi bi-reply"></i> Reply</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <form method="post" id="reply_form<?php echo $id; ?>">
                    <div class="mb-3">
                        <label for="name_of_sender<?php echo $id; ?>" class="form-label">To:</label>
                        <input type="hidden" name="sender_id" value="<?php echo $sender_id; ?>">
                        <input type="hidden" name="my_name" value="<?php echo $reciever_name; ?>">
                        <input type="text" class="form-control" id="name_of_sender<?php echo $id; ?>" name="name_of_sender" value="<?php echo $sender_name; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="my_message<?php echo $id; ?>" class="form-label">Content:</label>
                        <textarea class="form-control" id="my_message<?php echo $id; ?>" name="my_message" rows="5" placeholder="Write your reply here..." required></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="reply" id="<?php echo $id; ?>" class="btn btn-success reply"><i class="bi bi-send"></i> Send Reply</button>
                    </div>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<!-- <script>
	jQuery(document).ready(function () {
		jQuery("#reply_form<?php echo $id; ?>").submit(function (e) {
			e.preventDefault();
			var formData = jQuery(this).serialize();
			$.ajax({
				type: "POST",
				url: "reply_inbox_message_student.php",
				data: formData,
				success: function (response) {
					// Handle success response
					alert("Message sent successfully!");
					location.reload(); // Reload the page to see the new message
				},
				error: function (xhr, status, error) {
					// Handle error response
					alert("An error occurred while sending the message.");
				}
			});
		});
	});</script> -->