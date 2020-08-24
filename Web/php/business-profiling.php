<?php
  require_once "pdo-conn.php";
  session_start();

  $businessID = $_SESSION["businessID"];
  $userID = $_SESSION["userID"];

  $statement = $pdo->query("SELECT * FROM USER WHERE userID = $userID;");
  $user = $statement->fetch();

  $firstName = $user["firstName"];
  $lastName = $user["lastName"];
  $middleName = "";
  $username = $user["username"];
  $password = "************";
  $birthday = $user["birthday"];
  $email = $user["email"];
  $phoneNumber = $user["contactNum"];

  $statement = $pdo->query("SELECT * FROM BUSINESS INNER JOIN BUSINESS_CATEGORY
  ON BUSINESS.businessCategoryID = BUSINESS_CATEGORY.businessCategoryID AND businessID = $businessID;");
  $business = $statement->fetch();

  $businessName = $business["businessName"];
  $businessAddress = $business["address"];
  $businessEmail = $business["email"];
  $businessContact = $business["contactNum"];
  $businessCategory = $business["businessCategory"];
  $businessDescription = $business["description"];

  function inpClean($data) { //Manglimpyo ni siya
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
  <!-- Business Picture style -->
  <link rel="stylesheet" href="..\css\picture-business.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" style="height:auto;">
<div class="wrapper">

  <?php include ("layout/navbar.php");?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">  
    <!-- Brand Logo -->
    <a href="#" class="brand-link pb-1">
      <img src="..\resources\Q-t-logo.png" alt="Q-t-logo" class="brand-image img-circle" style="opacity: .8">
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
            <a href="#" class="nav-link active">
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
  <div class="content-wrapper" syle="width: 70%">
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
    <section class="content mt-2 ml-5 mr-5">
        <div class="row ml-1 mb-2">
            <h2 class="uppercase font-weight-bold">Business Profile</h2>
        </div>
        <div class="container mr-5">
            <div class="card collapsed-card overflow-auto">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">User Account </h5>
        
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="maximize">
                          <i class="fas fa-expand"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                      </button>
                  </div>
                </div>
                <div class="card-body mb-0" style="display: none;">
                    <for method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"m>
                        <div class="card-body mb-0">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="exampleInputFName">First Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name" value="<?php echo $firstName;?>">
                               </div>
                               <div class=" col form-group">
                                    <label for="exampleInputLName">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" value="<?php echo $lastName;?>">
                                </div>
                                <div class=" col form-group">
                                    <label for="exampleInputMname">Middle Name</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Middle Name" value="<?php echo $middleName;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUserName">Username</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" value="<?php echo $username;?>">
                           </div>
                           <div class="form-group">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $password;?>">
                            </div>
                          <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="<?php echo $email;?>">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputContactNumber">Contact Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Contact Number" value="<?php echo $phoneNumber;?>">
                          </div>
        
                            <div class="row mb-0 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card collapsed-card overflow-auto">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">Business Details</h5>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                      </button>
                  </div>
                </div>
                <div class="card-body" style="display: none;">
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="card-body mb-0">
                        <div class="form-group">
                            <label for="wizard-picture3">Profile Pic</label>
                            <div class="col-7 col-sm-1">
                                <div class="picture-container">
                                    <div class="picture align-self-start">
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview3" title="">
                                        <input type="file" id="wizard-picture3" class="length-input">
                                    </div>
                                    <div class="choose-picture">
                                        <i class="fas fa-pen"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <label for="exampleInputBusinessName">Business Name</label>
                              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Business Name" value="<?php echo $businessName;?>">
                        </div>
                        <h7 class="font-weight-bold">Complete Address</h7>
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Street" value="<?php echo $businessAddress;?>">
                           </div>
                           <div class=" col form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Barangay">
                            </div>
                            <div class=" col form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="City">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputBusinessEmail">Business Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Business Email" value="<?php echo $businessEmail;?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBusinessContact Number">Business Contact Number</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Business Contact Number" value="<?php echo $businessContact;?>">
                        </div>
                    
      
                          <div class="row mb-0 d-flex flex-row-reverse">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
            <div class="card collapsed-card overflow-auto">
                <div class="card-header">
                  <h5 class="card-title font-weight-bold">Service Details</h5>
        
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                        <i class="fas fa-expand"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                      </button>
                  </div>
                </div>
                <div class="card-body" style="display: none;">
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="container-fluid ml-2">
                        <label for>Input Business Pictures</label>
                        <div class="row">
                            <div class="col-7 col-sm-1 mr-5">
                                <div class="picture-container">
                                    <div class="picture-business align-self-start">
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                                        <input type="file" id="wizard-picture" class="length-input">
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="col-7 col-sm-1 ml-5 mr-5">
                                <div class="picture-container">
                                    <div class="picture-business align-self-start">
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview1" title="">
                                        <input type="file" id="wizard-picture1" class="length-input">
                                    </div>
                                </div>
                            </div>
                        
                        
                            <div class="col-7 col-sm-1 ml-5">
                                <div class="picture-container">
                                    <div class="picture-business align-self-start">
                                        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview2" title="">
                                        <input type="file" id="wizard-picture2" class="length-input">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="card-body col-auto mr-5 mb-0">
                                <div class="form-group">
                                    <label class="mr-sm-2" for="service">Business Category</label>
                                    <select class="custom-select mr-sm-2" id="service">
                                        <!-- <option selected>Choose...</option> -->
                                        <?php 
                                          $statement = $pdo->query("SELECT * FROM BUSINESS_CATEGORY;");
                                          $businessCategories = $statement->fetchAll();
                                          foreach($businessCategories as $row){
                                            echo '<option value="'. $row['businessCategoryID'];
                                            if($businessCategory == $row['businessCategory'])
                                              echo "selected";
                                            echo '">'. $row['businessCategory']. '</option>';
                                          }
                                        ?>
                                        <!-- <option value="1">Grooming</option>
                                        <option value="2">Health</option>
                                        <option value="3">Others</option> -->
                                    </select>
                                </div>
                                <?php
                                  //BUSINESS HOURS DAPIT============================================================================

                                    $statement = $pdo->query("SELECT * FROM BUSINESS INNER JOIN BUSINESS_HOURS ON BUSINESS_HOURS.businessHoursID = BUSINESS.businessHoursID AND BUSINESS.businessID = $businessID;");
                                    $businessHours = $statement->fetch();

                                    // echo $businessID;
                                    // $monday = $businessHours["monday"];
                                    // $tuesday = $businessHours["tuesday"];
                                    // $wednesday = $businessHours["wednesday"];
                                    // $thursday = $businessHours["thursday"];
                                    // $friday = $businessHours["friday"];
                                    // $saturday = $businessHours["saturday"];
                                    // $sunday = $businessHours["sunday"];
                                    $businessHoursID = $businessHours["businessHoursID"];
                                    // $businessCategory = $businessHours["businessCategory"];
                                    $daysOpen = $businessHours["scheduleName"];

                                    $openingTime = $businessHours["businessOpen"];
                                    $closingTime = $businessHours["businessClose"];
                                    $lunchStart = $businessHours["lunchStart"];
                                    $lunchEnd = $businessHours["lunchEnd"];

                                    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Submit"] == "serviceDetails"){
                                      // echo "WD: " . $_POST["workingDays"] . " OP: " . $_POST["openingTime"] . " ID: " . $businessHoursID;
                                      $monday = $tuesday = $wednesday = $thursday = $friday = 1;
                                      $saturday = $sunday = 0;

                                      switch($_POST["workingDays"]){
                                      case "Everyday": $saturday = $sunday = 1; break;
                                      case "Weekends": $monday = $tuesday = $wednesday = $thursday = $friday = 0; $saturday = $sunday = 1; break;
                                      case "Weekdays and Saturdays": $saturday = 1; break;
                                      case "Weekdays and Sundays": $sunday = 1; break;
                                      }

                                      $daysOpen = $_POST["workingDays"];
                                      $openingTime = $_POST["openingTime"];
                                      $closingTime = $_POST["closingTime"];
                                      $lunchStart = $_POST["lunchStart"];
                                      $lunchEnd = $_POST["lunchEnd"];
                                      $businessDescription = $_POST["bioDescription"];
  
                                      try{
                                        $pdo->exec("UPDATE BUSINESS_HOURS SET monday = $monday, tuesday = $tuesday, wednesday = $wednesday, thursday = $thursday, friday = $friday, saturday = $saturday, sunday = $sunday,
                                        businessOpen = '$openingTime', businessClose = '$closingTime', lunchStart = '$lunchStart', lunchEnd = '$lunchEnd', updatedAt = now(), scheduleName = '$daysOpen'
                                        WHERE businessHoursID = $businessHoursID;");
                                        $pdo->exec("UPDATE BUSINESS SET description = '$businessDescription' WHERE businessID = $businessID");
                                      }
                                      catch(PDOException $e){
                                          echo "Insertion error! Error: " . $e;
                                      }
                                    }
                                ?>                                
                                <div class="form-group">
                                    <label class="mr-sm-2" for="workingDays">Choose Working Days</label>
                                    <select class="custom-select mr-sm-2" id="workingDays" name="workingDays">
                                        <!-- <option selected>Choose...</option> -->
                                        <option value="Weekdays" <?php if($daysOpen == "Weekdays") echo "Selected";?>>Weekdays</option>
                                        <option value="Everyday" <?php if($daysOpen == "Everyday") echo "Selected";?>>Everyday</option>
                                        <option value="Weekends" <?php if($daysOpen == "Weekends") echo "Selected";?>>Weekends</option>
                                        <option value="Weekdays and Saturdays" <?php if($daysOpen == "Weekdays and Saturdays") echo "Selected";?>>Weekdays and Saturdays</option>
                                        <option value="Weekdays and Sundays" <?php if($daysOpen == "Weekdays and Sundays") echo "Selected";?>>Weekdays and Sundays</option>
                                    </select>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="md-form md-outline mr-4">
                                        <label for="BOT">Business Opening Time</label>
                                        <input type="time" id="BOT" class="form-control" placeholder="Select time" name="openingTime" value="<?php echo $openingTime;?>">
                                    </div>
                                    <div class="md-form md-outline mr-4">
                                        <label for="LTS">Lunch Time Starts</label>
                                        <input type="time" id="LTS" class="form-control" placeholder="Select time" name="lunchStart" value="<?php echo $lunchStart;?>">
                                    </div>
                                    <div class="md-form md-outline mr-4">
                                        <label for="LTE">Lunch Time Ends</label>
                                        <input type="time" id="LTE" class="form-control" placeholder="Select time" name="lunchEnd" value="<?php echo $lunchEnd;?>">
                                    </div>
                                    <div class="md-form md-outline mr-4">
                                        <label for="BCT">Business Closing Time</label>
                                        <input type="time" id="BCT" class="form-control" placeholder="Select time" name="closingTime" value="<?php echo $closingTime;?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="keywords">Search Keywords:</label>
                                    <input type="text" class="form-control" id="keywords">
                                </div> -->
                                <div class="form-group">
                                    <label for="profileBio">Profile Bio</label>
                                    <textarea class="form-control" rows="5" id="profileBio" placeholder="Input description here..." name="bioDescription"><?php echo $businessDescription;?></textarea>
                                </div>
                                <div class="row mb-0 d-flex flex-row-reverse">
                                  <button type="submit" class="btn btn-primary" value="serviceDetails" name="Submit">Update</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="row margin-specific">
                        <div class="container-fluid">
                            <h6 class="font-weight-bold">My Services</h6>
                        </div>
                        <div class="card card-size ml-2">
                            <div class="card-header d-flex flex-row-reverse">
                                <button type="button" class="btn btn-tool mt-0" data-toggle="modal" data-target="#addService">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <h5 class="mr-2 mt-2 card-title font-weight-bold">Add Service</h5>
                            </div>

                            <div class="modal fade" id="addService">
                              <?php
                            //Add Service Back-end============================================================================================================
                              if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Submit"] == "addService"){
                                $noEmpty = true;

                                // echo $_POST["serviceName"];
                                if(!empty($_POST["serviceName"])) $serviceName = inpClean($_POST["serviceName"]);
                                else $noEmpty = false;

                                if(!empty($_POST["serviceDuration"])) $serviceDuration = inpClean($_POST["serviceDuration"]);
                                else $noEmpty = false;

                                if(!empty($_POST["cleaningDuration"])) $cleaningDuration = inpClean($_POST["cleaningDuration"]);
                                else $noEmpty = false;

                                if(!empty($_POST["maxClients"])) $maxClients = inpClean($_POST["maxClients"]);
                                else $noEmpty = false;

                                if(!empty($_POST["startingPrice"])) $startingPrice = inpClean($_POST["startingPrice"]);
                                else $noEmpty = false;

                                if(!empty($_POST["endingPrice"])) $endingPrice = inpClean($_POST["endingPrice"]);
                                else $noEmpty = false;

                                $serviceDetails = inpClean($_POST["serviceDetails"]);
                                
                                if($noEmpty){
                                  if($serviceDuration >= 60){
                                    $hr = (int) ($serviceDuration / 60);
                                    $mins = (int) $serviceDuration % 60;
                                    $serviceDurationTime = $hr . ":" . $mins . ":00";
                                  }
                                  else
                                    $serviceDurationTime = '00:' . (string) $serviceDuration . ':00';

                                    if($cleaningDuration >= 60){
                                      $hr = (int) ($cleaningDuration / 60);
                                      $mins = (int) $cleaningDuration % 60;
                                      $cleaningDurationTime = $hr . ":" . $mins . ":00";
                                    }
                                    else
                                      $cleaningDurationTime = '00:' . (string) $cleaningDuration . ':00';
  
                                    
                                  $pdo->exec("INSERT INTO SERVICE (serviceName, serviceDuration, cleaningDuration, startingPrice, endingPrice, description, maxClients, createdAt, updatedAt)
                                    VALUES('$serviceName', '$serviceDurationTime', '$cleaningDurationTime', $startingPrice, $endingPrice, '$serviceDetails', $maxClients, now(), now());");
                                  $serviceID = $pdo->lastInsertId();

                                  $pdo->exec("INSERT INTO SERVICES_OFFERED (businessID, serviceID, createdAt, updatedAt) VALUES($businessID, $serviceID, now(), now());");
                                  // echo "YAY";
                                }

                              }
                              ?>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title font-weight-bold">Add Service</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>  
                                        <!-- ADD service Modal body -->
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                        <div class="modal-body">
                                            <div class="container ml-2 mr-2">
                                               
                                                    <div class="form-group">
                                                        <label for="service-name">Service Name</label>
                                                        <input type="text" class="form-control" id="service-name" placeholder="Service Name" name="serviceName">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            
                                                        <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="minutes">Service Duration</button> -->
                                                                <button class="btn btn-outline-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="minutes">Service Duration</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Minutes</a>
                                                                    <a class="dropdown-item" href="#">Hours</a>
                                                                </div>
                                                            <input type="number" class="form-control" aria-label="Text input with dropdown button" style="text-align:right;" value="30" name="serviceDuration">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">mins.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                      <div class="input-group mb-3">
                                                          
                                                              <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="minutes">Cleaning Duration</button>
                                                              <div class="dropdown-menu">
                                                                  <a class="dropdown-item" href="#">Minutes</a>
                                                                  <a class="dropdown-item" href="#">Hours</a>
                                                              </div>
                                                          <input type="number" class="form-control" aria-label="Text input with dropdown button" name="cleaningDuration" value="15" style="text-align:right;">
                                                          <div class="input-group-append">
                                                                <span class="input-group-text">mins.</span>
                                                          </div>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Maximum Clients per Service</span>
                                                      </div>
                                                      <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="5" name="maxClients">
                                                    </div>
                                                    
                                                    <small>Price Starts will be used for the booking fee</small>
                                                    <div class="input-group mb-3">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text" id="">Price Range</span>
                                                      </div>
                                                      <input type="number" class="form-control" placeholder="Price Starts" name="startingPrice">
                                                      <input type="number" class="form-control" placeholder="Price Ends" name="endingPrice">
                                                    </div>
                                                
                                                
                                                    <div class="form-group">
                                                        <label for="service-details">Service Details</label>
                                                        <textarea class="form-control" rows="5" id="service Details" placeholder="Place details here..." name="serviceDetails"></textarea>
                                                    </div>

                                                    <label for>Input Service Pictures</label>
                                                    <div class="row">
                                                        
                                                            <div class="col picture-container mr-2">
                                                                <div class="picture-business align-self-start">
                                                                    <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview4" title="">
                                                                    <input type="file" id="wizard-picture4" class="length-input">
                                                                </div>
                                                            </div>
                                                        
                                                    
                                                    
                                                            <div class="col picture-container mr-2">
                                                                <div class="picture-business align-self-start">
                                                                    <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview5" title="">
                                                                    <input type="file" id="wizard-picture5" class="length-input">
                                                                </div>
                                                            </div>
                                                        
                                                    
                                                    
                                                            <div class="col picture-container">
                                                                <div class="picture-business align-self-start">
                                                                    <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview6" title="">
                                                                    <input type="file" id="wizard-picture6" class="length-input">
                                                                </div>
                                                            </div>
                                                        

                                                    </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="Submit" value="addService" id="Submit">Add</button>
                                        </div>
                                  </div>
                                </form> 
                                </div>
                            </div>
                      
                            <!-- /.card-header -->
                         <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Service Name</th>
                                        <th>Service Duration</th>
                                        <th>Cleaning Duration</th>
                                        <th>Total Duration</th>
                                        <th>Price Starts</th>
                                        <th>Booking Fee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  // $statement = $pdo->query("SELECT businessName, SERVICE.serviceID, serviceName, serviceDuration, cleaningDuration, addtime(serviceDuration, cleaningDuration) as totalDuration, startingPrice, endingPrice FROM BUSINESS 
                                  //   INNER JOIN SERVICES_OFFERED 
                                  //   ON BUSINESS.businessID = $businessID AND SERVICES_OFFERED.businessID = $businessID
                                  //     INNER JOIN SERVICE
                                  //     ON SERVICE.serviceID = SERVICES_OFFERED.serviceID;"); 
                                  $statement = $pdo->query("SELECT businessName, SERVICE.serviceID, serviceName, 
                                  if(serviceDuration >= '01:00:00', concat(time_format(serviceDuration, '%H'), ' hrs. and ', time_format(serviceDuration, '%i'), ' mins.'), concat(time_format(serviceDuration, '%i'), ' mins.')) AS 'serviceDuration', 
                                  if(cleaningDuration >= '01:00:00', concat(time_format(cleaningDuration, '%H'), ' hrs. and ', time_format(cleaningDuration, '%i'), ' mins.'), concat(time_format(cleaningDuration, '%i'), ' mins.')) AS 'cleaningDuration', 
                                  if(addtime(serviceDuration, cleaningDuration) >= '01:00:00', concat(time_format(addtime(serviceDuration, cleaningDuration), '%H'), ' hrs. and ', time_format(addtime(serviceDuration, cleaningDuration), '%i'), ' mins.'), concat(time_format(addtime(serviceDuration, cleaningDuration), '%i'), ' mins.')) AS 'totalDuration', 
                                  startingPrice, endingPrice FROM BUSINESS 
                                    INNER JOIN SERVICES_OFFERED 
                                    ON BUSINESS.businessID = $businessID AND SERVICES_OFFERED.businessID = $businessID
                                      INNER JOIN SERVICE
                                      ON SERVICE.serviceID = SERVICES_OFFERED.serviceID;"); 

                                  $servicesOffered = $statement->fetchAll();
                                  foreach ($servicesOffered as $row) {
                                    echo '                                    
                                    <tr data-toggle="modal" data-target="#editService">
                                      <td>' . $row["serviceName"] . '</td>
                                      <td>' . $row["serviceDuration"] . '</td>
                                      <td>' . $row["cleaningDuration"] . '</td>
                                      <td>' . $row["totalDuration"] . '</td>
                                      <td> ₱ ' . (float) $row["startingPrice"] . '</td>
                                      <td> ₱ ' . (float) $row["startingPrice"] / 2 . '</td>
                                    </tr>
                                    ';
                                  }
                                  // echo '                                    
                                  // <tr data-toggle="modal" data-target="#editService">
                                  //   <td>Tooth Extraction</td>
                                  //   <td>15 mins</td>
                                  //   <td>5 mins</td>
                                  //   <td>20 mins</td>
                                  //   <td>200</td>
                                  //   <td>100</td>
                                  // </tr>
                                  // ';
                                  ?>
                                </tbody>
                                    <div class="modal fade" id="editService">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title font-weight-bold">Edit Service</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>  
                                                <!-- ADD service Modal body -->
                                                <div class="modal-body">
                                                    <div class="container ml-2 mr-2">
                                                        
                                                            <div class="form-group">
                                                                <label for="service-name">Service Name</label>
                                                                <input type="text" class="form-control" id="service-name">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unit of Time</button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="#">Minutes</a>
                                                                            <a class="dropdown-item" href="#">Hours</a>
                                                                        </div>
                                                                    <input type="number" class="form-control" aria-label="Text input with dropdown button">
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input type="number" class="form-control" id="price">
                                                            </div>
                                                       
                                                            <div class="form-group">
                                                                <label for="service-details">Service Details</label>
                                                                <textarea class="form-control" rows="5" id="service Details"></textarea>
                                                            </div>
                                                      <!-- Modal footer -->
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-success mr-6" data-dismiss="modal">Save Changes</button>
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Remove</button>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                  </div>
                </form>
              </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->    
        </div>
    </section>
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
<script src="..\jss\addPicture.js"></script>
</body>
</html>
