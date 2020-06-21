<?php
session_start();
require_once ("config/config.php");
$email = $password = "";
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$sql = "select * from employee where empEmail='$email'";
$result = $mysqli->query($sql);
$row = $result->num_rows;

if ($row == 1) {
    $arr = $result->fetch_array();

    if (password_verify($password, $arr['empPassword'])) {

        $_SESSION['employeename'] = $arr['empName'];
        $_SESSION['employeedesignation']=$arr['empDesignation'];

        header("Location: employee/index.php");
    } else {
        $msg = "Incorrect Password";
        header("Location: employeelogin.php?message=$msg");
    }
} else {
    $msg = "Wrong Credentials";
    header("Location: employeelogin.php?message=$msg");
}
?>



