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
        <link rel="stylesheet" href="..\css\navigation.css">
        <link rel="stylesheet" href="..\css\context.css">
        <link rel="stylesheet" href="..\css\appointment-content.css">
        <link rel="stylesheet" href="..\css\shop-profile.css">
        
        <script src="..\js\javascripts.js"></script>
        <title>Appointments</title>
    </head>

    <body>
        <!-- Home Content -->
        <div class="container-normal content-bottom-spacing">
            <div class="row header-content">
                <div class="col-sm-x3">
                    <a href="appointment.php">
                        <span class="material-icons back-icon">
                            keyboard_backspace
                        </span>
                    </a>
                </div>
                <div class="col-sm-x3-6">
                    <h4 class="notif-type">Appointment</h4>
                </div>
            </div>
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col mt-2">
                        <h6 class="store-name">Nio's Clinic</h6>
                    </div>
                    <div class="col-sm-x3 d-flex flex-row-reverse">
                        <a href="shop-profile.php">
                            <span class="material-icons view-icon d-flex flex-row-reverse">
                                pageview
                            </span> 
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-x6 address-header">
                        <h5>Address</h5>
                    </div>
                    <div class="col d-flex flex-row-reverse address-header-icon">
                        <span class="material-icons">
                            location_on
                        </span>
                    </div>
                    <div class="row text-left address-details mr-2">
                        <p>760 J. Avila St., Brgy. Capitol Site, Cebu City</p>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <h5>Appointment Details</h5>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Status:</p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>Ongoing</p>
                    </div>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Appointment Date:</p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                      <p id="dateAppointmentView3">Date Today</p>
                    </div>
                </div>
                <div class="row heading-content">
                  <div class="col-sm-x3">
                      <p>Appointment Time:</p>
                  </div>
                  <div class="col-sm-x3 ml-2">
                    <p>5:10-5:25 PM</p>
                  </div>
              </div>
                <div class="row d-flex flex-row-reverse mt-3 mb-3">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#queue_room">
                      Queue Room
                  </button>
                </div>
                <div class="modal fade" id="queue_room" tabindex="-1" role="dialog" aria-labelledby="queue_room" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
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
            <div class="row table-format">
                <table class="table">
                    <thead class="thead-format">
                      <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Service Duration</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tooth Extraction</td>
                        <td>15 mins</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Cancel
                    </button>
                      
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header modal-header-cancel">
                              <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to Tooth Extraction in Nio's Clinic?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger">Cancel Appointment</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                
                <div class="col d-flex flex-row-reverse">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reschedules">
                        Resechedule
                    </button>
                
                      
                    <!-- Modal -->
                    <div class="modal fade" id="reschedules" tabindex="-1" role="dialog" aria-labelledby="reschedule" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header modal-header-reschedule">
                              <h5 class="modal-title" id="reschedule">Reschedule Appointment</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure to Reschedule Tooth Extraction in Nio's Clinic?</p>
                                
                                <div class="md-form md-outline mb-3">
                                  <div class="container-fluid">
                                      <div class="row mt-2 heading-content">
                                          <table class="table">
                                              <thead class="thead-format">
                                                <tr>
                                                  <th scope="col">Service</th>
                                                  <th scope="col">Service Duration</th>
                                                </tr>
                                              </thead>
                                              <tbody></tbody>
                                                <tr>
                                                  <td>Tooth Extraction</td>
                                                  <td>15 mins</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                      </div>
                                  </div> 
                              </div>
                                <div class="row d-flex justify-content-center">
                                  <button type="button" class="btn btn-arrow hover-effect">
                                    <span class="material-icons">
                                        arrow_back_ios
                                    </span>
                                  </button>
                                  <h5 class="mt-2" id="dateAppointmentView3">Date Today</h5>
                                  <button type="button" class="btn btn-arrow hover-effect">
                                    <span class="material-icons">
                                        arrow_forward_ios
                                    </span>
                                  </button>
                                </div>
                                <div class="row justify-content-center">
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
                                              <tr>
                                                  <td>
                                                      <div class="row ml-1 info-box hover-effect" data-toggle="modal" data-target="#myCurrentServing">
                                                          <span class="info-box-icon font-weight-bold hover-effect"></span>
                                                          <div class="col">
                                                            <h5 class="info-box-text font-weight-bold uppercase small">5:25-5:40PM</h5>
                                                            <h5 class="info-box-text font-weight-bold uppercase">
                                                                VACANT
                                                            </h5>
                                                           </div>
                                                      </div>
                                                  </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                    <div class="row ml-1 info-box hover-effect" data-toggle="modal" data-target="#myCurrentServing">
                                                        <span class="info-box-icon font-weight-bold hover-effect"></span>
                                                        <div class="col">
                                                          <h5 class="info-box-text font-weight-bold uppercase small">5:40-5:55PM</h5>
                                                          <h5 class="info-box-text font-weight-bold uppercase">
                                                              VACANT
                                                          </h5>
                                                         </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                      </table>
                                </div>
                               <div class="row justify-content-center">
                                <div class="col-sm-x3 justify-content-center mt-2">
                                    <label for="appointment-time">Start Time:</label>
                                    <input type="time" id="default-picker" class="form-control" placeholder="Select time" required>
                                </div>
                                <div class="col-sm-x3 justify-content-center mt-2">
                                    <label for="appointment-time">End Time:</label>
                                    <input type="time" id="default-picker" class="form-control" placeholder="Select time" required>
                                </div>
                               </div>
                        
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary">Reschedule Appointment</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>
    </body>
</html>