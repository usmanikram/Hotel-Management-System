<?php
require_once ("config/config.php");

$email = $password = "";
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
}

$sql = "select * from admin where adminEmail='$email' and adminPassword='$password'";
$result= $mysqli->query($sql);
$row = mysqli_num_rows($result);

if($row>0)
{
    header("Location: admin/index.php");
}

else
    {
        $msg= "Wrong Credentials";
        header("Location: employeelogin.php?message=$msg");
    }



