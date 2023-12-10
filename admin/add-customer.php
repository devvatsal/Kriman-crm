<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $cust_first_name = $_POST['cust_first_name'];
    $cust_last_name = $_POST['cust_last_name'];
    $cust_email = $_POST['cust_email'];
   	$cust_mobile = $_POST['cust_mobile'];
	$password = '1234567890';
	$regDate = date('Y-m-d H:i:s');

	$query = "insert into tbluser(FirstName,LastName,MobileNumber,Email,Password,RegDate) value('$cust_first_name','$cust_last_name','$cust_mobile','$cust_email','$password','$regDate')";
	$query = mysqli_query($con, $query);
	
	if ($query) {
		echo "<script>alert('Customer has been added.');</script>"; 
		echo "<script>window.location.href = 'customer-list.php'</script>";
	}
	else
	{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
	}
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BPMS | Add Customer</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Add Customers</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Parlour Customers:</h4>
						</div>
						<div class="form-body">
							<form method="post" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>

							 <div class="form-group"> <label for="exampleInputEmail1">Customer First Name</label> <input type="text" class="form-control" id="cust_first_name" name="cust_first_name" placeholder="Customer Name" value="" required="true"> </div>
							 <div class="form-group"> <label for="exampleInputEmail1">Customer Last Name</label> <input type="text" class="form-control" id="cust_last_name" name="cust_last_name" placeholder="Customer Name" value="" required="true"> </div>

							 <div class="form-group"> <label for="exampleInputEmail1">Customer Email</label> 
							 <input type="email" class="form-control" id="cust_email" name="cust_email" placeholder="Customer Email" value="" required="true">
							</div>
							 <div class="form-group"> <label for="exampleInputEmail1">Customer Mobile Number</label> 
							 <input type="number" class="form-control" id="cust_mobile" name="cust_mobile" placeholder="Customer Mobile" value="" required="true">
							</div>
							  <button type="submit" name="submit" class="btn btn-default">Add</button> </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>
<?php } ?>