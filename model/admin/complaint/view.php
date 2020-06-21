<?php
session_start();
require_once "../config/config.php";
require_once "../classes/complaint.php";

$id=$_GET["id"];


$sql= "Select * from complaint where compID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $complaint = new complaint($row['compID'],$row['compDate'],$row['compDetail'],
            $row['custID'],$row['remarks']);

    }
}



$_SESSION['compview'] =$complaint;

?>