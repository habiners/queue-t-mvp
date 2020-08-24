<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Queue-T</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="..\plugins\fontawesome-free\css\all.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="..\css\adminlte.min.css">
<!-- Q-T style -->
 <link rel="stylesheet" href="..\css\qt-web.css">

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="height:auto;">
<div class="wrapper">

  <?php include ("layout/navbar.php");?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">  
    <!-- Brand Logo -->
    <a href="index3.php" class="brand-link pb-1">
      <img src="..\resources\Q-t-logo.png" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8">
      <span class="brand-text font-weight-light font-weight-bold">Queue-T</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
          <li class="nav-item mt-2" id="calendar-treeview">
              <div class="calendar  calendar-first" id="calendar_first">
                <div class="calendar_header">
                    <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                      <h2></h2>
                    <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="calendar_weekdays"></div>
                <div class="calendar_content"></div>
            </div>
          </li>
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="appointment.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Appointments
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="finance.php" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
                <p>
                  Finance
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="suki-counter.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                <p>
                  Suki Counter
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="business-profiling.php" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Business Profile
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-area"></i>
                <p>
                  Data Analytics
                </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="go-premium.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Go Premium
                </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header pl-0">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-x3 ml-0 pl-0 background-design">
            <h1 class="m-0 text-light font-weight-bold d-flex justify-content-center" id="dashboardDateView"></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row ml-5">
                <h2 class="uppercase font-weight-bold">Data Analytics</h2>
            </div>
            <div class="contaier mt-3 ml-5">
                <div class="row ml-5">
                    <h4 class="uppercase">Average Monthly Results</h4>
                </div>
            </div>
            <div class="row">
                <!-- Left col -->
                <section class="col-lg mr-5 connectedSortable d-flex justify-content-center">
                    <div class="container border-violet data-analytics-view">
                        <div class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div class="row d-flex justify-content-center queue-view-header">
                                    Business Rating
                                </div>
                                <div class="row d-flex justify-content-center  queue-view-number">
                                    4.1
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1 d-flex margin-middle justify-content-center bottom-border"></div>

                        <div class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div  style="text-align:center" class="row d-flex justify-content-center margin-data-header d-flex  font">
                                    Customer Satisfaction
                                </div>
                                <div class="row d-flex justify-content-center queue-view-number">
                                    3.9
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container border-violet data-analytics-view">
                        <div class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div class="row d-flex justify-content-center queue-view-header" >
                                    Daily Visit
                                </div>
                                <div class="row d-flex justify-content-center font-weight-bold queue-view-number">
                                    9
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1 d-flex margin-middle justify-content-center bottom-border"></div>

                        <div class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div style="text-align:center" class="row d-flex justify-content-center margin-data-header d-flex font">
                                    Visit Appointment Ratio
                                </div>
                                <div class="row d-flex justify-content-center font-weight-bold queue-view-number">
                                    3:1
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container border-violet data-analytics-view">
                        <div class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div class="row d-flex justify-content-center  queue-view-header">
                                    Repeat Customer
                                </div>
                                <div class="row d-flex justify-content-center font-weight-bold queue-view-number">
                                    4
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1  d-flex margin-middle justify-content-center bottom-border"></div>

                        <div style="text-align:center" class="row d-flex justify-content-center font-weight-bold">
                            <div class="container uppercase">
                                <div class="row d-flex justify-content-center margin-data-header d-flex font">
                                    Cancelled Transaction
                                </div>
                                <div class="row d-flex justify-content-center font-weight-bold queue-view-number">
                                    5
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div> 
                <div class="container mt-5 ml-5 col-auto mr-5">
                    <h4 class="uppercase ml-5">Recommendations</h4>
                    <div class="card ml-5">
                        <div class="card-header">
                          <h5 class="card-title font-weight-bold">Total Recommendations: 1</h5>
          
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                              <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body overflow-auto">
                            <div class="info-box navbar-violet">
                                <span class="info-box-icon font-weight-bold">
                                    <i class="fas fa-users"></i>
                                </span>
                  
                                <div class="info-box-content ">
                                  <span class="progress-description">
                                    Increase People Visit
                                  </span>
                                </div>

                                <button type="button" class="btn bg-queue float-right mr-2" font> Promote</button>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="..\plugins\jquery\jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="..\plugins\bootstrap\js\bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="..\jss\adminlte.min.js"></script>
<script src="..\jss\calendar.js"></script>
<script src="..\jss\otherJS.js"></script>
</body>
</html>
