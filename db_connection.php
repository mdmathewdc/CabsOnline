<?php
/* Mathew Dony Chittezhath - 102617305
   Used to establish database connection
*/
function OpenCon()
 {
 $database = "s102617305_db";
 $username = "s102617305";
 $password = "010895";
 $db = "feenix-mariadb.swin.edu.au";



      $conn = mysql_pconnect('feenix-mariadb.swin.edu.au', $username, $password)
       or die('Could not connect: ' . mysql_error());
      mysql_select_db($database) or die('Could not select database');

       
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }

   
?>