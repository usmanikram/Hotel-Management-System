<?php
require_once "../../../controller/admin/room/add.php";
require_once "../../../config/config.php";

$room = $_SESSION['room'];

$sql = "INSERT INTO room (roomID,roomDetails,roomType,roomStatus,roomImage) 
VALUES (?,?,?,?,?)";

if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssss",$param_id,$param_details, $param_type,
        $param_status,$param_image);

    $param_id=$room->getroomID();
    $param_details = $room->getroomDetails();
    $param_type = $room->getroomType();
    $param_status = $room->getroomStatus();
    $param_image = $room->getroomImage();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Room Added Successfully";
        header("location: ../../../admin/room.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../admin/room.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



