<?php  
session_start();
include('connect.php');
include ('Admin_header.php');
 if (isset($_POST['btnSave'])) 
    {
        $category_name=$_POST['category_name'];
       
        
        $select="SELECT * FROM category 
                WHERE category_name='$category_name'";
        $ret=mysqli_query($connection,$select);
        $count=mysqli_num_rows($ret);

        if($count>0) 
        {
            echo"<script>
                    window.alert('Category already exists.');
                    window.location='category_entry.php';
                </script>";
        }
        else 
        {
            $insert="INSERT INTO category(category_name)
                    VALUES('$category_name')";
            $ret=mysqli_query($connection,$insert);

            if($ret)
            {
                echo"<script>
                        window.alert(' New Category saved.');
                        window.location='category_entry.php';
                    </script>";
            }
            else
            {
                echo mysqli_error($connection);
            }
        }

    }

    if (isset($_GET['Action']))
	{
		$Action=$_GET['Action'];
		$CategoryID=$_GET['CategoryID'];

		if($Action=='E')
		{
			$select="SELECT * FROM category
					 WHERE CategoryID='$CategoryID'";

			$ret=mysqli_query($connection,$select);
			$data=mysqli_fetch_array($ret);

			$category_name=$data['category_name'];
		}	
		else if($Action=='D')
		{
			$Delete="DELETE FROM category
					 WHERE CategoryID='$CategoryID' ";
		$ret=mysqli_query($connection,$Delete);
		if($ret)
			{
				echo"<script>
					window.alert('Category delete');
					window.location='category_entry.php';
				</script>";
			}
		}
	}

	if(isset($_POST['btnupdate']))
	{
		$category_name=$_POST['category_name'];
		$CategoryID=$_POST['CategoryID'];
			

		$Update="UPDATE category SET category_name='$category_name'
				where CategoryID='$CategoryID'";

		$ret=mysqli_query($connection,$Update);
		if($ret)
			{
				echo"<script>
					window.alert('Category data updated.');
					window.location='category_entry.php';
				</script>";
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
						         Category Entry Form
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="category_entry.php" method="POST">
						        	<label>Category Name</label>	
						      <p>  <input type="hidden" name="CategoryID" value="<?php if(isset($Action)) {echo $CategoryID; } ?>">
					<input type="text" name="category_name" value="<?php if(isset($Action)) {echo $category_name; } ?>" required/>
						        	</p>
						        	
						        		
									      <p>  	<?php
									if(isset($Action))
									{
										echo'<p><input type="submit" name="btnupdate" value="Update"></p>';
									}
									else
									{
										echo'<p><input type="submit" name="btnSave" value="Add"></p>';
									}
								?></p>
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
<!-- cart -->
	<div class="cart-section mt-150 mb-150">

		<div class="container">
<h2 >Category List</h2>
			<div class="row" style="padding-bottom:300px;" >
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									  <th>Category ID</th>
                                    <th class="product-name">Category Name</th>
                                   
                                    <th class="product-name">Action</th>
									
								</tr>
							</thead>
							<tbody>
								 <?php
            $select="SELECT * FROM category";
            $ret=mysqli_query($connection,$select);
            $count=mysqli_num_rows($ret);
            for ($i=0; $i < $count ; $i++) 
            { 
                $data=mysqli_fetch_array($ret);    
                $CategoryID=$data['CategoryID'];
                $category_name=$data['category_name'];

              echo"<tr class='table-body-row'>
              <td class='product-name'>$CategoryID</td>
               <td class='product-name'>$category_name</td>
         
                
                     <td>
                 

                             <a href='category_entry.php?Action=E&CategoryID=$CategoryID'>Edit</a> |
								<a href='category_entry.php?Action=D&CategoryID=$CategoryID'>Delete</a> 
                            
                        </td>
				    
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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	
</body>
</html>