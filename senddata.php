<!DOCTYPE html>
<html>
<body>
<?php
function validate_data($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = strip_tags($data);
 $data = htmlspecialchars($data);
 return $data;    
}
if( isset( $_POST['submit_form'] ) )
{
 
	$fullname=validate_data($_POST['fullnameofdonor']);
	$mobile=validate_data($_POST['mobileno']);
	$email=validate_data($_POST['email']);
	$age=validate_data($_POST['age']);
	$gender=validate_data($_POST['gender']);
	$blodgroup=validate_data($_POST['bloodgrp']);
	$address=validate_data($_POST['address']);
	$message=validate_data($_POST['message']);
	$status=1;

 	$host = 'localhost';
 	$user = 'root';
 	$pass = '';
 	//$db='dbms';

	$con=mysqli_connect($host, $user, $pass);
	mysqli_select_db($con,'dbms');
	$checksql="SELECT * from blooddonorsinfo where (FullName='$fullname' and MobileNumber='$mobile' and BloodGroup='$blodgroup')";
	$query = mysqli_query($con,$checksql);
	echo"hello";
	if(mysqli_num_rows($query) > 0)
		{
		
			echo"<script>
			var r=confirm('Error:You have already Registered as a Donor');
			if (r == true) {
				window.location.href = 'becomeadonor.html';
				}
			  </script>";

		
		}
		else
		{
			$sql="INSERT INTO  blooddonorsinfo(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,Message,status) VALUES('$fullname','$mobile','$email','$age','$gender','$blodgroup','$address','$message','$status')";
			 mysqli_query($con,$sql);
			echo"<script>
			var r=confirm('Thank You are a Donor Now');
			if (r == true) {
				window.location.href = 'becomeadonor.html';
				}
			  </script>";
		}
}
?>
</body>
</html>