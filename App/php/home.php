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
        <script src="..\js\javascripts.js"></script>
        <script src="..\js\date.js"></script>
        <title>Home</title>
    </head>

    <body>
        
        
        <!-- Home Content -->
        <div class="container-fluid content-bottom-spacing">
            <div class="row mt-3 heading margin">
                <div class="col-xs-6">
                  <h1>Queue-T</h1>
                </div>
                <div class="col mt-3 d-flex flex-row-reverse">
                  <small id="dateAppointmentView7">Date Today</small>
                </div>
            </div>
            <form class="login-form-heading text-center">
                <div class="form-group">
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Categories</option>
                        <option value="1">Health</option>
                        <option value="2">Grooming</option>
                        <option value="3">Pets</option>
                    </select>
                </div>
            </form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-design" type="submit">
                        Go
                    </button>  
                </div>
            </div>
            <div class="row mt-3 margin">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Show Map</label>
                </div>
            </div>
            <div class="list-group" id="list-not-map">
                <!-- <form method="get" action="<?php echo htmlspecialchars("/php/shop-profile.php");?>" id="shop"> -->
              <?php 
              require_once "pdo-conn.php";
              $statement = $pdo->query("SELECT * FROM BUSINESS;");
              $businesses = $statement->fetchAll();
              srand(1);
              foreach ($businesses as $business){
                echo '
                  <a href="shop-profile.php?id=' . $business["businessID"] .'" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">' . $business["businessName"]  .'</h5>
                        <span class="material-icons rating">
                          star
                        </span>
                    </div>
                    <div class="d-flex w-100 justify-content-between">
                      <small>' . (rand() % 60) .  ' mins away</small>
                      <small><span class="badge">' . (rand() % 3 + 2) . '.' . (rand() % 5) . '</span></small>
                    </div>
                  </a>
                ';
              }
              ?>
                <!-- <a href="shop-profile.php" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Nio's Clinic</h5>
                    <span class="material-icons rating">
                        star
                    </span>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <small> 35 mins away</small>
                    <small><span class="badge">4.5</span></small>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Sheenpai Tooth Cemetery</h5>
                      <span class="material-icons rating">
                        star
                      </span>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <small> 40 mins away</small>
                    <small><span class="badge">3.9</span></small>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Javjavin BeauTeethful</h5>
                      <span class="material-icons rating">
                        star
                    </span>
                  </div>
                  <div class="d-flex w-100 justify-content-between">
                    <small> 50 mins away</small>
                    <small><span class="badge">2.5</span></small>
                  </div>
                </a> -->
                <!-- </form> -->
            </div>
            <div class="input-group mb-3" id="map" style="display: none">
              <div class="d-flex justify-content-center">
                <img src="..\resources\map-pic.jpg" class="img-fluid" alt="Responsive image">
              </div>
            </div>
        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>
    </body>
</html>