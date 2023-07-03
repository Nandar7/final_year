<?php
session_start();
include('connect.php');
include ('header.php');	




if (isset($_REQUEST['product_id'])) 
{
    $product_id=$_REQUEST['product_id'];

        $query="SELECT * FROM product p,category ca
            WHERE p.CategoryID=ca.CategoryID and product_id='$product_id'
            ";
    $ret=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($ret);

	$image=$row['image'];
	$product_id=$row['product_id'];
	$product_name=$row['product_name'];
	$category_name=$row['category_name'];
	$Color=$row['Color'];
	$quantity=$row['quantity'];
	$price=$row['price'];
	$description=$row['description'];


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

		<!-- single article section -->
	<div class="mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="single-product-img">
						<img src="<?php echo $row['image'] ?>" class="img-responsive" alt="">					
					</div>
				</div>
				
				<div class="col-lg-4" style="padding-right:150px;">

	
					<form action="ShoppingCart.php" method="GET" enctype="multipart/form-data">
						<input type="hidden" name="product_id" value="<?php echo $product_id ?>"/>
			<input type="hidden" name="action" value="buy"/>
			<fieldset>
					<div class="sidebar-section">
						<div class="recent-posts">
						
							<p><strong>Category Name: </strong><b><?php echo $row['category_name'] ?></p>
								<p><strong>Product Name: </strong><b><?php echo $row['product_name'] ?></p>
							<p><strong>Color:</strong><?php echo $row['Color'] ?></p>
							<p><strong>quantity:</strong>
								<?php 
							  if($quantity==0) 
							  {
							  	echo "<b><del>Out of Stock.</del></b>";
							  	exit();
							  }
							  else
							  {
							  	echo "<b>$quantity</b> Stock";
							  }
							  ?>	

							</p>
							<p><strong>Price:</strong><?php echo $row['price'] ?></p>
							<p><strong>Description:</strong><?php echo $row['description'] ?></li></p>
							<p><strong>Enter Quantity:</strong> <b><input type='number' name='txtbuyQty'min='1' max='<?php echo $quantity ?>' ></b></p>
							<p><input type='submit' name='btnAddtoCart' value='Add to Cart'> </p>
						</div>
					
					</div></fieldset></form>
				</div>

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


