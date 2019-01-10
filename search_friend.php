<?php
session_start();
if(!isset($_SESSION['username'])){
	

	header("location:log.php");
	
}


?>
<!DOCTYPE html>
<html>
<head>
 <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            Friend_contact_list
                        </div>
                        <!-- /.panel-heading -->
						<form method="POST">
						<table>
						<tr>
							<td>Email</td>
							<td><input type="email" name="email" id="email" placeholder="Enter Email" required="_required" /></td>
						</tr>
						<tr>
							<td><input type="submit" name="search" id="Search" class="search" value="Search Contact" /></td>
						</tr>
						</table>
						</form>
                        <div class="panel-body">
                            <div class="table-responsive">
							
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Phone_number_1</th>
                                            <th>phone_number_2</th>
                                        </tr>
                                    </thead>
									 
                                    
								<?php
								if(isset($_POST['search'])){
									$servername = "localhost";
									$user='root';
									$db='contact_list';
									$email=$_POST['email'];
									
								include('class/connection.php');
								//$sql= "SELECT id,email,phone_number_one,phone_number_two from contacts WHERE category = family";
								$sql="SELECT id,email,phone_number_one,phone_number_two FROM contacts
WHERE email='$email'";
								$result=mysqli_query($con,$sql);
										
                                if (mysqli_num_rows($result)>=1) {
									while($result1=mysqli_fetch_assoc($result)){
										
									echo "<tr><td>".$result1["id"]."</td><td>".$result1["email"]."</td><td>".$result1["phone_number_one"]."</td><td>".$result1["phone_number_two"]."</td></tr>";
										
									}
									echo "</table>";
								
								}
								else
								{
									echo "0 result";
								}
								
									mysqli_close($con);
								
						
								}	
								?>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
				</body>