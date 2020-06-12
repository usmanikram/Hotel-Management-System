<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM service WHERE serviceID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Service Deleted Successfully";
    header("Location: ../../../admin/services.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/services.php?message=$msg");
}

?>
