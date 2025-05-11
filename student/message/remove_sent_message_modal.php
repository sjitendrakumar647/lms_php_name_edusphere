<!-- Modal -->
<div class="modal fade" id="remove<?php echo $id; ?>" tabindex="-1" aria-labelledby="removeSentMessageModalLabel<?php echo $id; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="removeSentMessageModalLabel<?php echo $id; ?>"><i class="bi bi-trash"></i> Remove Sent Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i> Are you sure you want to remove this sent message?
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button id="<?php echo $id; ?>" class="btn btn-danger remove" data-bs-dismiss="modal"><i class="bi bi-check-circle"></i> Yes</button>
            </div>
        </div>
    </div>
</div>
