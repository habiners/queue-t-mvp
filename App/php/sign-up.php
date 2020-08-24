<!doctype html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\css\style.css">
        <script src="..\js\javascripts.js"></script>
        <title>Sign-up</title>
    </head>
    <body>
    <?php 
        require_once "pdo-conn.php"; //Connect to DB

        function inpClean($data) { //Manglimpyo ni siya
            $data = trim($data); //gets rid of whitespace
            $data = stripslashes($data); //gets rid of slashes
            $data = htmlspecialchars($data); //translates html for security
          return $data;
        }

        function comparePass($pass1, $pass2){
            if($pass1 == $pass2)
                return true;
            return false;
        }

        $username = $password = $confPassword = $firstName = $lastName = $middleName = $birthdate = $sex = $email = $contactnum = "";

        $uniqueUsername = $matchingPass = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //echo $_POST['birthday'];
            $username = inpClean($_POST['username']);
            $password = hash("sha256", inpClean($_POST['password']));
            $confPassword = hash("sha256", inpClean($_POST['confPassword']));
            $firstName = inpClean($_POST['firstName']);
            $lastName = inpClean($_POST['lastName']);
            $middleName = inpClean($_POST['middleName']);
            $birthdate = inpClean($_POST['birthdate']);
            $sex = inpClean($_POST['sex']);
            $email = inpClean($_POST['email']);
            $contactnum = inpClean($_POST['contactnum']);

            //Checking is username is unique
            $statement = $pdo->query("SELECT username FROM user where username = '$username';");

            $uniqueUsername = !$statement->fetch(); //Selecting only one row
            $matchingPass = comparePass($password, $confPassword);

            if($uniqueUsername && $matchingPass){ //Only insert if passwords match
                //echo "UN: $username, P1: $password, P2: $confPassword, FN: $firstName, LN: $lastName, MN: $middleName, BD: $birthdate, Sex: $sex, CN: $contactnum <br>";
                try{
                    $pdo->exec("INSERT INTO USER VALUES (NULL, '$username', '$password', '$firstName', '$lastName', '$middleName', 
                        '$birthdate', '$sex', '$email', '$contactnum', now(), now());");
                    
                    //If successful, will display alert and redirects to log-in page
                    echo '<script>
                         alert("Sign-up was successful.");
                         window.location.replace("log-in.php");
                        </script>';
                }
                catch(PDOException $e){
                    echo "Insertion error! Error: " . $e;
                }

            }
        }
    ?> 
        <div class="justify-content-center align-items-center login-container">
            <div class="heading">
                <div class="row">
                    <div class="col-xs-3 ml-4">
                        <a href="log-in.php">
                            <span class="fa fa-angle-left"></span>
                          </a>
                    </div>
                    <div class="col-xxs-1">
                        <header class="ml-3 font-weight-800 text-uppercase">
                            QUEUE-T
                        </header>
                    </div>
                </div>
            </div>

            <form class="login-form-heading text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h2>Sign-up</h2>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" name="username" required>
                    <?php //If username is not unique
                        if(!$uniqueUsername && $_SERVER["REQUEST_METHOD"] == "POST") 
                            echo '<span class="error">Username is not unique!';
                    ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Confirm Password" name="confPassword" required>
                    <?php //If passwords don't match
                        if(!$matchingPass && $_SERVER["REQUEST_METHOD"] == "POST") 
                            echo '<span class="error">Passwords don\'t match!';
                    ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name" name="firstName" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="lastName" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Middle Name" name="middleName" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control rounded-pill form-control-lg" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="Birthdate" class="pl-3 d-flex justify-content-between ">Birthdate</label>
                    <input type="date" class="form-control rounded-pill form-control-lg" placeholder="Birthdate" name="birthdate" required>
                </div>
                <div class="form-group">
                    <label for="Sex" class="pl-3 d-flex font-weight-800 justify-content-between">Sex</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="M" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label></input>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="F" required>
                        <label class="form-check-label" for="inlineRadio2">Female</label></input>
                    </div>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control rounded-pill form-control-lg" placeholder="Cellphone Number" pattern="[0-9]{11}" name="contactnum" required>
                </div>

                <button type="button" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" data-toggle="modal" data-target="#signup">
                    Sign-up
                </button>
                    <!-- Modal -->
                <div class="container-fluid" id="signup-verivy">
                    <div class="modal fade mt-5" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header modal-header-reschedule">
                              <h5 class="modal-title" id="reschedule">Verify Account</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <h3>Please enter the 4-digit verification code we sent via SMS:</h3>
                                <div id="form">
                                    <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                </div>                      
                                <div>
                                    Didn't receive the code?<br />
                                    <a href="#">Send code again</a><br />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success btn-embossed" type="submit">Verify</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>