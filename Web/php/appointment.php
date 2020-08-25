<?php
require_once "pdo-conn.php";
session_start();

$businessID = $_SESSION["businessID"];
$userID = $_SESSION["userID"];

function inpClean($data)
{ //Manglimpyo ni siya
  $data = trim($data); //gets rid of whitespace
  $data = stripslashes($data); //gets rid of slashes
  $data = htmlspecialchars($data); //translates html for security

  return $data;
}
?>
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

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="height:auto;">
  <div class="wrapper">

    <?php include("layout/navbar.php"); ?>

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
              <a href="#" class="nav-link active">
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
      <section class="content">
        <div class="container">
          <div class="row ml-5">
            <h2 class="uppercase font-weight-bold">Appointments</h2>
            <div class="col d-flex flex-row-reverse">
              <button type="button" class="btn btn-setting hover-effect" data-toggle="dropdown">
                <i class="fas fa-cog"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#addEmployee">
                  Add Employee
                </a>
                <?php
                $statement = $pdo->query("SELECT DISTINCT concat(WORKER.firstName, ' ', WORKER.lastName) AS 'workerName', WORKER.workerID FROM BUSINESS
                          INNER JOIN SERVICES_OFFERED
                          ON BUSINESS.businessID = SERVICES_OFFERED.businessID AND BUSINESS.businessID = $businessID #change this
                            INNER JOIN EMPLOYEE
                            ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID
                              INNER JOIN WORKER
                              ON EMPLOYEE.workerID = WORKER.workerID;");

                if (!empty($statement->fetch())) {
                  echo '
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#makeAppointment">
                            <!-- Make an Appointment -->
                              Add a Schedule
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"  data-toggle="modal" data-target="#filterAppointments">
                              Filter Appointments
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#closeSchedule">
                              Close Schedule
                            </a>
                                ';
                }
                ?>
              </div>
            </div>

            <div class="container ml-2" style="overflow-x:auto;">
              <div class="row d-flex justify-content-center">
                <button type="button" class="btn btn-arrow hover-effect">
                  <i class="mr-4 fas fa-angle-left fa-2x"></i>
                </button>
                <h3 class="mt-2" id="dateAppointmentView">Date Today</h3>
                <button type="button" class="btn btn-arrow hover-effect">
                  <i class="ml-4 fas fa-angle-right fa-2x"></i>
                </button>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <?php
                    //Get all Employees of a Business
                    if (isset($_POST['Submit']) && ($_POST['Submit'] == "addEmployee" || $_POST['Submit'] == "addSchedule")) //Refreshes page somehow
                      echo "<meta http-equiv='refresh' content='0'>";

                    $statement = $pdo->query("SELECT DISTINCT concat(WORKER.firstName, ' ', WORKER.lastName) AS \"workerName\", WORKER.workerID FROM BUSINESS
                      INNER JOIN SERVICES_OFFERED
                      ON BUSINESS.businessID = SERVICES_OFFERED.businessID AND BUSINESS.businessID = $businessID #change this
                        INNER JOIN EMPLOYEE
                        ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID
                          INNER JOIN WORKER
                          ON EMPLOYEE.workerID = WORKER.workerID;");
                    $employees = $statement->fetchAll();

                    foreach ($employees as $column) {
                      echo '
                      <th scope="col" class="table-border-left table-border-right">
                      <span class="info-box-icon">
                      <button type="button" class="btn btn-setting hover-effect" data-toggle="dropdown" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                      </button> 
                      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#employeeCancel">
                            Cancel All
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#employeeReschedule">
                            Reschedule All
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#closeScheduleEmployee">
                            Close Schedule
                          </a>
                      </div>
                      <span class="employee-name">' . $column["workerName"] . ' </span><br>(';
                      $statement = $pdo->query("SELECT concat(WORKER.firstName, ' ', WORKER.lastName) AS \"workerName\", EMPLOYEE.employeeID, serviceName FROM WORKER
                      INNER JOIN EMPLOYEE
                      ON EMPLOYEE.workerID = WORKER.workerID AND WORKER.workerID = " . $column["workerID"] . #just change worker ID
                        " INNER JOIN SERVICES_OFFERED
                        ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID AND SERVICES_OFFERED.businessID = $businessID #as well as businessID
                          INNER JOIN SERVICE
                          ON SERVICES_OFFERED.serviceID = SERVICE.serviceID;");
                      $empServices = $statement->fetchAll();
                      $len = count($empServices);
                      $i = 1;
                      foreach ($empServices as $service) {
                        echo $service["serviceName"];
                        if ($i != $len) echo ", ";
                        $i++;
                      }
                      echo ")";
                    }

                    ?>

                    </th>
                    <!-- <th scope="col" class="table-border-left table-border-right">
                        <span class="info-box-icon">
                        <button type="button" class="btn btn-setting hover-effect" data-toggle="dropdown" href="#">
                          <i class="fas fa-ellipsis-v"></i>
                        </button> 
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#employeeCancel">
                              Cancel All
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#employeeReschedule">
                              Reschedule All
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#closeScheduleEmployee">
                              Close Schedule
                            </a>
                        </div>
                        <span class="employee-name">Ashton</span>
                    </th> -->
                  </tr>
                </thead>
                <tbody class="table-borderless">
                  <?php
                  $notDone = true;
                  $serviceRow = 1;
                  while ($notDone) {
                    $notDone = false;
                    echo "<tr>";
                    $statement = $pdo->query("SELECT DISTINCT concat(WORKER.firstName, ' ', WORKER.lastName) AS 'workerName', WORKER.workerID FROM BUSINESS
                    INNER JOIN SERVICES_OFFERED
                    ON BUSINESS.businessID = SERVICES_OFFERED.businessID AND BUSINESS.businessID = $businessID #change this
                      INNER JOIN EMPLOYEE
                      ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID
                        INNER JOIN WORKER
                        ON EMPLOYEE.workerID = WORKER.workerID;");

                    $workers = $statement->fetchAll();
                    foreach ($workers as $column) {
                      if (!empty($column)) {
                        $row = 0;
                        $statement = $pdo->query("SELECT scheduleID, CONCAT(time_format(timeStart, '%h:%i') , ' ', IF(TIME(timeStart) >= '12:00:00', 'PM', 'AM')) as timeStartFormatted, 
                        CONCAT(time_format(timeEnd, '%h:%i') , ' ', IF(TIME(timeEnd) >= '12:00:00', 'PM', 'AM')) as timeEnd, isOpen, WORKER.workerID, concat(WORKER.firstName, ' ', WORKER.lastName) AS 'workerName' FROM SCHEDULE 
                          INNER JOIN WORKER
                          ON SCHEDULE.workerID = WORKER.workerID AND WORKER.workerID = " . $column["workerID"] .
                          " INNER JOIN EMPLOYEE
                            ON WORKER.workerID = EMPLOYEE.workerID
                              INNER JOIN SERVICES_OFFERED
                              ON SERVICES_OFFERED.businessID = $businessID
                                GROUP BY timeStart ORDER BY timeStart ASC;");

                        while ($row < $serviceRow) {
                          $row++;
                          $schedule = $statement->fetch();
                        }
                        if (!empty($schedule)) {
                          $notDone = true;
                          if (!$schedule["isOpen"]) {
                            $personAppoint = $pdo->query("SELECT CONCAT(USER.firstName, ' ', USER.middleName, ' ', USER.lastName) AS 'name', SCHEDULE.scheduleID, APPOINTMENT.serviceID FROM SCHEDULE
                              INNER JOIN APPOINTMENT
                              ON SCHEDULE.scheduleID = APPOINTMENT.scheduleID AND APPOINTMENT.isActive = 1 AND SCHEDULE.scheduleID = " . $schedule["scheduleID"] . "
                                INNER JOIN USER
                                ON APPOINTMENT.userID = USER.userID;")->fetch();
                          }
                          echo '
                        <td>
                          <div class="info-box' . ($schedule["isOpen"] ? '' : ' bg-done') . ' hover-effect">
                            <span class="info-box-icon font-weight-bold hover-effect"></span>
                            <div class="info-box-content hover-effect">
                              <span class="info-box-text font-weight-bold"> ' . $schedule["timeStartFormatted"] . ' to ' . $schedule["timeEnd"] . '</span>
                              </span>
                              <h3 class="uppercase">
                              ' . ($schedule["isOpen"] ? 'Vacant' : $personAppoint["name"]) . '
                              </h3>
                            </div>
                            <span class="info-box-text small">
                              ' . ($schedule["isOpen"] ? 'open' : 'closed') . '
                            </span>
                          </div>
                        </td>
                        ';
                        } else {
                          echo "<td></td>";
                          // echo "<td>". $column["workerID"] . "</td>";
                        }
                      }
                    }
                    echo "</tr>";
                    $serviceRow++;
                  }
                  ?>
                  <!-- <tr>
                    <td>
                      <div class="info-box bg-done hover-effect">
                        <span class="info-box-icon font-weight-bold bg-done hover-effect">3</span>
          
                        <div class="info-box-content bg-done hover-effect">
                          <span class="info-box-text font-weight-bold">3:30-3:50 PM</span>
                          </span>
                          <span class="progress-description">
                            Mike Sy
                          </span>
                          <span class="info-box-text">Tooth Extraction</span>
                        </div>
                        <span class="info-box-text small">
                            served
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="info-box bg-done hover-effect">
                        <span class="info-box-icon font-weight-bold bg-done hover-effect"></span>
                        <div class="info-box-content bg-done hover-effect">
                          <span class="info-box-text font-weight-bold">3:50-4:10 PM</span>
                          </span>
                          <h3 class="uppercase">
                            Vacant
                          </h3>
                        </div>
                        <span class="info-box-text small">
                            closed
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="info-box bg-serving hover-effect" data-toggle="modal" data-target="#myCurrentServing">
                        <span class="info-box-icon font-weight-bold bg-serving hover-effect">4</span>
          
                        <div class="info-box-content bg-serving hover-effect">
                          <span class="info-box-text font-weight-bold uppercase">4:10-5:10 PM</span>
                          <span class="progress-description">
                            Sheena Negro
                          </span>
                          <span class="info-box-text">Cleaning & Pasta</span>
                        </div>
                        <span class="info-box-text font-weight-bold uppercase small">
                          NOW SERVING
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="info-box hover-effect" data-toggle="modal" data-target="#addPhysicalQueue">
                        <span class="info-box-icon font-weight-bold hover-effect"></span>
                        <div class="info-box-content hover-effect">
                          <span class="info-box-text font-weight-bold">5:10-5:30 PM</span>
                          </span>
                          <h3 class="uppercase">
                            Vacant
                          </h3>
                        </div>
                        <span class="info-box-text small">
                            open
                        </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
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
                          <button type="button bg-queue" class="btn btn-reschedule hover-effect" data-toggle="modal" data-target="#myReschedule">
                              <i class="fas fa-calendar-plus"></i>
                          </button>
                        </span>
                        <span class="info-box-icon">
                          <button type="button bg-queue" class="btn btn-remove hover-effect" data-toggle="modal" data-target="#myCancel">
                            <i class="fas fa-times"></i>
                          </button>
                        </span>
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>


          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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

  <!-- Now Serving -->
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
          <h5 class="font-weight-bold mb-2">Suki</h5>
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

  <!-- /. add Physical Q -->
  <div class="modal fade" id="addPhysicalQueue">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <!-- <h4 class="modal-title font-weight-bold">Make an Appointment</h4> -->
          <h4 class="modal-title font-weight-bold">Add a Schedule</h4>
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
            <span id="dateAppointmentView2">Date Today</span>
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

  <?php
  //Add Schedule Back-end============================================================================================================
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Submit"] == "addSchedule") {
    // echo $_POST["scheduleDate"] . " " . $_POST["scheduleTime"] . " " . $_POST["scheduleWorker"];
    $scheduleDate = inpClean($_POST["scheduleDate"]);
    $scheduleTimeStart = $_POST["scheduleTime"] . ":00";
    $scheduleWorker = inpClean($_POST["scheduleWorker"]);

    $scheduleTimeEnd = $pdo->query("SELECT concat(WORKER.firstName, ' ', WORKER.lastName) AS \"workerName\", 
          ADDTIME(TIME('$scheduleTimeStart'), MAX(ADDTIME(serviceDuration, cleaningDuration))) as \"endTime\"
          FROM WORKER
            INNER JOIN EMPLOYEE
            ON EMPLOYEE.workerID = WORKER.workerID AND WORKER.workerID = $scheduleWorker
              INNER JOIN SERVICES_OFFERED
              ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID AND SERVICES_OFFERED.businessID = $businessID
                INNER JOIN SERVICE
                ON SERVICES_OFFERED.serviceID = SERVICE.serviceID
                  GROUP BY workerName;")->fetch()["endTime"];
    // echo "HIII : " . $scheduleTimeEnd;
    try {
      $pdo->exec("INSERT INTO SCHEDULE (workerID, date, timeStart, timeEnd, isOpen, createdAt, updatedAt) VALUES ($scheduleWorker, '$scheduleDate', '$scheduleTimeStart', '$scheduleTimeEnd', 1, now(), now());");
    } catch (Exception $e) {
      echo "Could not insert! Error: $e";
    }
  }
  ?>
  <!-- MODAL MAKE APPOINTMENT -->
  <div class="modal fade" id="makeAppointment">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <!-- <h4 class="modal-title font-weight-bold">Make an Appointment</h4> -->
          <h4 class="modal-title font-weight-bold">Add a Schedule</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <form id="schedule-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="modal-body">
            <div class="md-form md-outline mb-2 form-group">
              <label for="appointment-date">Date</label>
              <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" name="scheduleDate" value="<?php echo $pdo->query("SELECT CURDATE() as 'Today';")->fetch()["Today"]; ?>" required />
            </div>
            <div class="md-form md-outline mb-3">
              <label for="appointment-time">Time Starts</label>
              <input type="time" class="form-control" placeholder="Select time" name="scheduleTime" value="08:00" required />
            </div>
            <div class="md-form md-outline mb-3">
              <label for="worker">Worker</label>
              <select class="custom-select mr-sm-2" name="scheduleWorker" id="worker">
                <?php
                $statement = $pdo->query("SELECT DISTINCT concat(WORKER.firstName, ' ', WORKER.lastName) AS \"workerName\", WORKER.workerID FROM BUSINESS
                      INNER JOIN SERVICES_OFFERED
                      ON BUSINESS.businessID = SERVICES_OFFERED.businessID AND BUSINESS.businessID = $businessID #change this
                        INNER JOIN EMPLOYEE
                        ON EMPLOYEE.serviceOfferedID = SERVICES_OFFERED.serviceOfferedID
                          INNER JOIN WORKER
                          ON EMPLOYEE.workerID = WORKER.workerID;");
                $workers = $statement->fetchAll();
                foreach ($workers as $option) {
                  echo "<option value=\"" . $option["workerID"] . "\">" . $option["workerName"] . "</option>\n";
                }
                ?>
              </select>
              <small>Note: The schedule's duration will be based on the selected employee's longest service</small>
            </div>
            <!-- <div class="md-form md-outline mb-3">
                  <label for="appointment-time">Duration (based on employee's longest service):</label>
              </div> -->
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="Submit" class="btn btn-success mr-5" name="Submit" value="addSchedule" form="schedule-form" formmethod="post">Add Schedule</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- MODAL FILTER -->
  <div class="modal fade" id="filterAppointments">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Filter Appointments</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5 class="d-flex justify-content-center">You need to confirm the upcoming appointment requests from clients
            before it will be set. Are you sure about this?
          </h5>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success mr-5" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  //Add Employee Back-end============================================================================================================
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Submit"] == "addEmployee") {
    $noEmpty = true;

    // echo $_POST["serviceName"];
    if (!empty($_POST["empFirstName"])) $empFirstName = inpClean($_POST["empFirstName"]);
    else $noEmpty = false;

    if (!empty($_POST["empLastName"])) $empLastName = inpClean($_POST["empLastName"]);
    else $noEmpty = false;

    if (isset($_POST['empService'])) $empServiceOfferedIDs = $_POST['empService'];
    else $noEmpty = false;


    if ($noEmpty) {
      try {
        $pdo->exec("INSERT INTO WORKER (firstName, lastName, createdAt, updatedAt) VALUES ('$empFirstName', '$empLastName', now(), now());");
        $workerID = $pdo->lastInsertId();

        foreach ($empServiceOfferedIDs as $row)
          $pdo->exec("INSERT INTO EMPLOYEE (serviceOfferedID, workerID, isActive, createdAt, updatedAt) VALUES ($row, $workerID, 1, now(), now());");
      } catch (Exception $e) {
        echo "Insertion error: $e";
      }
    }
  }
  ?>
  <!-- MODAL ADD EMPLOYEE -->
  <div class="modal fade" id="addEmployee">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Add Employee</h4>
            <button type="button" class="btn close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col form-group">
                <label for="exampleInputFName">First Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name" name="empFirstName">
              </div>
              <div class="col form-group">
                <label for="exampleInputLName">Last Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" name="empLastName">
              </div>
            </div>
            <div class="md-form md-outline mb-3">
              <label class="mr-sm-2" for="service">Service</label><br>
              <!-- <select class="my-select mr-sm-2" id="try" name="empService"> -->
              <!-- <option selected>Choose...</option> -->
              <?php
              $statement = $pdo->query("SELECT businessName, SERVICE.serviceID, SERVICES_OFFERED.serviceOfferedID, serviceName FROM BUSINESS 
                        INNER JOIN SERVICES_OFFERED 
                        ON BUSINESS.businessID = $businessID AND SERVICES_OFFERED.businessID = $businessID
                          INNER JOIN SERVICE
                          ON SERVICE.serviceID = SERVICES_OFFERED.serviceID;");
              $services = $statement->fetchAll();
              foreach ($services as $row) {
                // echo '<option value="'. $row['serviceOfferedID'] .'">'. $row['serviceName']. '</option>';
                echo '<input type="checkbox" name="empService[]" value="' . $row['serviceOfferedID'] . '"> ' . $row['serviceName'] . "<br>\n";
              }
              ?>
              <!-- <option value="1">Cleaning</option>
                    <option value="2">Pasta</option>
                    <option value="3">Tooth Extraction</option> -->
              <!-- </select>      -->
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="Submit" class="btn btn-success mr-5" name="Submit" value="addEmployee">Yes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- MODAL CLOSE SCHEDULE -->
  <div class="modal fade" id="closeSchedule">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Close Schedule</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col form-group">
              <label for="close-day-start">Date Start</label>
              <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" required="">
            </div>
            <div class=" col form-group">
              <label for="close-day-end">Last Date</label>
              <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" required="">
            </div>
          </div>
          <div class="row">
            <div class=" col form-group">
              <label for="appointment-time-start">Start Time</label>
              <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
            </div>
            <div class=" col form-group">
              <label for="appointment-time-end">End Time</label>
              <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success mr-5" data-dismiss="modal">Continue</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL CANCEL ALL -->
  <div class="modal fade" id="employeeCancel">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Cancel All Appointments</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5>Are you sure to CANCEL all of ______ appointments?</h5>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success mr-5" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL RESCHEDULE -->
  <div class="modal fade" id="employeeReschedule">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Reschedule All Appointments</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5>Are you sure to RESCHEDULE all of ______ appointments?</h5>
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
          <button type="submit" class="btn btn-success mr-5" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  <!-- MODAL CLOSE SCHEDULE Employee -->
  <div class="modal fade" id="closeScheduleEmployee">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title font-weight-bold">Close Schedule</h4>
          <button type="button" class="btn close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <h5>Are you sure to CLOSE _____ Schedule?</h5>
          <div class="row">
            <div class="col form-group">
              <label for="close-day-start">Date Start</label>
              <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" required="">
            </div>
            <div class=" col form-group">
              <label for="close-day-end">Last Date</label>
              <input type="date" class="form-control rounded-pill form-control-lg" placeholder="reschedule-date" required="">
            </div>
          </div>
          <div class="row">
            <div class=" col form-group">
              <label for="appointment-time-start">Start Time</label>
              <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
            </div>
            <div class=" col form-group">
              <label for="appointment-time-end">End Time</label>
              <input type="time" id="default-picker" class="form-control" placeholder="Select time" required="">
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success mr-5" data-dismiss="modal">Continue</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-side  bar control-sidebar-light">
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