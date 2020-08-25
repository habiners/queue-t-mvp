<?php
    require_once "pdo-conn.php";

    function inpClean($data) { //Manglimpyo ni siya
        $data = trim($data); //gets rid of whitespace
        $data = stripslashes($data); //gets rid of slashes
        $data = htmlspecialchars($data); //translates html for security
      return $data;
    }

    $username = $password = $rePassword = $firstName = $lastName = $middleName = $birthdate = $gender = $contactnum = $email = "";
    $submit = $uniqueUsername = $matchingPass = $validNum = false;
 
    $businessName = $businessAddress = $businessEmail = $businessContact = $businessCategory = $serviceCategory = "";
    $noEmpty = true; //This should be true
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $submit = true;

        if(!empty($_POST["firstName"])) $firstName = inpClean($_POST["firstName"]);
        else $noEmpty = false;

        if(!empty($_POST["middleName"])) $middleName = inpClean($_POST["middleName"]);
        else $noEmpty = false;

        if(!empty($_POST["lastName"])) $lastName = inpClean($_POST["lastName"]);
        else $noEmpty = false;

        if(!empty($_POST["gender"])) $gender = inpClean($_POST["gender"]);
        else $noEmpty = false;

        if(!empty($_POST["phoneNumber"])) $contactnum = inpClean($_POST["phoneNumber"]);
        else $noEmpty = false;

        if(!empty($_POST["email"])) $email =  inpClean($_POST["email"]);
        else $noEmpty = false;

        if(!empty($_POST["username"])) $username = inpClean($_POST["username"]);
        else $noEmpty = false;

        if(!empty($_POST["password"])) $password = hash("sha256", inpClean($_POST["password"]));
        else $noEmpty = false;

        if(!empty($_POST["re_password"])) $rePassword = hash("sha256", inpClean($_POST["re_password"]));
        else $noEmpty = false;
            
        if(!empty($_POST["businessName"])) $businessName = inpClean($_POST["businessName"]);
        else $noEmpty = false;
        
        if(!empty($_POST["businessAddress"])) $businessAddress = inpClean($_POST["businessAddress"]);
        else $noEmpty = false;

        if(!empty($_POST["businessEmail"])) $businessEmail = inpClean($_POST["businessEmail"]);
        else $noEmpty = false;

        if(!empty($_POST["businessContact"])) $businessContact = inpClean($_POST["businessContact"]);
        else $noEmpty = false;

        if(!empty($_POST["businessCategory"])) $businessCategoryID = inpClean($_POST["businessCategory"]);
        else $noEmpty = false;

        if(!empty($_POST["serviceCategory"])) $serviceCategoryID = inpClean($_POST["serviceCategory"]);
        else $noEmpty = false;

        echo $gender . " " . $businessCategoryID . " " . $serviceCategoryID . $businessAddress . "\n";

        //Checking is username is unique
        $statement = $pdo->query("SELECT username FROM user where username = '$username';");
        $uniqueUsername = !$statement->fetch(); //Selecting only one row

        // $statement = $pdo->query("SELECT businessCategoryID FROM BUSINESS_CATEGORY WHERE businessCategory = '$businessCategory';");
        // $businessCategoryID = (int) $statement->fetch(); //Selecting only one row

        // $statement = $pdo->query("SELECT serviceCategoryID FROM SERVICE_CATEGORY WHERE serviceCategory = '$serviceCategory';");
        // $serviceCategoryID = (int) $statement->fetch(); //Selecting only one row

        strcmp($password, $rePassword) == 0 ? $matchingPass = true : $matchingPass = false;

        echo "Yes" . $noEmpty . " " . $matchingPass . " " . $uniqueUsername . " " . $businessCategoryID . " " . $serviceCategoryID;
        // if($noEmpty && $matchingPass && $uniqueUsername && $businessCategoryID && $serviceCategoryID) 
        //     $cond = "True";
        // else
        //     $cond = "False";
        // echo "<br>Hi " . $cond;
        if($noEmpty && $matchingPass && $uniqueUsername && $businessCategoryID && $serviceCategoryID){
            try{
                $pdo->exec("INSERT INTO USER VALUES (NULL, '$username', '$password', '$firstName', '$lastName', '$middleName', 
                    now(), '$gender', '$email', '$contactnum', now(), now());");
                    // '$birthdate', '$gender', '$email', '$contactnum', now(), now());");
                
                $userID = $pdo->lastInsertId();
                // echo $userID;
                $pdo->exec("INSERT INTO BUSINESS_HOURS VALUES(NULL, 1, 1, 1, 1, 1, 0, 0, 'Weekdays', '8:00', '17:00', '12:00', '13:00', now(), now());");
                $businessHoursID = $pdo->lastInsertId();

                $pdo->exec("INSERT INTO BUSINESS (businessName, userID, businessHoursID, businessCategoryID, serviceCategoryID, address, email, contactNum, description, createdAt, updatedAt) 
                    VALUES (\"$businessName\", $userID, $businessHoursID, $businessCategoryID, $serviceCategoryID, 
                    '$businessAddress', '$businessEmail', '$businessContact', '', now(), now());");
                //If successful, will display alert and redirects to log-in page

                echo '<script>
                     alert("Sign-up was successful.");
                     window.location.replace("webLogin.php");
                    </script>';
                die();
            }
            catch(PDOException $e){
                echo "Insertion error! Error: " . $e;
            }
            // session_start();

            // header('Location: ' . "webLogin.php"); //must be run BEFORE any html, even doctype
            // die();
        }
    }
    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="..\css\SignUp.css">
