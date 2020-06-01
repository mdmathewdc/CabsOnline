<?php
/* Mathew Dony Chittezhath - 102617305
   Page used to enter new bookings into the system
*/
session_start();
include 'db_connection.php';

$passengername = $_POST['passengername'];
$email = $_SESSION['user'];
$phone = $_POST['phone'];
$unitnumber = $_POST['unitnumber'];
$streetnumber = $_POST['streetnumber'];
$streetname = $_POST['streetname'];
$suburb = $_POST['suburb'];
$destinationsuburb = $_POST['destinationsuburb'];
$pickupdate = $_POST['pickupdate'];
$pickuptime = $_POST['pickuptime'];

$bookingno = uniqid();
date_default_timezone_set('Australia/Melbourne');
$bookingtime = date('d/m/Y H:i:s a', time());
$status = "Unassigned";

$to = $email;
$subject = "Your booking request with CabsOnline!";
$message = "Dear ".$passengername.", Thanks for booking with CabsOnline! Your booking reference number is ".$bookingno.". We will pick up the passengers in front of your provided address at ".$pickuptime." on ".$pickupdate.".";
$header = "From: booking@cabsonline.com.au";
    
    
//echo $bookingtime;
    

//echo "<br>".$bookingno;

$conn = OpenCon();
if ($unitnumber)
{
$sql = "INSERT INTO booking (`bookingno`,`passengeremail`,`passengername`,`passengerphone`,`unitno`,`streetnumber`,`streetname`,`suburb`,`destinationsuburb`,`pickupdate`,`pickuptime`,`bookingtime`,`status`) VALUES ('$bookingno','$email','$passengername','$phone','$unitnumber','$streetnumber','$streetname','$suburb','$destinationsuburb','$pickupdate','$pickuptime','$bookingtime','$status')";
}
else
{
	$sql = "INSERT INTO booking (`bookingno`,`passengeremail`,`passengername`,`passengerphone`,`unitno`,`streetnumber`,`streetname`,`suburb`,`destinationsuburb`,`pickupdate`,`pickuptime`,`bookingtime`,`status`) VALUES ('$bookingno','$email','$passengername','$phone',NULL,'$streetnumber','$streetname','$suburb','$destinationsuburb','$pickupdate','$pickuptime','$bookingtime','$status')";

	
 }
$result = mysql_query($sql);
if ($result) {
      echo "New record created successfully<br>";
    echo "Thank you! Your booking reference number is ".$bookingno.". We will pick up the  passengers in front of your provided address at ".$pickuptime." on ".$pickupdate.".";
        mail($to,$subject,$message,$header,"-r 102617305@student.swin.edu.au");
      sleep(2);
      //header("Location: login.php?msg1");
    
        
} else {
      echo "Error!";
}
 


?>