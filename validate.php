
<?php
/* Mathew Dony Chittezhath - 102617305
   Page used to authenticate user login
*/
include 'db_connection.php';
    
session_start();

$conn = OpenCon();



  if(isset($_GET['u']) && isset($_GET['p']))
	  
    {
		$username = $_GET['u'];
		$password = $_GET['p'];
		
		$sql = "SELECT * FROM customer WHERE password='$password' AND email='$username'";
		$result = mysql_query($sql);

		if (mysql_num_rows($result) > 0)
		{
			$_SESSION['user'] = $username; // Initializing Session and storing email
			header("location: booking.php"); // Redirecting To Booking Page
		} 
		else 
		{
			header("location: login.php?msg2");
		}


    }

  else
  
	{
		$username = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM customer WHERE password='$password' AND email='$username'";
		$result = mysql_query($sql);

		if (mysql_num_rows($result) > 0)
		{
			$_SESSION['user'] = $username; // Initializing Session and storing email
			header("location: booking.php"); // Redirecting To Booking Page
		} 
		else 
		{
			header("location: login.php?msg2");
		}
	}


?>