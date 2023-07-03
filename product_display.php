<?php  
session_start();
include('connect.php');
include ('header.php');

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
	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Enjoy Our New Product In Here</p>
					</div>
				</div>
			</div>
<table>
<form action="product_display.php" method="POST">
<fieldset>
<tr>
		<hr/>
		<input type="text" name="txtData" placeholder="Enter Search Keywords"/>
		<input type="submit" name="btnSearch" class="btnSearch" value="Search"/>
		<hr/>
</tr>
</table>



<?php
if(isset($_GET['btnSearch'])) 
{
	$txtData=$_GET['txtData'];

	$query1="SELECT * FROM product
			 WHERE product_name LIKE '%$txtData%'
			 ORDER BY product_id DESC";
	$result1=mysqli_query($connection,$query1);
	$count1=mysqli_num_rows($result1);
	
	for($i=0;$i<$count1;$i+=3) 
	{ 
		$query2="SELECT * FROM product 
				 WHERE product_name LIKE '%$txtData%'
				 ORDER BY product_id DESC
				 LIMIT $i,3";
		$result2=mysqli_query($connection,$query2);
		$count2=mysqli_num_rows($result2);


		echo "<div class='row'>";
		for($j=0;$j<$count2;$j++) 
		{ 
			$row=mysqli_fetch_array($result1);

			$product_id=$row['product_id'];
			$image=$row['image'];
			$product_name=$row['product_name'];
			$price=$row['price'];
			list($Width,$Height)=getimagesize($image);
			$w=$Width/2;
			$h=$Height/2;
			?>


				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo $image ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt=""></a>
						</div>
						<h3><?php echo $product_name ?></h3>
						<p class="product-price"><span><?php echo $price ?></p>
						<a  class="cart-btn" href="product_detail.php?product_id=<?php echo $product_id ?>"><i class="fas fa-shopping-cart"></i>Show Detail </a>
					</div>
				</div>
		<?php
		}
		echo "</div>";
	}
}
else
{	$query1="SELECT * FROM product

			ORDER BY product_id DESC";
	$result1=mysqli_query($connection,$query1);
	$count1=mysqli_num_rows($result1);

	for($i=0;$i<$count1;$i+=4) 
	{ 
		$query2="SELECT * FROM product
				 ORDER BY product_id DESC
				 LIMIT $i,4";
		$result2=mysqli_query($connection,$query2);
		$count2=mysqli_num_rows($result2);

		echo "<div class='row'>";
		for($j=0;$j<$count2;$j++) 
		{ 
			$row=mysqli_fetch_array($result1);

			$product_id=$row['product_id'];
			$image=$row['image'];
			$product_name=$row['product_name'];
			$price=$row['price'];
			list($Width,$Height)=getimagesize($image);
			$w=$Width/2;
			$h=$Height/2;
			?>
			<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="<?php echo $image ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt=""></a>
						</div>
						<h3><?php echo $product_name ?></h3>
						<p class="product-price"><span><?php echo $price ?></p>
						<a  class="cart-btn" href="product_detail.php?product_id=<?php echo $product_id ?>"><i class="fas fa-shopping-cart"></i>Show Detail </a>
					</div>
				</div>
		<?php
		}
		echo "</div>";
	}
}
?>
</div>
</div>
</form>  



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
