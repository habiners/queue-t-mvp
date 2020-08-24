<!doctype html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\css\navigation.css">
        <link rel="stylesheet" href="..\css\context.css">
        <link rel="stylesheet" href="..\css\appointment-content.css">
        <link rel="stylesheet" href="..\css\shop-profile.css">
        
        <title>Appointments</title>
    </head>

    <body>
        <!-- Home Content -->
        <div class="container-rate content-bottom-spacing">
            <div class="row header-content header-content-rate">
                <div class="col-sm-x3">
                    <a href="notification.php">
                        <span class="material-icons back-icon">
                            keyboard_backspace
                        </span>
                    </a>
                </div>
                <div class="col">
                    <h4 class="notif-type">Rate</h4>
                </div>
                <div class="col-sm-x3 d-flex flex-row-reverse mt-2 ml-5">
                    <div class="col">
                        <button type="button" class="btn btn-delete" data-toggle="modal" data-target="#exampleModal">
                            <span class="material-icons">
                                delete
                            </span>
                        </button>
                          
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-cancel">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delete this withouting giving a rating?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col d-flex flex-row-reverse">
                                            <button type="button" class="btn btn-danger">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-2">
                <div class="row">
                    <div class="col mt-2">
                        <h6 class="store-name">Salon Pass</h6>
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
                    <h5>Finished Appointment Details</h5>
                </div>
                <div class="row heading-content">
                    <div class="col-sm-x3">
                        <p>Appointment Date:</p>
                    </div>
                    <div class="col-sm-x3 ml-2">
                        <p>Date Service Done (Day)</p>
                    </div>
                </div>
            </div>
            <div class="row table-format">
                <table class="table">
                    <thead class="thead-format">
                      <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Time</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tooth Extraction</td>
                        <td>11:00AM</td>
                        <td>Php 1,000.00</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <h5>Rate Service:</h5>
                </div>
                <div class="row heading-content">
                    <div class="rating"> 
                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> 
                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> 
                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> 
                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> 
                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>
                </div>
            </div>

            <div class="row mt-5"> 
                <div class="col d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-done"> <!-- btn-done is in appointment-content.css -->
                        Done
                    </button>
                </div>
            </div>

        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>
    </body>
</html>