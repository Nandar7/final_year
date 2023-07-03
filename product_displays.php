<?php 
		session_start();
		include ('connect.php');
		include ('header.php');
		
		$selectproduct="select * from product";
		$do_selectproduct=mysqli_query($connection,$selectproduct);
		$count=mysqli_num_rows($do_selectproduct);
		$perpage=12;
		$totalpage=ceil($count/$perpage);
		$start=0;


	
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
						<p>Blah Blah Blah</p>
					</div>
				</div>
			</div>
<table>


	 
	 
      


<html>
<head>
	<title>Display</title>
	
</head>

<body>
<form action="product_displays.php" method="POST">
<fieldset>

			



 <div class="row">
<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
											
       
         	<?php

	
	if(isset($_GET['page'])){
    	$page=$_GET['page'];
    	if($page=='' || $page==1){
    		$start=0;
    	}
    	else{
    		$start=($page*$perpage)-$perpage;
    	}
    }
    else{
    	$page='';
    }

  if(isset($_GET['CategoryID'])){
		$CategoryID=$_GET['CategoryID'];
		$query="select * from product where CategoryID='$CategoryID'";
		
	}else{
	
	$query="select * from product";
	}
	
    $query="select * from product";
    if(isset($_GET['CategoryID'])){
    	$query="select * from product where CategoryID='".$_GET['CategoryID']."'";
    }
    
	$go_query=mysqli_query($connection,$query);
	while($out=mysqli_fetch_array($go_query)){
		$product_id=$out['product_id'];
		$CategoryID=$out['CategoryID'];
		$product_name=$out['product_name'];
		$Color=$out['Color'];
		$price=$out['price'];
		$quantity=$out['quantity'];
		$description=$out['description'];
		$image=$out['image'];
		$display ='<div class="product-image">
							<a href="single-product.html">
						';
		$display.="<img src='<?php echo $image ?>'' alt=''></a></div>";

		$display.="<h3>{$product_name}</h3>";

		$display.="<p class='product-price'><span> $ {$price}</p>";


		$display.="<a  class='cart-btn' href='product_details.php?id='.$product_id.'' ><i class='fas fa-shopping-cart'></i>Add to Cart </a>";
		$display.="</div></div></div>";
		
		echo $display;
	}

?>		
			</div>
				</div>

  


</div></fieldset>
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
<?php
include('footer.php');
?>








