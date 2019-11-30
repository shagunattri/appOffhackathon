<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0)) {
    header('location:logout.php');
} else {

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>finQ || Analytics </title>fas
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/wallet.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link href="css/analytics.css" rel="stylesheet">
        <link href="img/logo.png" rel="icon">
        <link href="img/logo.png" rel="apple-touch-icon">
    </head>

    <body>
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/sidebar.php'); ?>

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Analytics</li>
                </ol>
            </div>
            <!--/.row-->




            <div class="row">
                <div class="col-lg-12">



                    <div class="panel panel-default">
                        <div class="panel-heading">Your Graphs & Stats</div>
                        <div class="panel-body">
                            <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                                            echo $msg;
                                                                                        }  ?> </p>
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div><!-- /.panel-->
                </div><!-- /.col-->
                <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = 'hrefs/expenseincome.html';">Expense and Income Analysis</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = 'hrefs/expensetime.html';">Expense and Time Analysis</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = 'hrefs/creditscore.html';">Credit and Expense Analysis</button>
                <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href = 'hrefs/itemexpense.html';">Item Based Expense Analysis</button>
                <!-- Example single danger button -->
            </div><!-- /.row -->
            <?php include_once('includes/footer.php'); ?>
        </div>
        <!--/.main-->`


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>

    </body>

    </html>
<?php } ?>