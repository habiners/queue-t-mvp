<?php
  require_once "pdo-conn.php";
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $statement = $pdo->query("SELECT businessName from BUSINESS WHERE businessID = " . $_SESSION["businessID"] . ";");
  
  $businessName = $statement->fetch()["businessName"];
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-violet"> <!-- nav-bar violet is in qt-web.css -->
    <!-- Left navbar links -->
    <ul class="navbar-nav" onclick="calendarHide()">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mt-2 d-flex">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-item dropdown-header">15 New Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="notifications.php" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 New Appointments
            </a>
            <div class="dropdown-divider"></div>
            <a href="notifications.php" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 Cancelled Appointments
            </a>
            <div class="dropdown-divider"></div>
            <a href="notifications.php" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 Reschedule Appointments
            </a>
            <div class="dropdown-divider"></div>
            <a href="notifications.php" class="dropdown-item dropdown-footer">See All 20 Notifications</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <div class="user-panel mt-2 pb-1 mb-1 d-flex">
          <div class="image">
            <img src="..\resources\jav-pic.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
          <!-- <a href="#" class="d-block">Jajavin BeauTeethful</a> -->
          <a href="#" class="d-block"><?php echo $businessName;?></a>
          </div>
        </div>
        
        <!-- Account Profile Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-caret-down mt-2"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Contact Us
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Account Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="webLogin.php" class="dropdown-item dropdown-footer">Log-out </a>
          </div>
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->