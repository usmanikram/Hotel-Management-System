<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM reservation WHERE resID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Reservation Deleted Successfully";
    header("Location: ../../../customer/reservations.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../customer/reservations.php?message=$msg");
}

?>
