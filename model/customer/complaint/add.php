<?php
require_once "../../../controller/customer/complaint/add.php";
require_once "../../../config/config.php";

$complaint = $_SESSION['complaint'];


$sql = "INSERT INTO complaint (compID,compDate,compDetail,custID,remarks) VALUES (?,?,?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssss",$param_id,$param_date, $param_details,$param_custid,
    $param_remarks);

    $param_id=$complaint->getcompID();
    $param_date = $complaint->getcompDate();
    $param_details = $complaint->getcompDetail();
    $param_custid = $complaint->getcustID();
    $param_remarks = $complaint->getremarks();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Complaint Added Successfully";
        header("location: ../../../customer/complaints.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../customer/complaints.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



