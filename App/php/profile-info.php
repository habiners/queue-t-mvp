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
        
        
        <title>Appointments</title>
    </head>

    <body>
        <!-- Home Content -->
        <div class="container-info content-bottom-spacing">
            <div class="row header-content">
                <div class="col-sm-x3">
                    <a href="profile.php">
                        <span class="material-icons back-icon">
                            keyboard_backspace
                        </span>
                    </a>
                </div>
                <div class="col-sm-x3-6">
                    <h6 class="profile-type">Profile Information</h6>
                </div>
            </div>
            <?php
                  require_once "pdo-conn.php";
                  session_start();
                  $statement = $pdo->query("SELECT * FROM USER WHERE userID =" . $_SESSION['userID'] . ";");
                  $user = $statement->fetch();
                  $isMale = $user['gender'] == 'M' ? true : false;
            ?>
            <div class="container-fluid mt-3">
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" value="<?php echo $user['username']?>" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" value="*****" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Confirm Password" value="*****" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name" value="<?php echo $user['firstName']?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" value="<?php echo $user['lastName']?>" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Middle Name" value="<?php echo $user['middleName']?>" required>
                </div>
                <div class="form-group">
                    <label for="Birthdate" class="pl-3 d-flex justify-content-between ">Birthdate</label>
                    <input type="date" class="form-control rounded-pill form-control-lg" placeholder="Birthdate" value="<?php echo $user['birthday']?>" required>
                </div>
                <div class="form-group">
                    <label for="Sex" class="pl-3 d-flex justify-content-between ">Sex</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="M" <?php if($isMale) echo "checked" ?> required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="F" <?php if(!$isMale) echo "checked" ?> required>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control rounded-pill form-control-lg" placeholder="Cellphone Number" pattern="[0-9]{11}" value="<?php echo $user['contactNum']?>" required>
                </div>
                <div class="d-flex flex-row-reverse">
                    <input class="btn btn-success" type="submit" value="Save">
                </div>
            </div>
        </div>
        <!-- Bottom Menu -->
        <?php include "layouts/bottom-menu-nav.php";?>

    </body>
</html>