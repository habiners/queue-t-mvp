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

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="height:auto;">
  <div class="wrapper">

    <?php include("layout/navbar.php"); ?>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link pb-1">
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
              <a href="#" class="nav-link active">
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
      <section class="content mt-2">
        <div class="container-fluid">
          <div class="row ml-5">
            <h2 class="uppercase font-weight-bold">Dashboard</h2>
          </div>
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-5 connectedSortable d-flex justify-content-cente">
              <div class="container margin border-violet real-time-queue">
                <div class="row d-flex justify-content-center font-weight-bold hover-design-effect">
                  <div class="container uppercase hover-design-effect" data-toggle="modal" data-target="#myCurrentServing">
                    <div class="row d-flex justify-content-center font-weight-bold queue-view-header" id="servingStatus1">
                      CURRENTLY SERVING
                    </div>
                    <div class="row d-flex justify-content-center queue-view-number" id="countdown">
                      4
                    </div>
                    <div class="row d-flex justify-content-center font-weight-bold queue-view-name" id="empty">
                      Sheena Negro
                    </div>
                  </div>
                  <div class="modal fade" id="myCurrentServing">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title font-weight-bold">1 minute left</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <h5 class="font-weight-bold mb-2">New Customer</h5>
                          <h5 class="font-weight-bold mb-2">Payment Status: Booking Fee Only</h5>
                          <h5 class="d-flex">Are you DONE with Tooth Extraction to Sheena Negro? You may proceed now on Cleaning.</h5>
                          <div class="form-group">
                            <label for="profileBio">Notes</label>
                            <textarea class="form-control" rows="5" id="profileBio"></textarea>
                          </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success mr-5" data-dismiss="modal" onclick="cleaning()">Yes</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row d-flex justify-content-center bottom-border"></div>

                <div class="row d-flex justify-content-center font-weight-bold" data-toggle="modal" data-target="#myOnQueue">
                  <div class="container uppercase">
                    <div class="row d-flex justify-content-center font-weight-bold queue-view-header">
                      ON QUEUE
                    </div>
                    <div class="row d-flex justify-content-center queue-view-number">
                      5
                    </div>
                    <div class="row d-flex justify-content-center font-weight-bold queue-view-name">
                      Javin Tan
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- /.Left col -->

            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-7 connectedSortable">
              <div class="container mb-2">
                <div class="row mr-2">
                  <div class="col">
                    <h4 class="uppercase">Today's Appointments</h4>
                  </div>
                  <div class="col-sm-x3">
                    <button class="btn btn-add" data-toggle="modal" data-target="#addPhysicalQueue">
                      <i class="fa fa-plus"></i>
                    </button>
                    <div class="modal fade" id="addPhysicalQueue">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title font-weight-bold">Make an Appointment</h4>
                            <button type="button" class="btn close" data-dismiss="modal">&times;</button>
                          </div>
                          <!-- Modal body -->
                          <div class="modal-body">
                            <div class="md-form md-outline mb-3">
                              <label class="mr-sm-2" for="service">Service Category</label>
                              <select class="my-select mr-sm-2" id="try">
                                <option selected>Choose...</option>
                                <option value="1">Cleaning</option>
                                <option value="2">Pasta</option>
                                <option value="3">Tooth Extraction</option>
                              </select>
                            </div>
                            <div class="md-form md-outline mb-2">
                              <label for="appointment-date">Appointment Date: </label>
                              <span id="dateAppointmentView">Date Today</span>
                            </div>
                            <div class="md-form md-outline mb-3">
                              <label for="appointment-time">Time Starts</label>
                              <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
                            </div>
                            <div class="md-form md-outline mb-3">
                              <label for="appointment-time">Time Ends</label>
                              <input type="text" id="default-picker" class="form-control" placeholder="Select time" required="">
                            </div>
                          </div>
                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success mr-5" data-dismiss="modal">Make Appointment</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Content card -->
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title font-weight-bold">Total Appointments: 5/7</h5>

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

                    <div class="info-box" data-toggle="modal" data-target="#addPhysicalQueue">
                      <span class="info-box-icon hover-effect"></span>
                      <div class="info-box-content hover-effect">
                        <span class="info-box-text font-weight-bold">5:10-5:30 PM</span>
                        <h5 class="uppercase">
                          Vacant
                        </h5>
                      </div>
                      <span class="info-box-text small">
                        open
                      </span>
                    </div>

                    <div class="info-box bg-queue hover-effect" data-toggle="modal" data-target="#myOnQueue">
                      <span class="info-box-icon font-weight-bold bg-queue hover-effect">5</span>

                      <div class="info-box-content bg-queue hover-effect">
                        <span class="info-box-text font-weight-bold">5:30-6:30 PM</span>
                        </span>
                        <span class="progress-description">
                          Javin Tan
                        </span>
                        <span class="info-box-text">Cleaning & Pasta</span>
                      </div>
                      <span class="info-box-icon">
                        <button type="button bg-queue" class="btn btn-reschedule" data-toggle="modal" data-target="#myReschedule">
                          <i class="fas fa-calendar-plus"></i>
                        </button>
                      </span>
                      <span class="info-box-icon">
                        <button type="button bg-queue" class="btn btn-remove" data-toggle="modal" data-target="#myCancel">
                          <i class="fas fa-times"></i>
                        </button>
                      </span>
                      <!-- The RESCHEDULE Modal -->
                      <div class="modal fade" id="myReschedule">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title font-weight-bold">Reschedule Appointment</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <p class="d-flex justify-content-center">Are you sure to RESCHEDULE Javin Tan's Cleaning and Pasta @ 3:20 PM?</p>
                              <div class="md-form md-outline mb-2">
                                <label for="reschedule-date">Reschedule Date</label>
                                <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" required="">
                              </div>
                              <div class="md-form md-outline mb-3">
                                <label for="reschedule-time">Reschedule Time</label>
                                <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
                              </div>


                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success mr-5" data-dismiss="modal">Yes</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            </div>

                          </div>
                        </div>
                      </div>

                      <!-- CANCEL MODAL -->
                      <div class="modal fade" id="myCancel">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title font-weight-bold">Cancel Appointment</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <h5 class="d-flex justify-content-center">Are you sure you want to CANCEL Javin Tan's Cleaning and Pasta Appointment at 3:20 PM?</h5>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success mr-5" data-dismiss="modal">Yes</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- ./Javin End -->
                  </div>
                  <!-- ./card-end -->

                </div> <!-- ./container-end -->
            </section>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Queue Profile -->
  <div class="modal fade" id="myOnQueue">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Javin Stefan Tan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="font-weight-bold mb-2">Suki</h5>
          <h5 class="font-weight-bold mb-2">Payment Status: Booking Fee Only</h5>
          <h5 class="d-flex">Appointment Schedule:</h5>
          <div class="row">
            <div class="col-sm-x3 ml-2">
              <span id="dateAppointmentView2">Date Today</span>
            </div>
            <div class="col">
              <span>@ 5:30-6:30 PM</span>
            </div>
          </div>
          <h5 class="d-flex">Service:</h5>
          <span> Cleaning and Pasta</span>

          <div class="form-group mt-3">
            <h5 class="font-weight-bold mb-2">Last Appointment:</h5>
            <span>March 08, 2020 @ 10:00-10:20 AM</span>
            <h5 class="d-flex">Service:</h5> <span>Tooth Extraction</span>
            <h5 class="mt-1">Notes:</h5>
            <p>Client likes to have cleaning and pasta. Needs to brush teeth more.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

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
  <!-- ./wrapper -->

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