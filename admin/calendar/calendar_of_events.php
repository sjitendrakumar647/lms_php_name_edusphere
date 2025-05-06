<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<!-- FullCalendar CSS & JS (CDN) -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    body {
        background-color: #f8f9fa;
    }
    .calendar-container {
        max-width: 900px; /* Reduced the width */
        margin: auto;
        padding: 20px;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .card-header {
        font-size: 1.25rem;
        font-weight: bold;
        padding: 15px;
    }
    #calendar {
        background: #fff;
        padding: 10px; /* Reduced padding */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 600px; /* Adjusted height */
    }
    .fc-daygrid-day-frame {
        border:2px solid rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        background-color:rgba(26, 146, 251, 0.13);
        transition: transform 0.3s ease;
    }
    .fc-day-today {
        background-color: rgba(0, 123, 255, 0.24) !important;
    }
    .fc-day-today .fc-daygrid-day-number {
        color: #007bff !important;
    }
    .fc-daygrid-day-frame:hover {
        background-color: rgba(0, 229, 255, 0.13) !important;
        transform: scale(1.1);
    }
</style>

<body>
    <?php include('../navbar.php'); ?>
    <div class="container-fluid mt-4">
        <div class="row mt-4">
            <!-- Sidebar (Visible on Large Screens, Collapses on Small) -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0 mt-5">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>
            <div class="col-lg-9 col-md-12 mt-4">
                <div class="calendar-container p-md-4 p-0">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            📅 <strong>Event Calendar</strong>
                        </div>
                        <div class="card-body p-0">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <?php include('add_class_event.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php include('../footer.php'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                selectable: true,
                editable: true,
                droppable: true,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                eventSources: [
                    {
                        url: 'fetch_events.php',
                        method: 'GET',
                        failure: function () {
                            alert('Failed to load events!');
                        },
                        color: '#17a2b8',
                        textColor: 'white'
                    }
                ],
                eventClick: function (info) {
                    alert('Event: ' + info.event.title + '\nStart: ' + info.event.start.toLocaleDateString());
                },
                eventDrop: function (info) {
                    $.ajax({
                        url: "update_event.php",
                        type: "POST",
                        data: {
                            id: info.event.id,
                            start: info.event.start.toISOString(),
                            end: info.event.end ? info.event.end.toISOString() : info.event.start.toISOString()
                        },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
