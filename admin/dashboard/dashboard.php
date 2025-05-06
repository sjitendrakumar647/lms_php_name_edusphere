<?php include('../header.php'); ?>
<?php include('../session.php'); ?>

<body>
    <?php include('../navbar.php'); ?>

    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-4 d-none d-lg-block p-0">
                <?php include('../sidebar_dashboard.php'); ?>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-12 mt-3">
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success text-center" role="alert">
                                📊 <strong>Dashboard Overview</strong> - System Statistics
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Registered Teachers -->
                        <?php 
                            $query_reg_teacher = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_status = 'Registered'") or die(mysqli_error($conn));
                            $count_reg_teacher = mysqli_num_rows($query_reg_teacher);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-primary p-3 text-center dashboard-card">
                                <i class="fa fa-user-tie fa-3x mb-2"></i>
                                <h3><?php echo $count_reg_teacher; ?></h3>
                                <p>Registered Teachers</p>
                            </div>
                        </div>

                        <!-- Total Teachers -->
                        <?php 
                            $query_teacher = mysqli_query($conn, "SELECT * FROM teacher") or die(mysqli_error($conn));
                            $count_teacher = mysqli_num_rows($query_teacher);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-secondary p-3 text-center dashboard-card">
                                <i class="fa fa-chalkboard-teacher fa-3x mb-2"></i>
                                <h3><?php echo $count_teacher; ?></h3>
                                <p>Total Teachers</p>
                            </div>
                        </div>

                        <!-- Registered Students -->
                        <?php 
                            $query_student = mysqli_query($conn, "SELECT * FROM student WHERE status='Registered'") or die(mysqli_error($conn));
                            $count_student = mysqli_num_rows($query_student);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-success p-3 text-center dashboard-card">
                                <i class="fa fa-users fa-3x mb-2"></i>
                                <h3><?php echo $count_student; ?></h3>
                                <p>Registered Students</p>
                            </div>
                        </div>

                        <!-- Total Students -->
                        <?php 
                            $query_total_students = mysqli_query($conn, "SELECT * FROM student") or die(mysqli_error($conn));
                            $count_total_students = mysqli_num_rows($query_total_students);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-danger p-3 text-center dashboard-card">
                                <i class="fa fa-graduation-cap fa-3x mb-2"></i>
                                <h3><?php echo $count_total_students; ?></h3>
                                <p>Total Students</p>
                            </div>
                        </div>

                        <!-- Total Classes -->
                        <?php 
                            $query_class = mysqli_query($conn, "SELECT * FROM class") or die(mysqli_error($conn));
                            $count_class = mysqli_num_rows($query_class);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-warning p-3 text-center dashboard-card">
                                <i class="fa fa-school fa-3x mb-2"></i>
                                <h3><?php echo $count_class; ?></h3>
                                <p>Total Classes</p>
                            </div>
                        </div>

                        <!-- Total Files -->
                        <?php 
                            $query_file = mysqli_query($conn, "SELECT * FROM files") or die(mysqli_error($conn));
                            $count_file = mysqli_num_rows($query_file);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-info p-3 text-center dashboard-card">
                                <i class="fa fa-file-alt fa-3x mb-2"></i>
                                <h3><?php echo $count_file; ?></h3>
                                <p>Downloadable Files</p>
                            </div>
                        </div>

                        <!-- Total Subjects -->
                        <?php 
                            $query_subject = mysqli_query($conn, "SELECT * FROM subject") or die(mysqli_error($conn));
                            $count_subject = mysqli_num_rows($query_subject);
                        ?>
                        <div class="col-md-4">
                            <div class="card text-bg-dark p-3 text-center dashboard-card">
                                <i class="fa fa-book fa-3x mb-2"></i>
                                <h3><?php echo $count_subject; ?></h3>
                                <p>Total Subjects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
    </div>

    <?php include('../footer.php'); ?>
    <?php include('../script.php'); ?>
</body>

</html>
