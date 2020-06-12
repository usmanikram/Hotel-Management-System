<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM customer WHERE custID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Customer Deleted Successfully";
    header("Location: ../../../admin/customers.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/customers.php?message=$msg");
}

?>
