<?php
session_start();
require_once "../../../classes/service.php";

$name=$detail=$price="";
if(isset($_POST['sname']) && isset($_POST['sdetails']) && isset($_POST['sprice'])) {
$name = $_POST['sname'];
$detail = $_POST['sdetails'];
$price = $_POST['sprice'];
}

$service = new service(NULL, $name, $detail, $price);

$_SESSION['key'] = $service;


?>

