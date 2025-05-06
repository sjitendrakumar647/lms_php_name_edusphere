<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<style>
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
    .fc-prev-button::before {
        content: "<"; /* Bootstrap Icons Left Arrow */
        font-family: "Bootstrap-icons";
    }
    .fc-next-button::before {
        content: ">"; /* Bootstrap Icons Right Arrow */
        font-family: "Bootstrap-icons";
    }
    .fc-day-sun {
        background-color: rgba(255, 0, 0, 0.2);
    }
</style>

<body>
    <?php include('navbar_student.php'); ?>
    <div class="container-fluid mt-2">
        <div class="row">

        <div class="col-md-3 student-sidebar d-none d-lg-block" id="sidebar">
    <!-- Avatar Section -->
    <div class="sidebar-profile">
        <div class="avatar-container">
            <img id="avatar" src="<?php echo $row['location']; ?>" alt="Student Profile">
            <div class="status-indicator"></div>
        </div>
        <h5>Welcome, Student</h5>
        <p class="student-status">Online</p>
    </div>

    <!-- Sidebar Navigation -->
    <div class="sidebar-nav">
        <ul>
            <li class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard_student.php' ? 'active' : ''; ?>">
                <a href="dashboard_student.php">
                    <i class="bi bi-chevron-left"></i>
                    <span>Back</span>
                </a>
            </li>
            <li>
                <a href="my_classmates.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-people"></i>
                    <span>My Classmates</span>
                </a>
            </li>
            <li>
                <a href="progress.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-bar-chart"></i>
                    <span>My Progress</span>
                    <!-- <div class="progress-indicator" data-progress="75"></div> -->
                </a>
            </li>
            <li>
                <a href="downloadable_student.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-download"></i>
                    <span>Downloadable Materials</span>
                    <!-- <div class="badge">3</div> -->
                </a>
            </li>
            <li>
                <a href="assignment_student.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-book"></i>
                    <span>Assignments</span>
                </a>
            </li>
            <li>
                <a href="announcements_student.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-info-circle"></i>
                    <span>Announcements</span>
                </a>
            </li>
            <li class="active">
                <a href="class_calendar_student.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-calendar"></i>
                    <span>Class Calendar</span>
                </a>
            </li>
            <li>
                <a href="student_quiz_list.php<?php echo '?id=' . $get_id; ?>">
                    <i class="bi bi-list-task"></i>
                    <span>Quiz</span>
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Quick Stats -->
    <div class="sidebar-stats">
        <div class="stat-item">
            <span class="stat-value">85%</span>
            <span class="stat-label">Attendance</span>
        </div>
        <div class="stat-item">
            <span class="stat-value">92%</span>
            <span class="stat-label">Assignments</span>
        </div>
    </div>
</div>
            
            <!-- Main Content -->
            <div class="col-md-9">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-calendar-event"></i> My Class Calendar</h5>
                    </div>
                    <div class="card-body">
                        <!-- Breadcrumb Navigation -->
                        <?php 
                            $class_query = mysqli_query($conn, "SELECT * FROM teacher_class
                                LEFT JOIN class ON class.class_id = teacher_class.class_id
                                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                WHERE teacher_class_id = '$get_id'") or die(mysqli_error());
                            $class_row = mysqli_fetch_array($class_query);
                        ?>
                        <nav aria-label="breadcrumb" class="card mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['class_name']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#"><?php echo $class_row['subject_code']; ?></a></li>
                                <li class="breadcrumb-item"><a href="#">School Year: <?php echo $class_row['school_year']; ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Class Calendar</li>
                            </ol>
                        </nav>

                        <!-- Calendar Display -->
                        <div class="col-lg-9 col-md-12 mt-4">
                <div class="calendar-container p-md-4 pt-md-0 p-0">
                    <div class="card shadow">
                        <div class="card-header bg-primary text-white text-center">
                            📅 <strong>Event Calendar</strong>
                        </div>
                        <div class="card-body p-0">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

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
                // eventClick: function (info) {
                //     alert('Event: ' + info.event.title + '\nStart: ' + info.event.start.toLocaleDateString());
                // },
                
            });

            calendar.render();
        });
    </script>
</body>
</html>
