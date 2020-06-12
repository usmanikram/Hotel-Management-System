<?php
require_once "../../../controller/admin/roomtype/add.php";
require_once "../../../config/config.php";

$roomtype = $_SESSION['rtype'];



$sql = "INSERT INTO roomtype (rtypeID,rtypeName,rtypeDetails,rtypePrice,rtypeCapacity) 
VALUES (?,?,?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssss",$param_id,$param_name, $param_details,
    $param_price,$param_capacity);

    $param_id=$roomtype->getrtypeID();
    $param_name = $roomtype->getrtypeName();
    $param_details = $roomtype->getrtypeDetails();
    $param_price = $roomtype->getrtypePrice();
    $param_capacity = $roomtype->getrtypeCapacity();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Room Type Added Successfully";
        header("location: ../../../admin/roomtype.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../admin/roomtype.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



