<?php
session_start();
if(isset($_SESSION['name']))
{
session_destroy();
    $msg= "Logout Successful";
    header("Location: ../adminlogin.php?message=$msg");
}
else
    {
        $msg= "Login First";
        header("Location: ../adminlogin.php?message=$msg");
    }
?>