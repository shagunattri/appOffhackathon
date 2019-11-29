<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>finQ || Credits </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="img/logo.png" rel="icon">
	<link href="img/logo.png" rel="apple-touch-icon">
	<link href="css/credit.css" rel="stylesheet">
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Credits</li>
			</ol>
		</div><!--/.row-->

		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Credits</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
					
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			
		</div><!-- /.row -->
		<div class="col-xs-6 col-md-4">
						<div class="panel panel-default">
					<?php
								//Credits
								$userid = $_SESSION['detsuid'];
								$monthdate =  date("Y-m-d", strtotime("-1 month"));
	                            $crrntdte = date("Y-m-d");
	                            $query6 = mysqli_query($con, "select
								sum(Amount)  as  totalexpense from tbincome where ((IncomeDate)
								between '$monthdate' and '$crrntdte') && UserId='$userid';");
	                            $result6 = mysqli_fetch_array($query6);
	                            $sum_amount = $result6['totalexpense'];
	                            $userid = $_SESSION['detsuid'];
								$monthdate =  date("Y-m-d", strtotime("-1 month"));
								$crrntdte = date("Y-m-d");
								$query3 = mysqli_query($con, "select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
								$result3 = mysqli_fetch_array($query3);
								$sum_monthly_expense = $result3['monthlyexpense'];
								
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
					<div class="col-xs-6 col-md-4">
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
																																					echo "Not Eligible";
																																				} else {
																																					echo "Eligible";
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>

<div>


			 <section id="supporters" class="section-with-bg wow fadeInUp" class="img-fluid">

      <div class="container">
        <div class="section-header">
          <h3 style="text-align:center"><b>	Partnered Brands</h3>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/oyo.png" class="img-fluid" alt="oyo logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/zomato_newlogo.png" class="img-fluid" alt="zomato logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/swiggy.png" class="img-fluid" alt="swiggy logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/amazon.jpg" class="img-fluid" alt="amazon logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/myntra.png" class="img-fluid" alt="myntra logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/ola.png" class="img-fluid" alt="ola logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/BookMyShow-app.jpg" class="img-fluid" alt="book my show logo">
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="supporter-logo">
              <img src="../../img/happyeasygo-logo-large.png" class="img-fluid" alt="happyeasygo logo">
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
				<div class="col-xs-6 col-md-5">
					<div class="panel panel-default">
						<?php
							//Reward System
							$userid = $_SESSION['detsuid'];
							$query8 = mysqli_query($con, "select sum(Amount)  as totalexpense from tbincome where UserId='$userid';");
							$result8 = mysqli_fetch_array($query8);
							$sum_amount = $result8['totalexpense'];
							?>
						<div class="panel-body easypiechart-panel">
							<h3><b>Coupon Code</b></h3>
							<div class="easypiechart" style="color: #1ebfae" data-percent="<?php echo $sum_amount; ?>"><span class="percent"><?php if ($sum_amount == "") {
																																					echo "0";
																																				} else if ($sum_saving < ($sum_amount * 15) / 100) {
																																					echo "Nope";
																																				} else {
																																				
																																					echo strtoupper(uniqid());
																																					
																																				}

																																				?></span></div>
						</div>

					</div>

				</div>



					<?php include_once('includes/footer.php');?>
	</div><!--/.main-->
	
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