<?php 
include('connect.php');
include('header.php');

$order_id=$_REQUEST['order_id'];

	$select="SELECT *
				FROM order_data o, customer c, product p, category ca, order_detail od
				WHERE c.customer_id = o.customer_id
				AND p.CategoryID = ca.CategoryID
				AND od.product_id = p.product_id
				AND od.order_id = o.order_id
				AND od.order_id = '$order_id'
    		";
    $ret=mysqli_query($connection,$select) or die(mysqli_error($connection));
    $row=mysqli_fetch_array($ret);
    
 ?>
<html>
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
 	<div id="header">
 		Order INVOICE
 	</div>
 	<!-- <div id="identity">
 		<div id="address">
 			INFORMATION
 		</div>
 	</div> -->
 	<div id="customer">
 		<table id="meta" class="table table-hover">
 			<tr>
 				<td class="meta-head">Inovice</td>
 				<td><?php echo $row['order_id']; ?> </td>
 			</tr>
 			<tr>
 				<td class="meta-head">Booking Date</td>
 				<td id="date"><?php echo $row['order_date']; ?> </td>
 			</tr>
 			<tr>
 				<td class="meta-head">Delivery Address</td>
 				<td id="date"><?php echo $row['address']; ?> </td>
 			</tr>
 		</table>
 	</div>
 	<table id="item">
 		<tr>
 			<th>Order ID</th>
 			<th>Product Name</th>
 			<th>Price</th>
 			<th>Qty</th>
 			<th>Amount</th>
 		</tr>
<?php 
$select="SELECT *
FROM order_data o, customer c, product p, category ca, order_detail od
WHERE c.customer_id = o.customer_id
AND p.CategoryID = ca.CategoryID
AND od.product_id = p.product_id
AND od.order_id = o.order_id
AND od.order_id = '$order_id'
    ";
    $ret=mysqli_query($connection,$select);
    $count=mysqli_num_rows($ret);
for ($i=0; $i <$count ; $i++) 
{ 
	$roww=mysqli_fetch_array($ret);

	?>

<tr class="item-row">
 			<td class="item-name"><?php echo $roww['order_id']; ?></td>
 			<td class="description"><?php echo $roww['product_name']; ?></td>
 			<td class="qty"><?php echo $roww['price']; ?></td>
 			<td class="qty"><?php echo $roww['quantity']; ?></td> 

 			<?php 

 			$qty=$roww['quantity'];$price=$roww['price']; 

 			$Amount=$qty*$price;

 			?>	

 			<td class="qty"><?php echo $Amount; ?></td>

 		</tr>


	<?php
}

 ?>
 		
 			<td class="blank"> </td>
 			<td class="blank"> </td>
 			<td class="blank"> </td>
 			
 				<td clospan="2" class="total-line balance">Total Balance</td>
 				<td class="total-value balance">
 				<div class="due"><?php echo $Amount* $qty ?> MMK</div>
 			
 		<!-- </tr>
 --> 	</table>

 		<div id="terms">
		  <h5>Terms</h5>
		  <p>Thanks You For Your Using</p>
		  <p>Click the button to print the current page.</p>
			<button onclick="print_current_page()">Print this invoice</button>
	</div>
		
	<script type="text/javascript">
	
function print_current_page()
{
window.print();
}
	
</script>
 </body>
 </html>

