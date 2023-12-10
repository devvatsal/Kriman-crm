<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $user_id = $_POST['cust_id'];
    $aptNumber = rand(1111,999999999);
    $aptDate = $_POST['appointment_date'];
   	$aptTime = $_POST['appointment_time'];
	$message = $_POST['appointment_note'];
	$BookingDate = date('Y-m-d H:i:s');

	$query = "insert into tblbook(UserID,AptNumber,AptDate,AptTime,Message,BookingDate,status) value('$user_id','$aptNumber','$aptDate','$aptTime','$message','$BookingDate','selected')";
	$query = mysqli_query($con, $query);
	
	if ($query) {
		echo "<script>alert('Appointment Has Been Booked.');</script>"; 
		echo "<script>window.location.href = 'new-appointment.php'</script>";
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

<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

.dropdown-content {
  background-color: #f6f6f6;
  overflow: auto;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
.hide {display: none;}
</style>
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

		<?php
			$user_query = mysqli_query($con, "select ID,FirstName,LastName from tbluser");
			$cnt = 1;
		?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Add Appointment</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add Parlour Appointment:</h4>
						</div>
						<div class="form-body">
							<form method="post" enctype="multipart/form-data">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>

							 <div class="form-group"> <label for="exampleInputEmail1">Customer Name</label> 

							 	<div id="myDropdown" class="dropdown-content" onclick="myFunction()" onmouseleave="hideItems()">
									<input type="hidden" id="cust_id" name="cust_id">
									<input type="text" class="form-control" placeholder="Search User" id="myInput" onkeyup="filterFunction()">
									<?php
									while ($row = mysqli_fetch_array($user_query)) {
									?>
										<a class="dropdown-items" onclick="selectDropdown('<?php echo $row['FirstName'] . $row['LastName']; ?>','<?php echo $row['ID']; ?>')"><?php echo $row['FirstName'] . $row['LastName']; ?></a>
									<?php	
									}
									?>
								</div>
							</div>
							 <div class="form-group"> <label for="exampleInputEmail1">Appointment Date</label> 
							 <input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Customer Name" value="" required="true"> </div>

							 <div class="form-group"> <label for="exampleInputEmail1">Appointment Time</label> 
							 <input type="time" class="form-control" id="appointment_time" name="appointment_time" placeholder="Customer Email" value="" required="true">
							</div>
							 <div class="form-group"> <label for="exampleInputEmail1">Appointment Note</label> 
							 <input type="textarea" class="form-control" id="appointment_note" name="appointment_note" placeholder="Customer Note" value="" required="true">
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
			$(document).ready(function() {
				$(document).find('.dropdown-items').addClass('hide');
			})
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

		<script>
		function myFunction() {
			$(document).find('.dropdown-items').removeClass('hide');
		}

		function hideItems() {
			$(document).find('.dropdown-items').addClass('hide');
		}

		function selectDropdown(value,cust_id){
			$(document).find('#myInput').val(value);
			$(document).find('#cust_id').val(cust_id);
		}

		function filterFunction() {
			var input, filter, ul, li, a, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			div = document.getElementById("myDropdown");
			a = div.getElementsByTagName("a");
			for (i = 0; i < a.length; i++) {
				txtValue = a[i].textContent || a[i].innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
				a[i].style.display = "";
				} else {
				a[i].style.display = "none";
				}
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