<!-- Mathew Dony Chittezhath - 102617305
   Page used to register new users -->
<html>
    <title>CabsOnline Registration</title>
    
<head>


  <script type="text/javascript">
  
        function checkInput()
        {
            var x1,x2,x3,x4,x5;
            x1 = document.getElementById("name").value;
            x2 = document.getElementById("password").value;
            x3 = document.getElementById("confpassword").value;
            x4 = document.getElementById("email").value;
            x5 = document.getElementById("phone").value;
            
            if ((x1 == "" ) || (x2 == "" ) || (x3 == "" ) || (x4 == "" ) || (x5 == "" ))
                { 
                    alert("All fields must be filled!");
                    return false;
                }
            
            else 
                {
                    if (x2!=x3)
                        {
                            alert("Passwords do not match!");    
                            return false;
                        }                    
                   
                }
      
          
        }
		
    </script>
    
</head>

    <body>
    <h1>Register to CabsOnline</h1> <br>
    <p1>Please fill the fields below to complete your registration :</p1><br><br><br>
        
        <form method="post" name="registerform" action="newuser.php">
		<table>
        <tr>
			 <td>Name    :  </td><td><input type=text name="name" id="name"> </input></td>
		</tr>
		<tr>
			<td>Password    :  </td><td><input type=password name="password" id="password"> </input> </td>
		</tr>
		<tr>
			<td>Confirm Password    :  </td><td><input type=password name="confpassword" id="confpassword"> </input></td>
		</tr>
		<tr>
			<td>E-mail    :  </td><td><input type=text name="email" id="email"> </input></td>
		</tr>
		<tr>
			<td>Phone   :  </td><td><input type=text name="phone" id="phone"> </input> </td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td><input type=submit value="Register" name="register" onClick="return checkInput()"></input></td>
		</tr>
<table>
        </form>
        
       <br> <l6>Already Registered? <a href="/cos80021/s102617305/assignment1/login.php">Login here</a></l6>  
        
        
    </body>

<?php

if(isset($_GET['msg']))
{
?>
<p><b> <?php echo "E-mail already in use!";?> </b></p>
<?php
}
?>







</html>