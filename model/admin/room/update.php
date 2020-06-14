<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/room/update.php";

$room= $_SESSION['roomupdate'];

$id=$room->getroomID();
$details = $room->getroomDetails();
$type = $room->getroomType();
$status = $room->getroomStatus();
$image = $room->getroomImage();

$sql = "UPDATE room SET roomDetails='$details', roomType='$type', roomStatus='$status',
roomImage='$image'
 where roomID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Room Updated Successfully";
    header("location: ../../../admin/room.php?message=$msg");

} else {
    $msg="Error Updating Room : " . $mysqli->error;
    header("location: ../../../admin/room.php?message=$msg");
}

?>