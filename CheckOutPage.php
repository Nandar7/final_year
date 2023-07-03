<?php  
session_start();  
include('connect.php');
 include 'header.php';
include('AutoID_Functions.php');
include('ShoppingCart_Function.php');

 $customer_id=$_SESSION['customer_id'];


    if(isset($_REQUEST['product_name'])) 
    {
      $product_name=$_REQUEST['product_name'];

    }
    else
    {
      $product_name="";
    }

if (isset($_POST['btncheckout'])) 
{
	
	$order_id=AutoID('order_data','order_id','O_',6);
	
	$customer_id=$_POST['customer_id'];
	$product_name=$_POST['product_name'];
	$order_date=date('Y-m-d');
	$payment_type=$_POST['payment_type'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$account_no=$_POST['account_no'];


	$total_amount=CalculateTotalAmount();

	$insert="INSERT INTO order_data (order_id,customer_id,product_name,order_date,payment_type,address,phone,account_no,total_amount,order_status) VALUES 
    ('$order_id','$customer_id','$product_name','$order_date','$payment_type','$address','$phone','$account_no','$total_amount','Pending') ";
	$ret=mysqli_query($connection,$insert);

	$size=count($_SESSION['ShoppingCart']);

	for ($i=0; $i < $size; $i++) 
	{ 
		$product_id=$_SESSION['ShoppingCart'][$i]['product_id'];
		$product_name=$_SESSION['ShoppingCart'][$i]['product_name'];
		$price=$_SESSION['ShoppingCart'][$i]['price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];

	
		$update="
				Update product
				set quantity=quantity-$BuyQuantity
				where product_id='$product_id'
				";
		$ret=mysqli_query($connection,$update);
	}

	unset($_SESSION['ShoppingCart']);

	if ($ret) 
	{
		
		echo "<script>window.alert('Thanks for order product')</script>";
		echo "<script>window.location='product_display.php'</script>";	
	}
	else
	{
		echo mysqli_error($connection);

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
   


	<title></title>
<script type="text/javascript" src="jquery.js"></script>	

<script type="text/javascript">

$(document).ready(function(){

$(".cashtext").hide();
$(".banktext").hide();

$("#cash").click(function(){

$(".cashtext").show();
$(".banktext").hide();

})

$("#bank").click(function(){

$(".cashtext").hide();
$(".banktext").show();

})



})

</script>

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
                                 Order List
                                </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                                <div class="billing-address-form">
                                    <form action="CheckOutPage.php" method="POST" >

                                        <label>Order ID </label>           

                    <p><input type="text" name="order_id" value="<?php echo AutoID('
                                order_data','order_id','',1); ?>" required readonly>
                </p>
                             <label>Customer ID</label>
                        <p> <input type="text" class="form-control" name="customer_id"  value="<?php echo $_SESSION['customer_id'] ?>"  >     </p>
                                    
                              <p>  <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name"  value="<?php echo $product_name?>"  required readonly>
                                    </p>
                                     <p>  <label> Order Date</label>
                        <input type="text" class="form-control" value="<?php echo date('Y/m/d') ?>" name="order_date" required readonly>
                                    </p>
                                    <p>  <label> Payment Type</label>
                                  <select name="payment_type" class="form-control">
                                <option>Visa Card</option>
                                <option>Cash On Delivery</option>
                                <option>Master Card</option>
                                <option>KBZ Pay</option>
                                <option>CBPay</option>
                                <option>MPU</option>
                            </select>
                                    </p>

                                    <p>  <label> Address</label>
                         <input type="text" class="form-control" name="address" required>
                                    </p>
                                    <p>  <label> Phone</label>
                     <input type="number" class="form-control" name="phone" required>
                                    </p>
                                    <p>  <label> Account Number</label>
                                  <input type="number" class="form-control" name="account_no" required>
                                    </p>
                                    <p>  <label> Total Amount</label>
                                    <td name="total_amount"><?php echo CalculateTotalAmount(); ?></td>
                                    </p>

                            <p>    <input type="submit" name="btncheckout" class="site-btn" value="Check Out"></p>

                                    </form>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

        
            </div>
        </div>
    </div>
    <!-- end cart -->


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