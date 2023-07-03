<?php 

function Add_ShoppingCart($product_id,$BuyQuantity)
{
	
$connection=mysqli_connect('Localhost','root','','flower');
	$query="SELECT * FROM product WHERE product_id='$product_id'";
	$ret=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ret);

	if($count<1) 
	{
		echo "<p>No Record Found.</p>";
		exit();
	}

	$arr=mysqli_fetch_array($ret);
	$product_name=$arr['product_name'];
	$price=$arr['price'];
	$image=$arr['image'];

	if(isset($_SESSION['ShoppingCart'])) 
	{
		$index=IndexOf($product_id);

		if($index== -1) 
		{
			$size=count($_SESSION['ShoppingCart']);

			$_SESSION['ShoppingCart'][$size]['product_id']=$product_id;
			$_SESSION['ShoppingCart'][$size]['product_name']=$product_name;
			$_SESSION['ShoppingCart'][$size]['price']=$price;
			$_SESSION['ShoppingCart'][$size]['BuyQuantity']=$BuyQuantity;
		}
		else
		{
			$_SESSION['ShoppingCart'][$index]['BuyQuantity']+=$BuyQuantity;
		}
		
	}
	else
	{
		$_SESSION['ShoppingCart']=array();

		$_SESSION['ShoppingCart'][0]['product_id']=$product_id;
		$_SESSION['ShoppingCart'][0]['product_name']=$product_name;
		$_SESSION['ShoppingCart'][0]['price']=$price;
		$_SESSION['ShoppingCart'][0]['BuyQuantity']=$BuyQuantity;

	}
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function Remove_ShoppingCart($product_id)
{
	$index=IndexOf($product_id);

	if($index != -1) 
	{
		unset($_SESSION['ShoppingCart'][$index]);
		$_SESSION['ShoppingCart']=array_values($_SESSION['ShoppingCart']);
	}
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function Clear_ShoppingCart()
{
	unset($_SESSION['ShoppingCart']);
	echo "<script>window.location='ShoppingCart.php'</script>";
}

function CalculateTotalAmount()
{
	$total=0;
	
	$size=count($_SESSION['ShoppingCart']);

	for ($i=0;$i<$size;$i++) 
	{ 
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$price=$_SESSION['ShoppingCart'][$i]['price'];
		$total=$total + ($BuyQuantity * $price);
	}
	return $total;
}


function IndexOf($product_id)
{
	if(!isset($_SESSION['ShoppingCart']))
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCart']);

	if($size<1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($product_id == $_SESSION['ShoppingCart'][$i]['product_id']) 
		{
			return $i;
		}
	}
	return -1;
}
?>