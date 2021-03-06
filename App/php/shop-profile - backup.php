<!doctype html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\css\style.css">
        <link rel="stylesheet" href="..\css\navigation.css">
        <link rel="stylesheet" href="..\css\context.css">
        <link rel="stylesheet" href="..\css\appointment-content.css">
        <link rel="stylesheet" href="..\css\shop-profile.css">
        <script src="..\js\javascripts.js"></script>

        <title>Appointments</title>
    </head>

    <body>
    <?php
      require_once "pdo-conn.php";
      
      if(isset($_GET["id"]))
        $businessID = $_GET["id"];
      else
        $businessID = 0;
      // echo $businessID;

      $businessName = "Not found :(";
      $businessAddress = "In the middle of nowhere";
      $businessDescription = "I have nothing to say";

      if($businessID > 0){
        $statement = $pdo->query("SELECT * FROM BUSINESS WHERE businessID = $businessID");
        $business = $statement->fetch();

        $businessName = $business["businessName"];
        $businessAddress = $business["address"];
        $businessDescription = $business["description"];

        $statement = $pdo->query("SELECT scheduleName, 
          concat(date_format(businessOpen, '%h:%i') , ' ', IF(TIME(businessOpen) >= '12:00:00', 'PM', 'AM')) as 'businessOpen',
          concat(date_format(businessClose, '%h:%i') , ' ', IF(TIME(businessClose) >= '12:00:00', 'PM', 'AM')) as 'businessClose',
          concat(date_format(lunchStart, '%h:%i') , ' ', IF(TIME(lunchStart) >= '12:00:00', 'PM', 'AM')) as 'lunchStart',
          concat(date_format(lunchEnd, '%h:%i') , ' ', IF(TIME(lunchEnd) >= '12:00:00', 'PM', 'AM')) as 'lunchEnd'
            FROM BUSINESS INNER JOIN BUSINESS_HOURS 
            ON BUSINESS_HOURS.businessHoursID = BUSINESS.businessHoursID AND BUSINESS.businessID = $businessID;
      ");
        $businessHours = $statement->fetch();

        $businessSchedule = $businessHours["scheduleName"];
        $businessOpens = $businessHours["businessOpen"];
        $businessCloses = $businessHours["businessClose"];
        $businessLunchStarts = $businessHours["lunchStart"];
        $businessLunchEnds = $businessHours["lunchEnd"];
      }
    ?>
        <!-- Home Content THE FONT IS IN STYLE.CSS -->
        <div class="container-shop content-bottom-spacing">
            <div id="demo" class="row carousel slide pics-size" data-ride="carousel">
                
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner"> 
                  <div class="carousel-item active">
                    <img src="..\resources\clinic.jpg" class="store-prof-img" alt="Los Angeles" width="500" height="200">
                    <div class="carousel-caption">
                      <h3><?php echo $businessName;?></h3>
                        <div class="row d-flex justify-content-center"> 
                            <span>4.5</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="..\resources\c2.jpg" class="store-prof-img" alt="Chicago" width="500" height="200">
                    <div class="carousel-caption">
                        <h3><?php echo $businessName;?></h3>
                        <div class="row d-flex justify-content-center"> 
                            <span>4.5</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                        </div>
                    </div>  
                  </div>
                  <div class="carousel-item">
                    <img src="..\resources\c3.jpg" class="store-prof-img" alt="New York" width="500" height="200">
                    <div class="carousel-caption">
                      <h3><?php echo $businessName;?></h3>
                      <div class="row d-flex justify-content-center"> 
                        <span>4.5</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                      </div>
                    </div>
               
                  </div>
                </div>
                <a class="carousel-control shop-profile-back-icon" href="home.php">
                    <span class="material-icons d-flex flex-row shop-profile-back-icon">
                        keyboard_backspace
                    </span>
                </a>
                <a class="carousel-control carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next shop-profile-info-icon pb-0 mb-0" href="home.php" data-toggle="modal" data-target="#info-store-modal">
                    <span class="material-icons d-flex flex-row shop-profile-back-icon">
                        info
                    </span>
                </a>
                <!-- Info Modal -->
                <div class="modal fade" id="info-store-modal" tabindex="-1" role="dialog" aria-labelledby="#info-store-modal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header modal-header-info">
                          <h5 class="modal-title" id="info-store-modal"><?php echo $businessName;?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row ml-1 mr-1">
                                <h5>About Us</h5>
                                <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p> -->
                            </div>  
                            <div class="row ml-1 mr-1">
                                <p style="margin-left: 1em;"><?php echo "$businessDescription";?></p>
                            </div>                              
                        </div>
                      </div>
                    </div>
                </div>

                <a class="carousel-control carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
            </div>
              
            <div class="row pb-0 shop-prof-header-content">
                <div class="col-sm-x3 d-flex mt-1 ml-2 mb-1">
                    <span class="material-icons">
                        location_on
                    </span>
                </div>
                <div class="col mt-1 mb-1">
                    <h7><?php echo $businessAddress;?></h7>
                </div>
            </div>
            <div class="container-fluid mt-2">
                <div class="row">
                    <h5>Operation Details</h5>
                </div>  
                <div class="row heading-content pb-0">
                    <div class="col-sm-x3 pb-0">
                        <p class="pb-0">Opens:</p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <!-- <p>Weekdays (9:00AM to 6PM)</p> -->
                        <p><?php echo "$businessSchedule $businessOpens to $businessCloses";?></p>
                    </div>
                </div>
                <div class="row heading-content pb-0">
                    <div class="col-sm-x3 pb-0">
                        <p class="pb-0">Lunch Time:</p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <!-- <p>12:00 noon to 1 pm</p> -->
                        <p><?php echo "$businessLunchStarts to $businessLunchEnds";?></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <h5>Today's Queueing Details</h5>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Status: </p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>Open</p>
                    </div>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Daily Maximum Appointments: </p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>10</p>
                    </div>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Now Serving: </p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>4</p>
                    </div>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Last Queue: </p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>5</p>
                    </div>
                </div>
                <div class="col d-flex flex-row-reverse">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#queue_room">
                      Queue Room
                  </button>
                </div>
                <div class="modal fade" id="queue_room" tabindex="-1" role="dialog" aria-labelledby="queue_room" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <!-- Beggining of end -->
                    <div id="employee" class="row carousel slide pics-size" data-ride="carousel">
                
                <ul class="carousel-indicators">
                  <li data-target="#employee" data-slide-to="0" class="active"></li>
                  <li data-target="#employee" data-slide-to="1"></li>
                  <li data-target="#employee" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner"> 
                  <div class="carousel-item active">
                    <img src="..\resources\clinic.jpg" class="store-prof-img" alt="Los Angeles" width="500" height="200">
                    <div class="carousel-caption">
                      <h3><?php echo $businessName;?></h3>
                        <div class="row d-flex justify-content-center"> 
                            <span>4.5</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="..\resources\c2.jpg" class="store-prof-img" alt="Chicago" width="500" height="200">
                    <div class="carousel-caption">
                        <h3><?php echo $businessName;?></h3>
                        <div class="row d-flex justify-content-center"> 
                            <span>4.5</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                            <span class="material-icons rating">star</span>
                        </div>
                    </div>  
                  </div>
                  <div class="carousel-item">
                    <img src="..\resources\c3.jpg" class="store-prof-img" alt="New York" width="500" height="200">
                    <div class="carousel-caption">
                      <h3><?php echo $businessName;?></h3>
                      <div class="row d-flex justify-content-center"> 
                        <span>4.5</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                        <span class="material-icons rating">star</span>
                      </div>
                    </div>
               
                  </div>
                </div>
                <a class="carousel-control shop-profile-back-icon" href="home.php">
                    <span class="material-icons d-flex flex-row shop-profile-back-icon">
                        keyboard_backspace
                    </span>
                </a>
                <a class="carousel-control carousel-control-prev" href="#employee" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next shop-profile-info-icon pb-0 mb-0" href="home.php" data-toggle="modal" data-target="#employee-store-modal">
                    <span class="material-icons d-flex flex-row shop-profile-back-icon">
                        info
                    </span>
                </a>
                <!-- Info Modal -->
                <div class="modal fade" id="employee-store-modal" tabindex="-1" role="dialog" aria-labelledby="#employee-store-modal-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header employee-header-info">
                          <h5 class="modal-title" id="employee-store-modal"><?php echo $businessName;?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row ml-1 mr-1">
                                <h5>About Us</h5>
                                <!-- <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p> -->
                            </div>  
                            <div class="row ml-1 mr-1">
                                <p style="margin-left: 1em;"><?php echo "$businessDescription";?></p>
                            </div>                              
                        </div>
                      </div>
                    </div>
                </div>

                <a class="carousel-control carousel-control-next" href="#employee" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a>
            </div>
                      <div class="modal-header modal-header-reschedule">
                        <h5 class="modal-title" id="reschedule">Queue Room</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <div class="container-fluid">
                             
                                <div class="row justify-content-center">
                                 
                                  <div class="col">
                                    <h5 class="mt-2" id="dateAppointmentView2">Date Today</h5>
                                  </div>
                                  
                                </div>
                                <div class="row justify-content-center mt-2">
                                    <table>
                                        <tbody class="table-light">
                                              <tr>
                                                  <td>
                                                      <div class="row ml-1 info-box bg-serving hover-effect">
                                                          <span class="info-box-icon font-weight-bold bg-serving hover-effect large">4</span>
                                                          <div class="col">
                                                                <h5 class="info-box-text font-weight-bold uppercase small">4:10-5:10 PM</h5>
                                                                <h5 class="info-box-text font-weight-bold uppercase">
                                                                    NOW SERVING
                                                                </h5>
                                                                <h5 class="info-box-text small">Cleaning & Pasta</h5>
                                                          </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td>
                                                      <div class="row ml-1 info-box hover-effect">
                                                          <span class="info-box-icon font-weight-bold  hover-effect">5</span>
                                                          <div class="col">
                                                            <h5 class="info-box-text font-weight-bold uppercase small">5:10-5:25 PM</h5>
                                                            <h5 class="info-box-text font-weight-bold text-uppercase">
                                                                Standby
                                                            </h5>
                                                            <h5 class="info-box-text small">Tooth Extraction</h5>
                                                          </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                              </div>
                          </div> 
                      </div>
                    </div>
                  </div>
              </div>

                <div class="row mt-3 ml-2">
                    <h5>List of Services</h5>
                </div>
            
            <div class="row mt-0 pt-0 table-format">
                <table class="table">
                    <thead class="thead-format">
                      <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Service Duration</th>
                        <th scope="col">Booking Fee</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $services = $pdo->query("SELECT businessName, SERVICE.serviceID, serviceName, 
                        if(serviceDuration >= '01:00:00', concat(time_format(serviceDuration, '%H'), ' hrs. and ', time_format(serviceDuration, '%i'), ' mins.'), concat(time_format(serviceDuration, '%i'), ' mins.')) AS 'newServiceDuration', 
                        if(cleaningDuration >= '01:00:00', concat(time_format(cleaningDuration, '%H'), ' hrs. and ', time_format(cleaningDuration, '%i'), ' mins.'), concat(time_format(cleaningDuration, '%i'), ' mins.')) AS 'newCleaningDuration', 
                        if(addtime(serviceDuration, cleaningDuration) >= '01:00:00', concat(time_format(addtime(serviceDuration, cleaningDuration), '%H'), ' hrs. and ', time_format(addtime(serviceDuration, cleaningDuration), '%i'), ' mins.'), concat(time_format(addtime(serviceDuration, cleaningDuration), '%i'), ' mins.')) AS 'totalDuration', 
                        startingPrice, endingPrice FROM BUSINESS 
                          INNER JOIN SERVICES_OFFERED 
                          ON BUSINESS.businessID = $businessID AND SERVICES_OFFERED.businessID = $businessID
                            INNER JOIN SERVICE
                            ON SERVICE.serviceID = SERVICES_OFFERED.serviceID;")->fetchAll();

                          foreach($services as $service){
                            echo '
                              <tr>
                                <td data-toggle="modal" data-target="#t1-store-modal">' . $service["serviceName"] . '</td>
                                <td data-toggle="modal" data-target="#t1-store-modal">' . $service["totalDuration"] . '</td>
                                <td data-toggle="modal" data-target="#t1-store-modal">Php ' . number_format($service["startingPrice"] / 2, 2) . '</td>
                                <div class="modal fade" id="t1-store-modal" tabindex="-1" role="dialog" aria-labelledby="#t1-store-modal-label" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header modal-header-info">
                                        <h5 class="modal-title" id="t1-store-modal">' . $service["serviceName"] . '</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row ml-1 mr-1">
                                          <h5>About The Service</h5>
                                          <p>Dentists and oral surgeons perform tooth extractions. Before pulling the tooth, your dentist will give you an injection of a local anesthetic to numb the area where the tooth will be removed. In some instances, your dentist may use a strong general anesthetic. This will prevent pain throughout your body and make you sleep through the procedure.</p>
                                          <div id="demo2" class="row carousel slide pics-size" data-ride="carousel">
                                            <ul class="carousel-indicators">
                                              <li data-target="#demo2" data-slide-to="0" class="active"></li>
                                              <li data-target="#demo2" data-slide-to="1"></li>
                                              <li data-target="#demo2" data-slide-to="2"></li>
                                            </ul>
                                            <div class="carousel-inner"> 
                                              <div class="carousel-item active">
                                                <img src="..\resources\tooth_extraction.jpg" class="store-prof-img" alt="Los Angeles" width="500" height="200">
                                              </div>
                                              <div class="carousel-item">
                                                <img src="..\resources\tooth-extraction-northamptonshire.jpg" class="store-prof-img" alt="Chicago" width="500" height="200">
                                              </div>
                                              <div class="carousel-item">
                                                <img src="..\resources\tooth-extraction-tremont-800x518.jpg" class="store-prof-img" alt="New York" width="500" height="200">
                                              </div>
                                            </div>
                                                  
                                            <a class="carousel-control carousel-control-prev" href="#demo2" data-slide="prev">
                                              <span class="carousel-control-prev-icon"></span>
                                            </a>
                                            <!-- Info Modal was previously here but I deleted it-->
                                            <a class="carousel-control carousel-control-next" href="#demo2" data-slide="next">
                                              <span class="carousel-control-next-icon"></span>
                                            </a>
                                            <a class="carousel-control carousel-control-next" href="#demo2" data-slide="next">
                                              <span class="carousel-control-next-icon"></span>
                                            </a>
                                          </div>
                                        </div>  
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </tr>
                            ';
                          }
                      ?>

                      <tr>
                        <td  data-toggle="modal" data-target="#t2-store-modal">Cleaning & Pasta</td>
                        <td data-toggle="modal" data-target="#t2-store-modal">1 hr</td>
                        <td  data-toggle="modal" data-target="#t2-store-modal">Php 500.00</td>
                        <div class="modal fade" id="t2-store-modal" tabindex="-1" role="dialog" aria-labelledby="#t2-store-modal-label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header modal-header-info">
                                <h5 class="modal-title" id="t2-store-modal">Cleaning & Pasta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row ml-1 mr-1">
                                        <h5>About The Service</h5>
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                    </div>  
                                </div>
                            </div>
                            </div>
                        </div>
                    </tbody>
                  </table>

                  <!-- THIS BUTTON STYLE IS IN STYLE.CSS but is enhanced in terms of size in SHOP-PROFILE.CSS using "make-appointment-button" -->
                  <a type="button" href="shop-profile-make-appointment.php" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase make-appointment-button" role="button">Make Appointment</a>
                
            </div>
        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>
    </body>
</html>