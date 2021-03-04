<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">University</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Nav Item - Department -->
        <li class="nav-item">
            <a class="nav-link" href="department.php">
                <i class="fas fa-building"></i>
                <span>Department</span>
            </a>
        </li>
        <!-- Nav Item - Subject -->
        <li class="nav-item">
            <a class="nav-link" href="subject.php">
                <i class="fa fa-book"></i>
                <span>Subject</span>
            </a>
        </li>
        <!-- Nav Item - Student -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="subject.php" data-toggle="collapse" data-target="#collapseStudent"aria-expanded="true" aria-controls="collapseStudent">
                <i class="fas fa-users"></i>
                <span>Stundent</span>
            </a>
            <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="new_admission.php">New Admission</a>
                    <a class="collapse-item" href="student_list.php">Admited Student List</a>
                    <!--  <a class="collapse-item" href="cards.html">New Registration</a>
                    <a class="collapse-item" href="cards.html">Registration Student List</a> -->
                </div>
            </div>
        </li>
        <!-- Nav Item - Attendance -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="subject.php" data-toggle="collapse" data-target="#collapseAttendance"aria-expanded="true" aria-controls="collapseAttendance">
                <i class="fas fa-pencil-alt"></i>
                <span>Attendance</span>
            </a>
            <div id="collapseAttendance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="attendance.php">New</a>
                    <a class="collapse-item" href="attendance_list.php">List</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Exams-->
        <li class="nav-item ">
            <a class="nav-link collapsed" href="subject.php" data-toggle="collapse" data-target="#collapseExams"aria-expanded="true" aria-controls="collapseExams">
                <i class="fas fa-edit"></i>
                <span>Exams</span>
            </a>
             <div id="collapseExams" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="exam.php">New</a>
                    <a class="collapse-item" href="attendance_list.php">List</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Result -->
        <li class="nav-item">
            <a class="nav-link" href="subject.php">
                <i class="fas fa-clipboard-list"></i>
                <span>Result</span>
            </a>
        </li>
        <!-- Nav Item - Fees -->
        <li class="nav-item">
            <a class="nav-link" href="subject.php">
                <i class="fas fa-file-invoice"></i>
                <span>Fees</span>
            </a>
        </li>
        <!-- Nav Item - Users -->
        <li class="nav-item">
            <a class="nav-link" href="admin.php">
                <i class="fas fa-users-cog"></i>
                <span>Users</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="logout.php" method="POST">
                        <button class="btn btn-primary" type="submit" name="logout_btn">Logout</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>