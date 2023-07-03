<?php  
session_start();
include('connect.php');
include ('Admin_header.php');
// include ('AutoID_Functions.php');



 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Cart</title>

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
    
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">

        <div class="container">
<h2 >Order List</h2>
            <div class="row" style="padding-bottom:300px;" >
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                      <th>Order ID.</th>
                                    <th class="product-name">Customer ID</th>
                                    <th class="product-name">Product Name</th>
                                      <th class="product-name">Order Date</th>
                                      <th class="product-name">Payment Type</th>
                                       <th class="product-name">Address</th>
                                    <th class="product-name">Phone</th>
                                     <th class="product-name">Account No</th> 
                                     <th class="product-name">Total</th>
                                     <th class="product-name">Status</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
            $select="SELECT * FROM order_data";
            $ret=mysqli_query($connection,$select);
            $count=mysqli_num_rows($ret);
            for ($i=0; $i < $count ; $i++) 
            { 
                $data=mysqli_fetch_array($ret);    
                $order_id=$data['order_id'];
                $customer_id=$data['customer_id'];
                $product_name=$data['product_name'];
                $order_date=$data['order_date'];
                $payment_type=$data['payment_type'];
                $address=$data['address'];
                $phone=$data['phone'];
                $account_no=$data['account_no'];
                $total_amount=$data['total_amount'];
                $order_status=$data['order_status']; 



              echo"<tr class='table-body-row'>
              <td class='product-name'>$order_id</td>
               <td class='product-name'>$customer_id</td>
            
                   <td class='product-name'>$product_name</td>
                    <td class='product-name'>$order_date</td>
                <td class='product-name'>$payment_type</td>
                <td class='product-name'>$address</td>
                <td class='product-name'>$phone</td>
                <td class='product-name'>$account_no</td>
                <td class='product-name'>$total_amount</td>
                <td class='product-name'>$order_status</td>

                
                  
                    
                    </tr>";
            }
        ?>
                     
                                
                            </tbody>
                        </table>
                    </div>
                </div>

      
            </div>
        </div>
    </div>
    <!-- end cart -->


    
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
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>
</html>