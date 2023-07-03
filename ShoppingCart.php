<?php  

session_start();
include('connect.php');
include('ShoppingCart_Function.php');
include 'header.php';

 


if(isset($_GET['action'])) 
{
	$action=$_GET['action'];

	if($action==="buy") 
	{
		$product_id=$_GET['product_id'];
		$BuyQuantity=$_GET['txtbuyQty'];
		
		Add_ShoppingCart($product_id,$BuyQuantity);
	}
	elseif($action==="remove") 
	{
		$product_id=$_GET['product_id'];
		Remove_ShoppingCart($product_id);
	}
	elseif($action==="clear") 
	{
		Clear_ShoppingCart();
	}
}
else
{
	$action="";
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
<fieldset>
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

<div class="container">
<h2 >Order List</h2>
<?php  
if(!isset($_SESSION['ShoppingCart'])) 
{
	echo "<p>Shopping Cart is Empty</p>";

	echo "<a href='product_display.php'>Buy Product Here</a>"; 
	exit();
}
?>

			<div class="row" >
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									  <th class="product-name" >No</th>
                                    <th class="product-name">Product Name</th>
                                   <th class="product-name">Price </th>
                                   <th class="product-name">Quantity </th>
                                	 <th class="product-name">SubTotal </th>
                                    <th class="product-name">Action</th>
								
								</tr>
							</thead>
				<tbody>




<?php 


	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$product_id=$_SESSION['ShoppingCart'][$i]['product_id'];
		$product_name=$_SESSION['ShoppingCart'][$i]['product_name'];
    	$price=$_SESSION['ShoppingCart'][$i]['price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$Subtotal=$price * $BuyQuantity;
		
		echo"<tr class='table-body-row'>
		       <td class='product-name'>$product_id</td>
               <td class='product-name'>$product_name</td>
                <td class='product-name'>$price MMK</td>
                <td class='product-name'>$BuyQuantity</td>
                <td class='product-name'>$Subtotal</td>

                     <td>                 
                        <a href='ShoppingCart.php?action=remove&product_id=$product_id'>Delete</a>
                            
                        </td>
				    
                    </tr>";

	}
	
?>
<tr class='table-body-row'>
    <td class='product-name'>
	Total Amount : <b><?php echo CalculateTotalAmount(); ?></b> MMK 
	<br/>
	
	<a href="ShoppingCart.php?action=clear">Empty Cart</a> |
<?php echo 	"<a href='CheckOutPage.php?product_name=$product_name'>Make Checkout</a>"?> |
	<a href="product_display.php">Product Display</a> 
	</td>	
</tr>
</tbody>
</table>
</div></div>
	
</div>
</div>

	<!-- end cart -->



</fieldset>



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
