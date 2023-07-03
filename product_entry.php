<?php  
session_start();
include('connect.php');
include ('Admin_header.php');
if (isset($_POST['btnregister'])) 
    {
        $CategoryID=mysqli_real_escape_string($connection,$_POST['CategoryID']);
        $product_name=mysqli_real_escape_string($connection,$_POST['product_name']);
        $Color=mysqli_real_escape_string($connection,$_POST['Color']);
        $quantity=mysqli_real_escape_string($connection,$_POST['quantity']);        
        $price=mysqli_real_escape_string($connection,$_POST['price']);
        $description=mysqli_real_escape_string($connection,$_POST['description']);
//////////////////////////////////////////////////////
	//image upload coding--------
	$image=$_FILES['txtimage']['name'];
	$folder="image/";

	if ($image) 
	{
	$filename=$folder."_".$image;
		$copied=copy($_FILES['txtimage']['tmp_name'],$filename);
		
		if(!$copied)
		{
			echo "<p>Problem occured. Cannot upload Itemimage</p>";
			exit();
		}
	}
	//image upload coding end------------------

////////////////////////////////////////////////////////
        

        $select="SELECT * FROM product WHERE product_name='$product_name'";

        $ret=mysqli_query($connection,$select);
        $count=mysqli_num_rows($ret);

        if($count>0) 
        {
            echo"<script>
                    window.alert('Product already exists.');
                    window.location='product_entry.php';
                </script>";
        }
        else 
        {
            $insert="INSERT INTO product(CategoryID,product_name,Color,quantity,price,description,image)
                    VALUES('$CategoryID','$product_name','$Color','$quantity','$price','$description',
                        '$filename')";
            $ret=mysqli_query($connection,$insert);

            if($ret)
            {
                echo"<script>
                        window.alert('New Product Data saved.');
                        window.location='product_entry.php';
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
		$product_id=$_GET['product_id'];

		if($Action=='E')
		{
			$select="SELECT * FROM product
					 WHERE product_id='$product_id'";

			$ret=mysqli_query($connection,$select);
			$data=mysqli_fetch_array($ret);
			
			$CategoryID=mysqli_real_escape_string($connection,$data['CategoryID']);
			$product_name=mysqli_real_escape_string($connection,$data['product_name']);
			$Color=mysqli_real_escape_string($connection,$data['Color']);
	        $quantity=mysqli_real_escape_string($connection,$data['quantity']);
	        
	        $price=mysqli_real_escape_string($connection,$data['price']);
	        $description=mysqli_real_escape_string($connection,$data['description']);

		}	
		else if($Action=='D')
		{
			$Delete="DELETE FROM product
					 WHERE product_id='$product_id'";

		$ret=mysqli_query($connection,$Delete);
		if($ret)
			{
				echo"<script>
					window.alert('Product delete');
					window.location='product_entry.php';
				</script>";
			}
		}
	}

	if(isset($_POST['btnupdate']))
	{
		$CategoryID=$_POST['CategoryID'];
			$product_name=mysqli_real_escape_string($connection,$_POST['product_name']);
			$Color=mysqli_real_escape_string($connection,$_POST['Color']);
	        $quantity=mysqli_real_escape_string($connection,$_POST['quantity']);	        
	        $price=mysqli_real_escape_string($connection,$_POST['price']);
	        $description=mysqli_real_escape_string($connection,$_POST['description']);
	        
		$product_id=$_POST['product_id'];
		$Update="
				UPDATE product SET product_name='$product_name',
				Color='$Color',
				quantity='$quantity',
				price='$price',
				description='$description' 
				where product_id='$product_id'";

		$ret=mysqli_query($connection,$Update);
		if($ret)
			{
				echo"<script>
					window.alert('Product updated.');
					window.location='product_entry.php';
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
						         Product Entry Form
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="product_entry.php" method="POST" enctype="multipart/form-data">

						        		<label>Product Name</label>	
					<p><input type="hidden" name="product_id" value="<?php if(isset($Action)) {echo $product_id; } ?>">
					<input type="text" name="product_name" value="<?php if(isset($Action)) {echo $product_name; } ?>" required/>
				</p>
							 <p>  <label>Category Name</label>
						      	<select name="CategoryID" id="select" class="form-control" required/>
						<option >Search By Category Name</option>
						<?php
						$query="select * from category";
						$ret=mysqli_query($connection,$query);
						$count=mysqli_num_rows($ret);
						for ($i=0; $i <$count; $i++) 
						{ 
							$row=mysqli_fetch_array($ret);
						    $CategoryID=$row['CategoryID'];
							$category_name=$row['category_name'];
							echo "<option ' value='$CategoryID'>$category_name </option> ";
						}
						?>
						        </select>	</p>

						        	
						      <p>  <label>Color</label>
					<input id="select" type="text" name="Color" value="<?php if(isset($Action)) {echo $Color; } ?>"  required/>
						        	</p>

						        	<label>Quantity </label>	
						      <p>  
						      	<input type="text" name="quantity" value="<?php if(isset($Action)) {echo $quantity; } ?>" required/>
					
						        	</p>

						        	<label>Price</label>	
						      <p>  
					<input type="text" name="price" value="<?php if(isset($Action)) {echo $price; } ?>" required/>
						        	</p>



						        	<label>Description</label>	
						      <p>  
						      	<textarea type="text" name="description" id="bill" cols="30" rows="10"  value="<?php if(isset($Action)) {echo $description; } ?>" ></textarea>
					
						        	</p>

						        	<label>Product Image</label>	
						      <p>  
						      	
					<input type="file" name="txtimage" value="<?php if(isset($Action)) {echo $image; } ?>" required/>
						        	</p>
						        	 


						        <p ><?php
						if(isset($Action))
						{
							echo'<input type="submit" name="btnupdate" value="Update">';
						}
						else
						{
							echo'<input type="submit" name="btnregister" value="Add">';
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
<h2 >Product List</h2>
			<div class="row" style="padding-bottom:300px;" >
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									  <th>No</th>
                                    <th class="product-name">Product Name</th>
                                    <th class="product-name">Category Name</th>
                                     <th class="product-name">Color</th>
                                      <th class="product-name">quantity </th>
                                       <th class="product-name">Price </th>
                                        <th class="product-name">Desccription </th>
                                         <th class="product-name">Image </th>
                                    <th class="product-name">Action</th>
									
								</tr>
							</thead>
							<tbody>



								 <?php
            $select="SELECT * FROM product p, category ca WHERE p.CategoryID=ca.CategoryID";
            $ret=mysqli_query($connection,$select);
            $count=mysqli_num_rows($ret);
            for ($i=0; $i < $count ; $i++) 
            { 
                $data=mysqli_fetch_array($ret);    
                $product_id=$data['product_id'];
                $product_name=$data['product_name'];
                $category_name=$data['category_name'];
                $Color=$data['Color'];
                $quantity=$data['quantity'];
                $price=$data['price'];
                $description=$data['description'];
                $image=$data['image'];




              echo"<tr class='table-body-row'>
              <td class='product-name'>$product_id</td>
               <td class='product-name'>$product_name</td>
         		
         	<td class='product-name'>$category_name</td>
         	<td class='product-name'>$Color</td>
         	<td class='product-name'>$quantity</td>
         	<td class='product-name'>$price</td>
         	<td class='product-name'>$description</td>
         	<td class='product-name'><img src='$image' width='50px' height='50px'></td>
                
                     <td>
                 

                             <a href='product_entry.php?Action=E&product_id=$product_id'>Edit</a> |
								<a href='product_entry.php?Action=D&product_id=$product_id'>Delete</a> 
                            
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