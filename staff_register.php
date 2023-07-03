
<?php  
session_start();
include('connect.php');
include ('Admin_header.php');
 if (isset($_POST['btnregister'])) 
    {
        $staff_name=$_POST['staff_name'];
        $position=$_POST['position'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        

        $select="SELECT * FROM staff WHERE staff_name='$staff_name'";
        $ret=mysqli_query($connection,$select);
        $count=mysqli_num_rows($ret);

        if($count>0) 
        {
            echo"<script>
                    window.alert('Staff already exists.');
                    window.location='staff_register.php';
                </script>";
        }
        else 
        {
            $insert="INSERT INTO staff(staff_name,position,email,gender,phone,address,password)
                    VALUES('$staff_name','$position','$email','$gender','$phone','$address',
                        '$password')";
            $ret=mysqli_query($connection,$insert);

            if($ret)
            {
                echo"<script>
                        window.alert('Staff saved.');
                        window.location='view_data.php';
                    </script>";
            }
            else
            {

                echo mysqli_error($connection);
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
	<title>Contact</title>

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
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container" style="padding-left:350px;">
			<div class="row" >
				<div class="col-lg-8" >
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						         Staff Registeration Form
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="staff_register.php" method="POST">
						        		
						        		<p><input type="hidden" name="staff_id" >
						        			<label>Staff Name</label>	
						        		<input type="text" name="staff_name" placeholder="Enter Your Name" required></p>
						        		<label>Job Position</label>	
						        		<p><input type="text" name="position" placeholder="Enter Your Job Position" required></p>
						        		<label>Email</label>	
						        		<p><input type="email" name="email" placeholder="Enter Your Email" required></p>
						        		<p><label class="control-label" >Gender</label>
					                   		 <select  name="gender" class="form-control" required="" >
					                        <option value="Female">Female</option>
					                        <option value="Male">Male</option>    
					               				 </select></p>
						        		<label>Phone</label>	
						        		<p><input type="number" name="phone" placeholder="Enter Your Phone" required></p>
						        			<label>Address</label>	<p><textarea name="address" id="bill" cols="30" rows="10" placeholder="Enter Your Address" required></textarea></p>
						        		<label>Password</label>	<p><input type="password" name="password" placeholder="Enter Your Password" required></p>
						        <p>	<input type="submit" name="btnregister" value="Register"></p>
						        		
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>
						<form action="export_excel.php" method="post">
	<input type="hidden" name="sql" value="<?php echo $query ?>"/>
    <input type="submit" name="showall" value="Generate Excel Report"/>
</form>
						 
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- end check out section -->

	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	
</body>
</html>