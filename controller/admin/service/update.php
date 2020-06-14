<?php

session_start();
require_once "../../../classes/service.php";

$id = $name = $details =$price= "";

if (isset($_POST['sid']) && isset($_POST['sname']) && isset($_POST['sdetails'])
 && isset($_POST['sprice'])) {
    $id = $_POST['sid'];
    $name = $_POST["sname"];
    $details = $_POST["sdetails"];
    $price= $_POST['sprice'];
}


$service = new service($id, $name, $details,$price);


$_SESSION['serviceupdate'] = $service;







