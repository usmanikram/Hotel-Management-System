<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}
?>
<?php

require_once("../config/config.php");

$adminname = $adminemail = $adminpassword = "";

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))
{
    $adminname= $_POST['name'];
    $adminemail=$_POST['email'];
    $adminpassword=$_POST['password'];
    $hash_pwd = password_hash($adminpassword,PASSWORD_DEFAULT);

}
$sql = "INSERT INTO admin (adminName, adminEmail, adminPassword)
VALUES ('$adminname', '$adminemail', '$hash_pwd')";
if($mysqli->query($sql)) {
    $msg = "Admin Registeration Successful. Kindly Login Using Email and Password";
    header("location: setupfinish.php?message=$msg");
}

?>