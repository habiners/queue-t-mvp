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
        <title>Profile</title>
    </head>

    <body>
        
        
        <!-- Home Content -->
        <div class="container-fluid content-bottom-spacing">
            <div class="row mt-3 heading margin">
                <h1>Profile</h1>
            </div>
            <div class="container">
              <div class="picture-container">
                  <div class="picture d-flex justify center">
                      <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
                      <input type="file" id="wizard-picture" class="">
                      
                  </div>
                  <div class="d-flex justify-content-center">
                    <span class="material-icons choose-picture">
                      create
                    </span>
                  </div>
              </div>
          </div>
            <div class="d-flex justify-content-center">
              <h5>
                <!-- Sheena Justine A. Negro -->
                <?php
                  require_once "pdo-conn.php";
                  session_start();
                  $statement = $pdo->query("SELECT concat(firstName, ' ', middleName, ' ', lastName) AS name 
                    FROM USER WHERE userID =" . $_SESSION['userID'] . ";");
                  echo $statement->fetch()['name'];
                  ?>
              </h5>
            </div>

            <div class="profile-list mt-3">
              <div class="row ml-2 mb-3">
                <span class="col-xs-3 material-icons face-icon">
                  face
                </span>
                <a href="profile-info.php" class="col-xs-6 mt-2 profile-list-link">
                  Personal Information
                </a>
              </div>
              <div class="row ml-2 mb-3">
                <span class="col-xs-3 material-icons help-icon">
                  help
                </span>
                <a href="#" class="col-xs-6 mt-2 profile-list-link">
                  FAQs
                </a>
              </div>
              <div class="row ml-2 mb-3">
                <span class="col-xs-3 material-icons exit-icon">
                  exit_to_app
                </span>
                <a href="log-in.php" class="col-xs-6 mt-2 profile-list-link">
                  Logout
                </a>
              </div>
            </div>

            <!-- The Modal -->
            <div class="modal" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    Modal body..
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
        
        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>

    </body>
</html>