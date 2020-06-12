<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM room WHERE roomID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Room Deleted Successfully";
    header("Location: ../../../admin/room.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/room.php?message=$msg");
}

?>
