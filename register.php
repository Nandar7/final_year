
<?php
    session_start(); 
    include('connect.php');
    include('header.php');

    if (isset($_POST['btnregister'])) 
    {
        $customer_name=$_POST['txtcustomer_name'];
         $phone=$_POST['txtphone'];
        $address=$_POST['txtaddress'];
        $email=$_POST['txtemail'];       
        $password=$_POST['txtpassword'];
        

        $select="SELECT * FROM customer WHERE customer_name='$customer_name'";
        $ret=mysqli_query($connection,$select);
        $count=mysqli_num_rows($ret);

        if($count>0) 
        {
            echo"<script>
                    window.alert('customer already exists.');
                    window.location='register.php';
                </script>";
        }
        else 
        {
            $insert="INSERT INTO customer(customer_name,phone,address,email,password)
                    VALUES('$customer_name','$phone','$address','$email','$password') ";
            $ret=mysqli_query($connection,$insert);

            if($ret)
            {
                echo"<script>
                        window.alert('customer saved.');
                        window.location='login.php';
                    </script>";
            }
            else
            {

                echo mysqli_error($connection);
            }
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


            <div class="row" align="center">
                <div class="col-lg-6 col-md-6">
                    <div class="well-block">
                        <div class="well-title">
                            <h2 style="margin-left: 150px;">Register Here</h2>
                        </div>
                        <form action="register.php" method="POST">
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Name</label>
                                        <input type="hidden" name="txtcustomer_id" >
                                        <input  name="txtcustomer_name" type="text" placeholder="Pls Enter Your Name" class="form-control input-md" required=""  style="margin-left: 250px;">
                                    </div>
                                </div>

                               
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Phone</label>
                                        <input  name="txtphone" type="number" placeholder="Pls Enter Your Phone" class="form-control input-md" style="margin-left: 250px;">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <textarea name="txtaddress" class="form-control" 

                            placeholder="Enter Your Address" required="" style="margin-left: 250px;"></textarea>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Email</label>
                                        <input  name="txtemail" type="email" placeholder="Pls Enter Your Email" class="form-control input-md" required=""  style="margin-left: 250px;">
                                    </div>
                                </div>
                             <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Password</label>
                                        <input  name="txtpassword" type="text" placeholder="Pls Enter Your Password" class="form-control input-md" required=""  style="margin-left: 250px;">
                                    </div>
                                </div>
                            
                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit"  name="btnregister" class="new-btn-d br-2" style="margin-left: 65px;">Register </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
         
  
</body>
</html>