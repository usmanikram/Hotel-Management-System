<?php
require_once "../config/config.php";
require_once "../classes/roomtype.php";

$id=$_GET["id"];


$sql= "Select * from roomtype where rtypeID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $roomtype = new roomType($row['rtypeID'],$row['rtypeName'],$row['rtypeDetails']
            ,$row['rtypePrice'],$row['rtypeCapacity']);

    }
}

session_start();

$_SESSION['roomtypeview'] =$roomtype;

?>