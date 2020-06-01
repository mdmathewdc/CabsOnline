<!-- Mathew Dony Chittezhath - 102617305
   Page used to login for a user -->
<html>
<title>CabsOnline Login</title>

    <body>
        
            <h1>Login to CabsOnline</h1>
        <form method="post" action="validate.php">
    <table>
		<tr>
			<td>Email   :  </td> <td><input type=text name=email></input></td>
		</tr>
		<tr>
			<td>Password    :  </td> <td><input type=password name=password></input></td>
		</tr>
		<tr>
			<td><input type="submit" value="Log in"></input></td>
		</tr>
	</table>
			

        </form>
    
  <l3><b>New member?</b></l3>  <a href="/cos80021/s102617305/assignment1/register.php">Register now</a></l6>  
    
    
    
    </body>

<p><b>
<?php

  if(isset($_GET['msg1']))
    {
        $message = "<br><br>E-mail already in use!!";
        echo $message;
    }
    
  if(isset($_GET['msg2']))
    {
        $message = "<br><br>Wrong username or password!";
        echo $message;
    }
    
   if(isset($_GET['msg3']))
     {
         $message = "<br><br>User has logged out!";
         echo $message;
     }



?>
</b>
</p>


</html>