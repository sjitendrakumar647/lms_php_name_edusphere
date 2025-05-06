<!-- Bootstrap Datepicker & jQuery -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<div class="col-md-12 mt-5">
    <div class="row">
        <!-- Add Event Form -->
        <div class="col-md-5 p-0">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h5><i class="fas fa-calendar-plus"></i> Add Event</h5>
                </div>
                <div class="card-body">
                    <form id="add_event_form" method="post">
                        <div class="mb-3">
                            <label for="date_start" class="form-label">Start Date</label>
                            <input type="text" class="form-control datepicker" name="date_start" id="date_start" placeholder="Select Start Date" required />
                        </div>

                        <div class="mb-3">
                            <label for="date_end" class="form-label">End Date</label>
                            <input type="text" class="form-control datepicker" name="date_end" id="date_end" placeholder="Select End Date" required />
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Event Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Event Title" required />
                        </div>

                        <button type="submit" name="add" class="btn btn-primary w-100"><i class="fas fa-save"></i> Save Event</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Event List -->
        <div class="col-md-7 p-0">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h5><i class="fas fa-calendar-alt"></i> Event List</h5>
                </div>
                <div class="card-body" id="event_list">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Event</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $event_query = mysqli_query($conn, "SELECT * FROM event") or die(mysqli_error());
                            while ($event_row = mysqli_fetch_array($event_query)) {
                                $id = $event_row['event_id'];
                            ?>
                                <tr>
                                    <td><strong><?php echo $event_row['event_title']; ?></strong></td>
                                    <td>
                                        <?php echo date("M d, Y", strtotime($event_row['date_start'])); ?> - 
                                        <?php echo date("M d, Y", strtotime($event_row['date_end'])); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="delete_event.php?id=<?php echo $id; ?>">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    });

    document.getElementById('add_event_form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        const dateStart = document.getElementById('date_start').value;
        const dateEnd = document.getElementById('date_end').value;
        const title = document.getElementById('title').value;

        // Create a FormData object
        const formData = new FormData();
        formData.append('date_start', dateStart);
        formData.append('date_end', dateEnd);
        formData.append('title', title);

        // Send AJAX request using Fetch API
        fetch('insert_event.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Event added successfully!!');
                    window.location.reload();
                    // Reload the page to reflect changes
                    
                } else {
                    alert(data); // Show error message
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
    });
</script>
