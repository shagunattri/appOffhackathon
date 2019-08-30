<?php
session_start(); //to  start the session

if (isset($_SESSION['login_id'])) {
	if(isset($_SESSION['pageStore'])){
		$pageStore = $_SESSION['pageStore'];
		header("location: $pageStore");
	}
	}

	if (isset($_POST['signIn'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
		echo "";	
		}
		else {

			$email = $_POST['email'];
			$password = $_POST['password'];

			include('config.php');
			$sQuery = "SELECT id, password from account where email=? LIMIT 1";

			$stmt = $conn->prepare($sQuery);
			$stmt-> bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($id, $hash);
			$stmt->store_result();

			if($stmt->fetch()){

				if(password_verify($password, $hash)){

					$_SESSION['login_id'] = $id;

					if(isset($_SESSION['pageStore'])){

						$pageStore = $_SESSION['pageStore'];
					}
					else {
						$pageStore = "home/home.html";
											}
											header("location: $pageStore");
											$stmt->close();
											$conn->close();

				}
				else {
					echo "Invalid Username and Password";
				}
			}
			else {
				echo "Invalid Username and Password";
			}
			$stmt->close();
			$conn->close();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
							  <?php
                                     if (isset($_POST['signIn'])) {
										if (empty($_POST['email']) || empty($_POST['password'])) {
										echo "Username and Password should not be Empty";	
										}
									} 

							 ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signIn" id="signIn" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>