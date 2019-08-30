<?php
session_start();

if (isset($_SESSION["login_id"])) {
	if (isset($_SESSION['pageStore'])) {
		$pageStore = $_SESSION['pageStore'];
		header("location: $pageStore");

	}
}
if (isset($_POST['signUp'])) {
	if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['newPassword'])) {
		echo "";
	}
	else{
		$fullName = $_POST['fullName'];
		$email = $_POST['email'];
		$password = $_POST['newPassword'];
		$hash = password_hash($password, PASSWORD_DEFAULT);

		include('config.php');

		$sQuery = "SELECT id from account where email=? LIMIT 1";
		$iQuery = "INSERT Into account (fullName, email, password) values(?, ?, ?)";

		$stmt = $conn->prepare($sQuery);
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result($id);
		$stmt->store_result();
		$rnum = $stmt->num_rows;

	 if ($rnum==0) {
	 	$stmt->close();
	 	$stmt = $conn->prepare($iQuery);
	 	$stmt->bind_param("sss", $fullName, $email, $hash);
	 	if ($stmt->execute()) {
	 		echo "Register sucessfully, Please login with your login details";
	 	}
	 }
	 else{
	 	echo "Someone already register with this ($email) email adress";
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
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="fullName"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fullName" id="fullName" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="newPassword" id="Newpass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="conformPassword" id="conformPass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <?php
                                    if (isset($_POST['signUp'])) {
                                        if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['newPassword'])) {
                                            echo "Please fill up all the required field.";
                                        }
                                    }
                               ?>
                            <div class="form-group form-button">
                                <input type="submit" name="signUp" id="signup" class="form-submit" value="Register"/>
                            </div>
                            
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link" >I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>