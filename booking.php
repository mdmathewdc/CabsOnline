<html>
<!-- Mathew Dony Chittezhath - 102617305
   Page used to enter new booking information
-->
    <title>CabsOnline Booking</title>
    
    <head>
    
        <script type = text/javascript>
            
            function checkInput()
            {
                var x1,x2,x3,x4,x5,x6,x7,x8,x9;
                x1=document.getElementById("pname").value;
                x2=document.getElementById("phone").value;
                x3=document.getElementById("unitnumber").value;
                x4=document.getElementById("streetnumber").value;
                x5=document.getElementById("streetname").value;
                x6=document.getElementById("suburb").value;
                x7=document.getElementById("destinationsuburb").value;
                x8=document.getElementById("pickupdate").value;
                x9=document.getElementById("pickuptime").value;
                
                if((x1 == "") || (x2 == "") || (x4 == "") || (x5 == "") || (x6 == "") || (x7 == "") || (x8 == "") || (x9 == ""))
                    {
                        //document.getElementById("test1").innerHTML= x8;
                        //document.getElementById("test2").innerHTML= x9;
                        alert("All fields must be filled!")
                        return false;
                    }
                else
                    {
                        var d1 = x8+"  "+x9;
                        var pickupDate = Date.parse(d1);
                        var d2 = new Date();
                        var currentDate = d2.getTime();
                        
                        var timeDifference = (pickupDate - currentDate) / 60000;    //Difference in minutes
              
                        if(timeDifference < 40)
                            {
                                alert("The pickup time must be atleast 40 minutes after the current time!")
                                return false;
                            }

                        
                    }
                
            }
            
            
        </script>
    
    
    </head>
    
    <body>
<?php

session_start();


if (isset($_SESSION['user'])) 
    {
       // echo "Reached booking page! User has logged in!!";
?>
        <h1>Booking a cab</h1> 
    <p>Please fill the fields below to book a taxi</p><br><br>
        
<form method="post" action="newbooking.php">

<table>
		<tr>
			<td>Passenger name :    </td> <td><input type = "text" name="passengername" id="pname"></input></td>
		</tr>
		<tr>
			<td>Contact phone of the passenger :    </td> <td><input type = "text" name="phone" id="phone"></input></td>
		</tr>
		<tr>
			<td><b>Pick up address : </b></td>
		</tr>
		<tr>
			<td>Unit number </td> <td><input type="text" name="unitnumber" id="unitnumber"></input></td>
		</tr>
		<tr>
            <td>Street number </td> <td><input type="text" name="streetnumber" id="streetnumber"></input></td>
		</tr>
		<tr>
            <td>Street name  </td> <td><input type="text" name="streetname" id="streetname"></input></td>
		</tr>
		<tr>
            <td>Suburb </td> <td><input type="text" name="suburb" id="suburb"></input></td>
        </tr>
		<tr>
			<td>Destination suburb :    </td> <td><input type="text" name="destinationsuburb" id="destinationsuburb"></input></td>
		</tr>
		<tr>
			<td>Pickup date :   </td> <td><input type="date" name="pickupdate" id="pickupdate"></input></td>
		</tr>
		<tr>
			<td>Pickup time :   </td> <td><input type="time" name="pickuptime" id="pickuptime"></input></td>
		</tr>
		<tr>
			<td><input type="submit" value="Book" name="submit" onClick = "return checkInput()" ></input></td>
		</tr>
</table>

</form>

<!-- <p id=test1>Hello1! </p><br> -->
<!-- <p id=test2>Hello2! </p> -->
        
<?php    
    } 
else 
    {
        echo "User has not logged in!";
   
    }



?>
    
	<br><br><br>
	<a href="logout.php"><button>LOG OUT</button></a>    
  </body>  
    
    </html>