<?php
session_start();
if(isset($_SESSION['customername']))
{
    session_destroy();
    $msg= "Logout Successful";
    header("Location: ../customerlogin.php?message=$msg");
}
else
{
    $msg= "Login First";
    header("Location: ../customerlogin.php?message=$msg");
}

?>