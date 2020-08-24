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
 <link rel="stylesheet" href="..\css\qt-web3.css">

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
            <a href="#" class="nav-link active">
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
            <a href="data-analytics.php" class="nav-link">
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
                <h2 class="uppercase font-weight-bold">Suki Counter</h2>
            </div>
            <div class="contaier mt-3 ml-5">
                <div class="row">
                  <div class="col-lg-3">
                    <input class="form-control" id="searchSuki" type="text" placeholder="Search">
                  </div>
                </div>
            </div>
            <div class="row ml-5 mr-5 mt-2">
                <table class="table">
                  <thead class="designTableSuki text-center">
                    <th scope="col">Last Name</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Number of Appointments</th>
                    <th scope="col">Last Appointment</th>
                    <th scope="col">Last Appointment Status</th>
                  </thead>
                  <tbody id="tableSuki">
                    <tr class="clickable text-center sukiTableTr" onclick="window.location='suki-counter-customer-sample.php'">
                      <th scope="row">dela Cruz</th>
                      <td>Juan</td>
                      <td>3</td>
                      <td>July 10, 2020</td>
                      <td>cancelled</td>
                    </tr>
                    <tr class="clickable text-center sukiTableTr" onclick="window.location='jaja.php'">
                      <th scope="row">de la Cruz</th>
                      <td>Shane</td>
                      <td>3</td>
                      <td>August 7, 2020</td>
                      <td>successful</td>
                    </tr>
                  </tbody>
                </table>
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
<script src="..\jss\javascripts.js"></script>
</body>
</html>
