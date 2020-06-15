<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM bill WHERE billID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Bill Deleted Successfully";
    header("Location: ../../../admin/bills.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/bills.php?message=$msg");
}

?>
