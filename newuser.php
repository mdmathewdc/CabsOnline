<?php
/* Mathew Dony Chittezhath - 102617305
   Page used to validate new users
*/
include 'db_connection.php';


$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$link = OpenCon();
echo "<br><br>Connected Successfully";
/////////////////////////////////////////////////////////////////////


$sql = "SELECT * FROM customer WHERE email='$email'";
$result = mysql_query($sql);

if (mysql_num_rows($result) > 0)
{
	header("Location: /cos80021/s102617305/assignment1/register.php?msg");
} 
else 
{
	$query = "INSERT INTO customer (`customer name`,password, email, `phone number`) VALUES ('$name','$password','$email','$phone') ";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	sleep(2);
    //  header("Location: /cos80021/s102617305/assignment1/login.php?msg1");
	 header("Location: /cos80021/s102617305/assignment1/validate.php?u=$email&p=$password");
     mysql_close($link);

}
        
?>