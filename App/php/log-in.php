<?php
    require_once "pdo-conn.php";

    function inpClean($data) { //Manglimpyo ni siya
        $data = trim($data); //gets rid of whitespace
        $data = stripslashes($data); //gets rid of slashes
        $data = htmlspecialchars($data); //translates html for security
    return $data;
    }

    $inpUsername = $inpPassword = "";
    $usernameErr = $passwordErr = "";

    $completeInp = true;
    $loginSuccessful = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST['username'])){
            $usernameErr = '<span class = "error">Username is blank!</span>';
            $completeInp = false;
        }
        else{
            $inpUsername = inpClean($_POST['username']);
        }

        if(empty($_POST['password'])){
            $passwordErr = '<span class = "error">Password is required!</span>';
            $completeInp = false;
        }
        else{
            $inpPassword = hash("sha256", inpClean($_POST['password']));
        }
        
        if($completeInp){
            $statement = $pdo->query("SELECT userID FROM user where username = '$inpUsername' AND password = '$inpPassword';");

            $result = $statement->fetch();
            if($result){ //If someting was returned--meaning user with username and password is found
                $loginSuccessful = true;
                session_start();
                $_SESSION['userID'] = $result['userID'];
                echo '<script> alert("User ID:. '. $result['userID'] .'"); </script>';
                header('Location: ' . "home.php"); //must be run BEFORE any html, even doctype
                die();
            }
            else{
                $loginSuccessful = false;
                // echo '<script> alert("User not found!."); </script>';
            }
        }
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="..\css\style.css">
        <title>Login</title>
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center login-container">
            <form class="login-form text-center" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class="mb-5 text-uppercase">Queue-T</h1>
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Username" name = "username">
                    <?php echo $usernameErr;?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill form-control-lg" placeholder="Password" name = "password">
                    <?php echo $passwordErr; if(!$loginSuccessful) echo '<span class="error">No matching credentials found!</span>'; ?>
                </div>
                <div class="pl-3 forgot-link form-group d-flex justify-content-between align-items-center">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Log in</button>
                <p class="mt-3 font-weight-normal">Don't have an account? <a href="sign-up.php"><strong>Register Now</strong></a></p>
            </form>
        </div>
    </body>
</html>