<?php 
//delete data
if(isset($_POST['submit'])){
	echo '<script>alert("ok");</script>';
	include('class/connection.php');
$servername = "localhost";
$user='root';
$db='contact_list';
$email=$_POST['email'];
$phone_number_one=$_POST['phone_number_one'];
$phone_number_two=$_POST['phone_number_two'];
$category=$_POST['category'];
$con=mysqli_connect($servername,$user,'',$db);
mysqli_query($con,$sql);



	
}
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
	

	header("location:log.php");
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family_contact</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style_family_new.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form">
                <h2>Delete Contact</h2>
                <div class="form-group-1">
				   
                    
                    <input type="email" name="email" id="email" placeholder="Email" required="_required" />
                    
					<input type="tel" minlength="8" maxlength="20" id="phone_number_one" class="form-control" placeholder="Enter Phone number 1" name="phone_number_one" value=""  />
					<input type="tel" minlength="8" maxlength="20" id="phone_number_two" class="form-control" placeholder="Enter Phone number 2" name="phone_number_two" value="" />
				<input type="family" name="family" id="family" placeholder="Enter your group" />
					
                    
                </div>
              
                <div class="form-check">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to the  <a href="#" class="term-service">Terms and Conditions</a></label>
                </div>
                <div class="form-submit">
                    <input type="submit" name="delete" id="delete" class="delete" value="Delete Contact" />
				     
				
                </div>
				
            </form>
			<?php
			if(isset($_POST['delete'])){
				echo '<script>alert("ok");</script>';
	include('class/connection.php');
$servername = "localhost";
$user='root';
$db='contact_list';
$email=$_POST['email'];
$phone_number_one=$_POST['phone_number_one'];
$phone_number_two=$_POST['phone_number_two'];
$category=$_POST['category'];
$con=mysqli_connect($servername,$user,'',$db);
mysqli_query($con,$sql);
     if(mysqli_connect_errno())
	 {
		 
		echo "failed ".mysqli_connect_error;
	 }
			mysqli_query($con,"delete from contacts where email='$email'");
			echo "succesfully deleted";
		    }
			else{
				echo "error in deleting";
			}
			?>
			
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>