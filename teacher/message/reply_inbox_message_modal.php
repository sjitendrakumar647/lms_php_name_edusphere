<!-- Reply Modal -->
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
                <form id="reply_form_<?php echo $id; ?>" class="form-horizontal">
                    <!-- Recipient Information -->
                    <div class="mb-3">
                        <label for="recipientName<?php echo $id; ?>" class="form-label">To:</label>
                        <input type="hidden" name="sender_id" value="<?php echo $sender_id; ?>" readonly>
                        <input type="hidden" name="my_name" value="<?php echo $reciever_name; ?>" readonly>
                        <input type="text" id="recipientName<?php echo $id; ?>" class="form-control" name="name_of_sender" value="<?php echo $sender_name; ?>" readonly>
                    </div>

                    <!-- Message Content -->
                    <div class="mb-3">
                        <label for="messageContent<?php echo $id; ?>" class="form-label">Content:</label>
                        <textarea id="messageContent<?php echo $id; ?>" name="my_message" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" id="reply_button_<?php echo $id; ?>" class="btn btn-success">
                            <i class="bi bi-send"></i> Send Reply
                        </button>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>



