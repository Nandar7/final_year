<?php  
session_start();

session_destroy(); 
//session_regenerate_id(); 
echo "<script>alert('Logout Successfully');
		window.location.assign('Login.php');
		</script>";

?>