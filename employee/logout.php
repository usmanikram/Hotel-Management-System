<?php
session_start();
if(isset($_SESSION['employeename']))
{
    session_destroy();
    $msg= "Logout Successful";
    header("Location: ../employeelogin.php?message=$msg");
}
else
{
    $msg= "Login First";
    header("Location: ../employeelogin.php?message=$msg");
}

?>