<?php
require_once "../config/config.php";
require_once "../classes/service.php";

$id=$_GET["id"];


$sql= "Select * from service where serviceID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $service = new service($row['serviceID'],$row['serviceName'],$row['serviceDetails']
            ,$row['servicePrice']);

    }
}

session_start();

$_SESSION['serviceview'] =$service;

?>