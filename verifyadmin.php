<?php
session_start();
require_once ("config/config.php");
$email = $password = "";
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
}

$sql = "select * from admin where adminEmail='$email'";
$result = $mysqli->query($sql);
$row = $result->num_rows;

if ($row == 1) {
    $arr = $result->fetch_array();

    if (password_verify($password, $arr['adminPassword'])) {

        $_SESSION['name'] = $arr['adminName'];

        header("Location: admin/index.php");
    } else {
        $msg = "Incorrect Password";
        header("Location: adminlogin.php?message=$msg");
    }
} else {
    $msg = "Wrong Credentials";
    header("Location: adminlogin.php?message=$msg");
}



