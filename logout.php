<?php
/* Mathew Dony Chittezhath - 102617305
   Page used to logout a user
*/
session_start();
unset($_SESSION['user']);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: login.php?msg3");


?>