<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM complaint WHERE compID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Complaint Deleted Successfully";
    header("Location: ../../../customer/complaints.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../customer/complaints.php?message=$msg");
}

?>
