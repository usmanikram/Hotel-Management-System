<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM roomtype WHERE rtypeID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Room Type Deleted Successfully";
    header("Location: ../../../admin/roomtype.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/roomtype.php?message=$msg");
}

?>
