  
<?php
 	session_start();
 	include ('header.php');
	$connect=mysqli_connect('localhost','root','','flower');

	if (isset($_SESSION['error'])) 
{
	$count=$_SESSION['error'];
	if ($count==3)
	{
		echo " <script>
		alert ('3 Wrong Attempt: Please wait and try again');
		location.assign('LoginTimer.php');
		</script>";
	}
}
	
	if(isset($_POST['btnLogin']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		$select="SELECT * FROM admin WHERE  email ='$email' AND password='$password'";
		$ret=mysqli_query($connect,$select);
		$count=mysqli_num_rows($ret);
		if($count>0)
		{
			$data=mysqli_fetch_array($ret);
			$ID=$data['admin_id'];
			$_SESSION['email']=$email;
			$_SESSION['admin_id']=$ID;

			echo"<script>
					window.alert('Login Successful.');
					window.location='product_entry.php';
				</script>";	
				
		}
		else
		{
			$email=$_POST['email'];
		$password=$_POST['password'];

		$select="SELECT * FROM customer WHERE  email ='$email' AND password='$password'";
		$ret1=mysqli_query($connect,$select);
		$count1=mysqli_num_rows($ret1);
		if($count1>0)
		{
			$data=mysqli_fetch_array($ret1);
			$customer_id=$data['customer_id'];
			$_SESSION['LoginEmail']=$email;
			$_SESSION['customer_id']=$customer_id;

			echo"<script>
					window.alert('Login Successful.');
					window.location='product_display.php';
				</script>";	
		}
		else
	{
		if (isset($_SESSION['error']))
		{
			$_SESSION['error']++;
		}
		else 
		{
			$_SESSION['error']=1;
		}
			echo"<script>
					window.alert('Invalid Username or password.');
					window.location='login.php';
				</script>";
		}
		
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title></title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
	

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container" style="padding-left:350px; padding-bottom:300px;">
			<div class="row" >
				<div class="col-lg-8" >
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						         Login Your Account Here
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="login.php" method="POST">
						        		
						       
						        		<p><input type="email"  placeholder="Enter Your Email" name="email" required></p>
						        		<p><input type="password" placeholder="Enter Password" name="password" required></p>
						        	
					                   <p><input type="submit" name="btnLogin" value="Login"></p>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
					
						 
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- end check out section -->



</body></html>
<?php
include('footer.php');
?>

