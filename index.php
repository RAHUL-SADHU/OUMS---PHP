<?php
include("security.php");
include("includes/header.php");
include("includes/navbar.php");
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
            </button>
            
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                </li>
                
                <div class="topbar-divider d-none d-sm-block"></div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?php
                            $id = $_SESSION["userId"];
                            $query = "SELECT * FROM admin WHERE id = $id LIMIT 1";
                            $query_run = mysqli_query($connection,$query);
                            if(mysqli_num_rows($query_run)>0){
                             while ($row = mysqli_fetch_assoc($query_run)) {
                                echo $row["first_name"]." ".$row["last_name"];
                             }}
                            ?>
                            <!-- <?php echo $_SESSION["userName"] ?> -->
                        </span>
                        <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Department</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $query = "SELECT id FROM department";
                                        $query_run = mysqli_query($connection,$query);
                                        $row = mysqli_num_rows($query_run);
                                        echo "$row";
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-building fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Subjects Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Subjects</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $query = "SELECT subject_id FROM subject";
                                        $query_run = mysqli_query($connection,$query);
                                        $row = mysqli_num_rows($query_run);
                                        echo "$row";
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Admitted Students Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admitted Students
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                <?php
                                                $query = "SELECT id FROM student";
                                                $query_run = mysqli_query($connection,$query);
                                                $row = mysqli_num_rows($query_run);
                                                echo "$row";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bar Chart -->
                <div class="card shadow mb-4 col">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Student Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        
        
        <?php
        include("includes/scripts.php");
        include("includes/footer.php");
        ?>
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>