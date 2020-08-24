<?php
	require_once "pdo-conn.php";

    function inpClean($data) { //Manglimpyo ni siya
        $data = trim($data); //gets rid of whitespace
        $data = stripslashes($data); //gets rid of slashes
        $data = htmlspecialchars($data); //translates html for security
      return $data;
    }

	$inpUsername = $inpPassword = $error = "";
	$completeInp = true;
	$submit = false;

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$submit = true;

        if(!empty($_POST["username"])) $inpUsername = inpClean($_POST["username"]);
        else $completeInp = false;

        if(!empty($_POST["password"])) $inpPassword = hash("sha256", inpClean($_POST["password"]));
        else $completeInp = false;

        if($completeInp){
            $statement = $pdo->query("SELECT userID FROM user where username = '$inpUsername' AND password = '$inpPassword';");
			$result = $statement->fetch();
			
			if(!$result){
				$error = "User not found!";
                // echo '<script> alert("User not found!"); </script>';
                // header('Location: ' . "webLogin.php"); //must be run BEFORE any html, even doctype
				// die();
			}
			else{
				$userID = $result["userID"];
			
				$statement = $pdo->query("SELECT USER.userID, USER.username, BUSINESS.businessID, BUSINESS.businessName FROM USER	
				INNER JOIN BUSINESS ON USER.userID = $userID AND BUSINESS.userID = $userID;");
				$result = $statement->fetch();
				//echo $userID . " " . $result["businessID"];
	
				if($result){
					session_start();
					$_SESSION["userID"] = $userID;
					$_SESSION["businessID"] = $result["businessID"];
	
					header('Location: ' . "dashboard.php"); //must be run BEFORE any html, even doctype
					die();
				}
				else{
					$loginSuccessful = false;
					$error = "Business not found.";
					//echo '<script> alert("Business not found!."); </script>';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Queue-T Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
 
<link rel="stylesheet" href="..\css\util.css">
<link rel="stylesheet" href="..\css\webStyle.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<span class="login100-form-title">
						QUEUE-T
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					<?php if(empty($inpUsername) && $submit) echo '<span class="error" style="padding-left: 2em;">Username is empty!</span>';?>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<?php if(empty($inpPassword) && $submit) echo '<span class="error" style="padding-left: 2em;">Password is empty!</span>';?>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							
						</span>

						<a href="#" class="txt2">
							Forgot Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
						<?php echo '<span class="error" style="padding-top: 1em;">'. $error .'</span>'; ?>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="SignUp.php" class="txt3">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="..\js\login.js"></script>

</body>
</html>