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
		<title>finQ Dashboard</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker3.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		
		<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
		<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
		<!--Custom Font-->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
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
					<li class="active">Dashboard</li>
				</ol>
			</div>
			<!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Dashboard</h1>
				</div>
			</div>
			<!--/.row-->




			<div class="row">
				<div class="col-xs-6 col-md-3">

					<div class="panel panel-default">
						<div class="panel-body easypiechart-panel">
							<?php
								$userid = $_SESSION['detsuid'];
								$tdate = date('Y-m-d');
								$query = mysqli_query($con, "select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
								$result = mysqli_fetch_array($query);
								$sum_today_expense = $result['todaysexpense'];
								?>
							<h4><b>Today's Expense</b></h4>
							<div style="color: #ef4040" class="easypiechart" data-percent="<?php echo $sum_today_expense; ?>"><span class="percent"><?php if ($sum_today_expense == "") {
																																							echo "0";
																																						} else {
																																							echo $sum_today_expense;
																																						}

																																						?></span></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php

							//Monthly Expense
							$userid = $_SESSION['detsuid'];
							$monthdate =  date("Y-m-d", strtotime("-1 month"));
							$crrntdte = date("Y-m-d");
							$query3 = mysqli_query($con, "select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
							$result3 = mysqli_fetch_array($query3);
							$sum_monthly_expense = $result3['monthlyexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Last 30day's Expenses</b></h4>
							<div class="easypiechart" style="color: #ef4040" data-percent="<?php echo $sum_monthly_expense; ?>"><span class="percent"><?php if ($sum_monthly_expense == "") {
																																								echo "0";
																																							} else {
																																								echo $sum_monthly_expense;
																																							}

																																							?></span></div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
							//Current Year Expense
							$userid = $_SESSION['detsuid'];
							$cyear = date("Y");
							$query4 = mysqli_query($con, "select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
							$result4 = mysqli_fetch_array($query4);
							$sum_yearly_expense = $result4['yearlyexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Current Year Expenses</b></h4>
							<div class="easypiechart" style="color: #ef4040" data-percent="<?php echo $sum_yearly_expense; ?>"><span class="percent"><?php if ($sum_yearly_expense == "") {
																																							echo "0";
																																						} else {
																																							echo $sum_yearly_expense;
																																						}

																																						?></span></div>
						</div>

					</div>

				</div>

				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
							//Totaal Expense
							$userid = $_SESSION['detsuid'];
							$query5 = mysqli_query($con, "select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
							$result5 = mysqli_fetch_array($query5);
							$sum_total_expense = $result5['totalexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Total Expenses</b></h4>
							<div class="easypiechart" style="color: #ef4040" data-percent="<?php echo $sum_total_expense; ?>"><span class="percent"><?php if ($sum_total_expense == "") {
																																							echo "0";
																																						} else {
																																							echo $sum_total_expense;
																																						}

																																						?></span></div>
						</div>

					</div>

				</div>

			</div>
			<!--/.row-->
			<div class="row">
				
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
							//Income 
							$userid = $_SESSION['detsuid'];
							$query6 = mysqli_query($con, "select sum(Amount)  as totalexpense from tbincome where UserId='$userid';");
							$result6 = mysqli_fetch_array($query6);
							$sum_amount = $result6['totalexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Income</b></h4>
							<div class="easypiechart" style="color: #1ebfae" data-percent="<?php echo $sum_amount; ?>"><span class="percent"><?php if ($sum_amount == "") {
																																					echo "0";
																																				} else {
																																					echo $sum_amount;
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>



				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php

							//Monthly Expense

							//Last 30 days saving
							$userid = $_SESSION['detsuid'];
							$query7 = mysqli_query($con, "select sum(Amount)  as total from tbincome where UserId='$userid';");
							$result7 = mysqli_fetch_array($query7);
							$sum_saving = $result7['total'];
							$sum_saving = $sum_amount - $sum_monthly_expense;
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Last 30 days Saving</b></h4>
							<div class="easypiechart" style="color: #1ebfae" data-percent="<?php echo $sum_saving ?>"><span class="percent"><?php if ($sum_saving == "") {
																																					echo "0";
																																				} else if ($sum_saving < 0) {
																																					echo '0';
																																				} else {
																																					echo $sum_saving;
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
							//Credits
							$userid = $_SESSION['detsuid'];
							$query7 = mysqli_query($con, "select sum(Amount)  as total from tbincome where UserId='$userid';");
							$result7 = mysqli_fetch_array($query7);
							$sum_saving = $result7['total'];
							$sum_saving = $sum_amount - $sum_monthly_expense;
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Credit</b></h4>
							<div class="easypiechart" style="color: #1ebfae" data-percent="<?php echo $sum_saving ?>"><span class="percent"><?php if ($sum_saving == "") {
																																					echo "0";
																																				} else if ($sum_saving < ($sum_amount * 15) / 100) {
																																					echo '0';
																																				} else {
																																					echo ($sum_saving * 15) / 100;
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>
				<div class="col-xs-6 col-md-3">
					<div class="panel panel-default">
						<?php
							//Reward System
							$userid = $_SESSION['detsuid'];
							$query8 = mysqli_query($con, "select sum(Amount)  as totalexpense from tbincome where UserId='$userid';");
							$result8 = mysqli_fetch_array($query8);
							$sum_amount = $result8['totalexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h4><b>Reward System</b></h4>
							<div class="easypiechart" style="color: #1ebfae" data-percent="<?php echo $sum_amount; ?>"><span class="percent"><?php if ($sum_amount == "") {
																																					echo "0";
																																				} else if ($sum_saving < ($sum_amount * 15) / 100) {
																																					echo "Not Elligible";
																																				} else {
																																					echo "Elligible";
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>

			</div>
			<!--/.row-->
		</div>
		<!--/.main-->
		<?php include_once('includes/footer.php'); ?>
		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/chart.min.js"></script>
		<script src="js/chart-data.js"></script>
		<script src="js/easypiechart.js"></script>
		<script src="js/easypiechart-data.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/custom.js"></script>
		<script>
			window.onload = function() {
				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line(lineChartData, {
					responsive: true,
					scaleLineColor: "rgba(0,0,0,.2)",
					scaleGridLineColor: "rgba(0,0,0,.05)",
					scaleFontColor: "#c5c7cc"
				});
			};
		</script>

	</body>

	</html>
<?php } ?>