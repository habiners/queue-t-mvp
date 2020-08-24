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
        
        <script src="..\js\date.js"></script>
        
        <title>Appointments</title>
    </head>

    <body>
        <!-- BODY -->
        <div class="container-shopProfile content-bottom-spacing">
            <div class="row header-content make-appointment"> <!-- header content is in appointment-content.css while make-appointment is in shop.profile.css-->
                <div class="col-sm-x3">
                    <a href="notification.php">
                        <span class="material-icons back-icon">
                            keyboard_backspace
                        </span>
                    </a>
                </div>
                <div class="col">
                    <h3 class="mt-2">Make Appointment</h3>
                </div>
            </div>

            <div class="container-fluid mt-2 justify-content-center">
                <div class="row">
                    <div class="col mt-2">
                        <h4 class="store-name">Jajavin BeauTeethful</h4>
                    </div>
                </div>
                <form class="login-form-heading text-center">
                    <div class="form-group">
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected value="1">Tooth Extraction</option>
                            <option value="2"><a href="home.php">Cleaning & Pasta</a></option>
                        </select>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                        <span>Duration: 15 mins</span>
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
            
            <!--<div class="container-fluid mt-4">
                <div class="row mt-3 margin">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Tooth Extraction</label>
                    </div>
                </div>
                <div class="row mt-3 margin">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Tooth Induction</label>
                    </div>
                </div>
                <div class="row mt-3 margin">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Cleaning</label>
                    </div>
                </div>
                <div class="row mt-3 margin">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">Embracing</label>
                    </div>
                </div>    
            </div>-->
            <div class="row mt-5">
                <div class="col d-flex justify-content-center">
                    <button type="button" class="btn make-appointment" data-toggle="modal" data-target="#appointment-verify">
                        Set
                    </button>
                      
                    <!-- Modal -->
                    <div class="modal fade" id="appointment-verify" tabindex="-1" role="dialog" aria-labelledby="appointment-verify" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header modal-header-appointment"> <!-- modal-header-appointment is in appointment-content.css -->
                              <h5 class="modal-title" id="appointment-verify">Set Appointment</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <h10>Summary of Appointment</h10>
                                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                                      
                                 
                            </div>

                            <div class="modal-footer">
                                
                               <div class="row note-content">
                                   <div class="col-sm-x3  mt-2">
                                      <h7>Booking Fee: </h7> 
                                   </div>
                                   <div class="col-sm-x3 mt-2">
                                      <h7>75.00</h7> 
                                   </div>
                                   <div class="col-sm-x3 mt-2"><button type="button " href="appointment.php" class="btn make-appointment ">Pay</button></div>
                                   
                               </div>
                                
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