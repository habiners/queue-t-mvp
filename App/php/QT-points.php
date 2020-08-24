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
        <script src="..\js\javascripts.js"></script>
        <title>Home</title>
    </head>

    <body>
       <!-- Home Content -->
       <div class="container-QT-points content-bottom-spacing">
        <div class="row mt-3 heading margin">
            <h1>Queue-T Points</h1>
        </div>
        <div class="d-flex justify-content-center">
          <h9>18</h9>
        </div>
        <h10>Vouchers</h10>
        <table class="table">
          <thead class="thead-format">
            <tr>
              <th scope="col">Points</th>
              <th scope="col">Discount</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-toggle="modal" data-target="#t1-store-modal">15</td>
              <td data-toggle="modal" data-target="#t1-store-modal">10%</td>
              <div class="modal fade" id="t1-store-modal" tabindex="-1" role="dialog" aria-labelledby="#t1-store-modal-label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header modal-header-info">
                      <h5 class="modal-title" id="t1-store-modal">15 points</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                          <div class="row ml-1 mr-1">
                                <p>Are you sure you want to use this voucher?</p>
                          </div> 
                          <div class="col d-flex flex-row-reverse">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#queue_room">
                                Yes
                            </button>
                          </div>    
                          </div>  
                      </div>
                  </div>
                  </div>
              </div>

            </tr>
            <tr>
              <td  data-toggle="modal" data-target="#t2-store-modal">20</td>
              <td  data-toggle="modal" data-target="#t2-store-modal">15%</td>
              <div class="modal fade" id="t2-store-modal" tabindex="-1" role="dialog" aria-labelledby="#t2-store-modal-label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header modal-header-info">
                      <h5 class="modal-title" id="t2-store-modal">20 points</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                          <div class="row ml-1 mr-1">
                              <p>Are you sure you want to use this voucher?</p>
                          </div>
                          <div class="col d-flex flex-row-reverse">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#queue_room">
                                Yes
                            </button>
                          </div>  
                      </div>
                  </div>
                  </div>
              </div>

            </tr>
          </tbody>
        </table>
                 
    </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>
        <!-- <nav class="nav">
          <a href="home.html" class="nav-link">
            <i class="material-icons nav-icon">home</i>
            
          </a>
            <a href="appointment.html" class="nav-link">
              <i class="material-icons nav-icon">event_available</i>
             
            </a>
            <a href="notification.html" class="nav-link">
              <i class="material-icons nav-icon">notifications</i>
             
            </a>
            <a href="#" class="nav-link nav-link-active">
              <i class="material-icons nav-icon-active">add_shopping_cart</i>
             
            </a>
            <a href="profile.html" class="nav-link">
              <i class="material-icons nav-icon">person</i>
              
            </a>
        </nav> -->

    </body>
</html>