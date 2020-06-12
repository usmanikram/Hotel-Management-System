<?php
require_once "../../../controller/admin/service/add.php";
require_once "../../../config/config.php";

$service = $_SESSION['key'];

$param_id=$service->getserviceID();
$param_name = $service->getserviceName();
$param_details = $service->getserviceDetail();
$param_price = $service->getservicePrice();

$sql = "INSERT INTO service (serviceID,serviceName,serviceDetails,servicePrice) VALUES (?,?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssss",$param_id,$param_name, $param_details, $param_price);

    $param_id=$service->getserviceID();
    $param_name = $service->getserviceName();
    $param_details = $service->getserviceDetail();
    $param_price = $service->getservicePrice();

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Service Added Successfully";
        header("location: ../../../admin/services.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../admin/services.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



