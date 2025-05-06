<!-- Modal -->
<div class="modal fade" id="remove<?php echo $id; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="bi bi-trash"></i> Remove Sent Message
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-center">
                <i class="bi bi-exclamation-triangle-fill text-warning display-4"></i>
                <p class="mt-3">Are you sure you want to remove this sent message?</p>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Close
                </button>
                <button data-id="<?php echo $id; ?>" id="<?php echo $id; ?>" class="btn btn-danger remove" data-bs-dismiss="modal">
                    <i class="bi bi-check-circle"></i> Yes, Delete
                </button>
				
            </div>
        </div>
    </div>
</div>
