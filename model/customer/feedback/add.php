<?php
require_once "../../../controller/customer/feedback/add.php";
require_once "../../../config/config.php";

$feedback = $_SESSION['feedback'];


$sql = "INSERT INTO feedback (fbID,fbDate,fbDetail,rating,custID) VALUES (?,?,?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssss",$param_id,$param_date, $param_details,
        $param_rating,$param_custid);

    $param_id=$feedback->getfbID();
    $param_date = $feedback->getfbDate();
    $param_details = $feedback->getfbDetail();
    $param_rating = $feedback->getrating();
    $param_custid = $feedback->getcustID();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Feedback Added Successfully";
        header("location: ../../../customer/feedback.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../customer/feedback.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



