<?php


function show_result(){
	global $connection;
	$data=$_POST['search'];
	
	$query="select * from product where product_name LIKE '%$data%'";
	$go_query=mysqli_query($connection,$query);
	$count_result=mysqli_num_rows($go_query);
	if($count_result==0){
		 echo "<div class=\"col-md-6 col-md-offset-3\">
  <h1 class='text-danger noitem'>No results found here!</h1>
  <p class=\"text-center\"><a href=\"index.php\" class=\"btn btn-default\">Back Home!</a></p>
  </div>";
	}elseif($count_result>0){
	echo '<h2>We found <span class="text-danger"> " '.$count_result.' "</span>
	results for your search <span class="text-danger">" '.$data.'"</span></h2>';
	while($out=mysqli_fetch_array($go_query)){
		$product_id=$out['product_id'];
		$product_name=$out['product_name'];
		$price=$out['price'];
		$image=$out['image'];
		


		$display='<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">';
		$display.='<a href="single-product.html"><img src="<?php echo $image ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt=""></a>';
		$display.='</div>';
	
		$display.='<p class="product-price"><span><?php echo $price ?></p>';

		$display.='<a  class="cart-btn" href="product_detail.php?product_id=<?php echo $product_id ?>"><i class="fas fa-shopping-cart"></i>Show Detail </a>';
	
		$display.='</div></div>';
		
		echo $display;
	
	}
	}	
}
?>