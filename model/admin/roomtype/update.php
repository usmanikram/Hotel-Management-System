<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/roomtype/update.php";

$roomtype= $_SESSION['roomtypeupdate'];

$id=$roomtype->getrtypeID();
$name = $roomtype->getrtypeName();
$details = $roomtype->getrtypeDetails();
$price = $roomtype->getrtypePrice();
$capacity = $roomtype->getrtypeCapacity();

$sql = "UPDATE roomtype SET rtypeName='$name', rtypeDetails='$details', rtypePrice='$price',
rtypeCapacity='$capacity'
 where rtypeID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Room Type Updated Successfully";
    header("location: ../../../admin/roomtype.php?message=$msg");

} else {
    $msg="Error Updating Room Type: " . $mysqli->error;
    header("location: ../../../admin/roomtype.php?message=$msg");
}

?>