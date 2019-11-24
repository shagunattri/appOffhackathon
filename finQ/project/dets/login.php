<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['detsuid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details.";
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
    <link href="img/logo.png" rel="icon">
    <link href="img/logo.png" rel="apple-touch-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="background.css">

</head>

<body>

    <div class="main">

        <!-- particles.js container -->
        <div id="particles-js"></div> <!-- stats - count particles -->
        <div class="count-particles"> <span class="js-count-particles">--</span> </div> <!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
        <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
        <div id="particles-js">
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
                                    <input type="email" name="email" id="email" placeholder="Your Email" />
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                </div>
                                <?php
                                if (isset($_POST['login'])) {
                                    if (empty($_POST['email']) || empty($_POST['password'])) {
                                        echo "Username and Password should not be Empty";
                                    }
                                }

                                ?>
                                <div class="form-group form-button">
                                    <input type="submit" name="signIn" id="signIn" class="form-submit" value="Log in" />
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JS -->
    <script src="particlebg.js"></script>
    <script src="particles.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>