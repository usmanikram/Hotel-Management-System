<?php
session_start();
require_once ("config/config.php");
$email = $password = "";
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$sql = "select * from customer where custEmail='$email'";
$result = $mysqli->query($sql);
$row = $result->num_rows;
if ($row == 1) {
    $arr = $result->fetch_array();

    if (password_verify($password, $arr['custPassword'])) {

        $_SESSION['customername'] = $arr['custName'];

        header("Location: customer/index.php");
    } else {
        $msg = "Incorrect Password";
        header("Location: customerlogin.php?message=$msg");
    }
} else {
    $msg = "Wrong Credentials";
    header("Location: customerlogin.php?message=$msg");
}
?>


