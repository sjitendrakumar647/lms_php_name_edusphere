<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            /* display: flex; */
            height: 100vh;
            background: #f4f4f4;
        }
        .sidebar {
            width: 25%;
            min-width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            padding-top: 30px;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2);
            border-right: 3px solid rgba(255, 255, 255, 0.3);
        }
        .sidebar h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 20px;
            transition: background 0.3s ease-in-out, border 0.3s ease-in-out;
            border-left: 3px solid transparent;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            font-weight: 500;
            transition: transform 0.3s ease;
        }
        .sidebar ul li:hover {
            background: rgba(255, 255, 255, 0.2);
            border-left: 3px solid #ffffff;
        }
        .sidebar ul li a:hover {
            transform: translateX(10px);
        }
        .content {
            margin-left: 280px;
            padding: 20px;
            flex: 1;
        }
    </style>
<div class="sidebar mt-5">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="../dashboard/dashboard.php">🏠 Home</a></li>
            <li><a href="../subject/subjects.php">📖 Subjects</a></li>
            <li><a href="../class/class.php"><i class="fa fa-chalkboard me-2"></i> Classes</a></li>
            <li><a href="../user/admin_user.php"><i class="fa fa-user-shield me-2"></i> Admin Users</a></li>
            <li><a href="../department/department.php"><i class="fa fa-building me-2"></i> Department</a></li>
            <li><a href="../student/students.php"><i class="fa fa-user-graduate me-2"></i> Students</a></li>
            <li><a href="../teacher/teachers.php"><i class="fa fa-chalkboard-teacher me-2"></i> Teachers</a></li>
            <li><a href="../material/downloadable.php"><i class="fa fa-download me-2"></i> Downloadable Materials</a></li>
            <li><a href="../assignment/assignment.php"><i class="fa fa-upload me-2"></i> Uploaded Assignments</a></li>
            <li><a href="../content/content.php">📰 Content</a></li>
            <li><a href="../user_log/user_log.php"><i class="fa fa-history me-2"></i> User Log</a></li>
            <li><a href="../user_log/student_log.php"><i class="fa fa-history me-2"></i> Student Log</a></li>
            <li><a href="../activity_log/activity_log.php"><i class="fa fa-list me-2"></i> Activity Log</a></li>
            <li><a href="../academic_year/academic_year.php"><i class="fa fa-calendar me-2"></i> School Year</a></li>
            <li><a href="../calendar/calendar_of_events.php"><i class="fa fa-calendar-alt me-2"></i> Calendar of Events</a></li>
            <li><a href=""></a></li>            
        </ul>
    </div>

