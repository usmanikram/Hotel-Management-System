<?php
require_once "../../../controller/customer/reservation/add.php";
require_once "../../../config/config.php";

$reservation = $_SESSION['reservation'];



$sql = "INSERT INTO reservation (resID,custID,roomID,resStartDate,resEndDate) 
VALUES (?,?,?,?,?)";

if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssss",$param_id,$param_customerid, $param_roomid,
        $param_startdate,$param_enddate);

    $param_id=$reservation->getresID();
    $param_customerid = $reservation->getcustomerID();
    $param_roomid = $reservation->getroomID();
    $param_startdate = $reservation->getresStartDate();
    $param_enddate = $reservation->getresEndDate();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Reservation Added Successfully";
        header("location: ../../../customer/reservations.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../customer/reservations.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