</head>
<body style="background: url('../img/WEB-Cover-plain.png')">

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <h2>Sign up</h2>
                        <h1>Business Owner</h1>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-input" name="firstName" id="firstName" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $firstName;?>"/>
                                <?php if(empty($firstName) && $submit) echo '<span class="error">Name is required!</span>';?>
                            </div>
                            <div class="form-group">
                                <label for="middle_name">Middle name</label>
                                <input type="text" class="form-input" name="middleName" id="middleName" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $middleName;?>"/>
                                <?php if(empty($middleName) && $submit) echo '<span class="error">Name is required!</span>';?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-input" name="lastName" id="lastName" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $lastName;?>"/>
                                <?php if(empty($lastName) && $submit) echo '<span class="error">Name is required!</span>';?>
                            </div>
                            <div class="form-radio">
                                <label for="gender">Gender</label>
                                <div class="form-flex">
                                    <input type="radio" name="gender" value="M" id="male" <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $gender == "M") echo "Checked";?>/>
                                    <label for="male">Male</label>
    
                                    <input type="radio" name="gender" value="F" id="female" <?php if($_SERVER["REQUEST_METHOD"] == "POST" && $gender == "F") echo "Checked";?>/>
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" class="form-input" name="phoneNumber" id="phoneNumber" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $contactnum;?>"/>
                            <?php if(empty($contactnum) && $submit) echo '<span class="error">Phone Number is required!</span>';?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-input" name="email" id="email" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $email;?>"/>
                            <?php if(empty($email) && $submit) echo '<span class="error">Email is empty!</span>';?>
                        </div>
                        <div class="form-group">
                            <label for="User_name">Username</label>
                            <input type="text" class="form-input" name="username" id="username" />
                            <?php if(empty($username) && $submit) echo '<span class="error">Username is empty!</span>';
                                    if(!$uniqueUsername) echo '<span class="error">Username already exists!</span>'?>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-input" name="password" id="password"/>
                                <?php if(empty($password) && $submit) echo '<span class="error">Password is empty!</span>';?>
                            </div>
                            
                            <div class="form-group">
                                <label for="re_password">Repeat Password</label>
                                <input type="password" class="form-input" name="re_password" id="re_password"/>
                                <?php if(empty($rePassword) && $submit) echo '<span class="error">Password is empty!</span>';?>
                            </div>
                        </div>
                        <?php if(!$matchingPass && $submit) echo '<span class="error">Passwords don\'t match!</span>';?>
                        <div class="form-text">
                            <h1>Business</h1>
                            <div class="add_info">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Business_name">Business Name</label>
                                        <input type="text" class="form-input" name="businessName" id="businessName"  value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $businessName;?>"/>
                                        <?php if(!$businessName && $submit) echo '<span class="error">Business Name is empty!</span>';?>
                                    </div>
                                    <div class="form-group">
                                        <label for="Address">Address</label>
                                        <input type="text" class="form-input" name="businessAddress" id="businessAddress"  value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $businessAddress;?>"/>
                                        <?php if(!$businessAddress && $submit) echo '<span class="error">Business Address is empty!</span>';?>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_email">Business Email</label>
                                        <input type="email" class="form-input" name="businessEmail" id="businessEmail" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $businessEmail;?>"/>
                                        <?php if(!$businessEmail && $submit) echo '<span class="error">Business Email is empty!</span>';?>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Contact Number</label>
                                        <input type="number" class="form-input" name="businessContact" id="phone_number" value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $businessContact;?>"/>
                                        <?php if(!$businessContact && $submit) echo '<span class="error">Business Contact is empty!</span>';?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="country">Business Category</label>
                                        <div class="select-list">
                                            <select name="businessCategory" id="ServiceType" required>
                                                <?php
                                                $businessCategories = $pdo->query("SELECT * FROM BUSINESS_CATEGORY")->fetchAll();
                                                foreach($businessCategories as $option){
                                                    echo '<option value="' . $option["businessCategoryID"] . '" ';
                                                    if($_SERVER["REQUEST_METHOD"] == "POST" && $businessCategoryID == $option["businessCategoryID"]) echo "Selected";
                                                    echo ' >' . $option["businessCategory"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Service Category</label>
                                        <div class="select-list">
                                            <select name="serviceCategory" id="service" required>
                                                <?php
                                                $serviceCategories = $pdo->query("SELECT * FROM SERVICE_CATEGORY;")->fetchAll();
                                                foreach($serviceCategories as $option){
                                                    echo '<option value="' . $option["serviceCategoryID"] . '" ';
                                                    if($_SERVER["REQUEST_METHOD"] == "POST" && $businessCategoryID == $option["serviceCategoryID"]) echo "Selected";
                                                    echo ' >' . $option["serviceCategory"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <a type="button" href="webLogin.php" class="btn" role="button">Back</a>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="..\js\SignUp.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>