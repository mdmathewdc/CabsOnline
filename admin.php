<!-- Mathew Dony Chittezhath - 102617305
	Admin page to assign a cab to a request
-->
<html>
<title>CabsOnline Admin Page</title>

<body>
<h1>Admin page of CabsOnline</h1>
<h3>1. Click below button to search for all unassigned booking requests with a pick-up time within 3 hours.</h3>

<form action="admin.php" method="post">
<input type="submit" name="list" value="List all"></input>
</form>



<?php
include 'db_connection.php';
if(isset($_POST['list']))
{
	//echo "Button clicked";
	
	$conn = OpenCon();
    echo "<table border='1'><th>Reference #</th><th>Customer name</th><th>Passenger name</th><th>Passenger contact phone</th><th>Pickup address</th><th>Destination suburb</th><th>Pick-up time</th>";
	$sql1 = mysql_query("SELECT * FROM booking ")or die(mysql_error());

while($row = mysql_fetch_array($sql1))
{
    $referenceno = $row['bookingno'];
	$passengername = $row['passengername'];
	$passengeremail = $row['passengeremail'];
	
	
	//ADD CUSTOMER NAME
	$sql2 = mysql_query("SELECT * FROM customer");
	while($row2 = mysql_fetch_array($sql2))
	{
		
		$customeremail = $row2['email'];
		if(strcmp($customeremail,$passengeremail) == 0)
		{
			$customername = $row2['customer name'];
		}			
	}
	
	
	$passengerno = $row['passengerphone'];
	
	$unitno = $row['unitno'];
	$streetnumber = $row['streetnumber'];
	$streetname = $row['streetname'];
	$suburb = $row['suburb'];
	$status = $row['status'];
	
	if($unitno == "")
	{
		$combinedAddress = $streetnumber." ".$streetname.", ".$suburb;
	}
	else
	{
		$combinedAddress = $unitno."/".$streetnumber." ".$streetname.", ".$suburb;
	}

	$destinationsuburb = $row['destinationsuburb'];
	
    $pickupdate = $row['pickupdate'];
    $pickuptime = $row['pickuptime'];
	$combinedDate = $pickupdate." ".$pickuptime;
	
	//print "<br>$name";
	//print "<br>$pickupdate";
	//print "<br>$pickuptime";
	$combinedTime = $pickupdate." ".$pickuptime;
	//print "<br>$combinedTime";
	$d = strtotime($combinedTime);
	//print "<br>$d";
	$currentTime = time();
	//print "<br>THE CURRENT TIME IS : ".$currentTime;
	$timeDifference = $d - $currentTime;
	$minutes = floor(($timeDifference/60));
	//print "<br>TIME difference is   :  ".$minutes;
	//print "<br>$unitno";
	//print "<br>Customer name is :".$customername;
	
	if(($minutes >= 0) && ($minutes <= 180))
	{
		if($status == "Unassigned")
		{
			echo "<tr><td>".$referenceno."</td>";
			echo "<td>".$customername."</td>";
			echo "<td>".$passengername."</td>";
			echo "<td>".$passengerno."</td>";
			echo "<td>".$combinedAddress."</td>";
			echo "<td>".$destinationsuburb."</td>";
			echo "<td>".$combinedDate."</td></tr>";
		}
	  //echo "<h3>2. Input a reference number below and click \"update\" button to assign a taxi to that requests</h3>";
      //echo "<l1>Reference number: <input type=\"text\" name=\"referencenumber\"> </input> <input type=\"submit\" value=\"update\"> </input> </l1>";


		
	}



}

   //for($i=0;$i<count($bowlers);$i++) {
      //$curBowler = explode(",",$bowlers[$i]);
      //echo "<tr><td>".$curBowler[0]."</td>";
      //echo "<td>".$curBowler[1]."</td></tr>";
    //}
    echo "</table>";
	
	echo "<form action=\"admin.php\" method=\"post\">";
	echo "<h3>2. Input a reference number below and click \"update\" button to assign a taxi to that requests</h3>";
    echo "<l1>Reference number: <input type=\"text\" name=\"referencenumber\"> </input> <input type=\"submit\" name=\"update\" value=\"update\"> </input> </l1>";
	echo "</form>";
}

if(isset($_POST['update']))
{
	$conn = OpenCon();
	$refno = $_POST['referencenumber'];
	$sql = "SELECT * FROM booking WHERE bookingno = '$refno'";
	$result = mysql_query($sql);

		if (mysql_num_rows($result) > 0)
		{
			mysql_query("UPDATE booking SET status = 'Assigned' WHERE bookingno = '$refno'");
			echo "The booking request ".$refno." has been properly assigned";
			
		}
		else 
		{
			echo "The Reference number does not exist!";
		}

	
}


?>





</body>

</html>	