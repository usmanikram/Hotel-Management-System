<?php
require_once "../config/config.php";
require_once "../classes/room.php";

$id=$_GET["id"];


$sql= "Select * from room where roomID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $room = new room($row['roomID'],$row['roomDetails'],$row['roomType']
            ,$row['roomStatus'],$row['roomImage']);

    }
}

$_SESSION['roomview'] =$room;

?>