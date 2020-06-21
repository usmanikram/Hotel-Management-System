<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM feedback WHERE fbID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Feedback Deleted Successfully";
    header("Location: ../../../customer/feedback.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../customer/feedback.php?message=$msg");
}

?>
