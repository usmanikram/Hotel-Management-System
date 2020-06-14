<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/service/update.php";

$service= $_SESSION['serviceupdate'];

$id=$service->getserviceID();
$name = $service->getserviceName();
$details = $service->getserviceDetail();
$price = $service->getservicePrice();

$sql = "UPDATE service SET serviceName='$name', serviceDetails='$details', servicePrice='$price'
 where serviceID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Service Updated Successfully";
    header("location: ../../../admin/services.php?message=$msg");

} else {
    $msg="Error Updating Service: " . $mysqli->error;
    header("location: ../../../admin/services.php?message=$msg");
}

?>