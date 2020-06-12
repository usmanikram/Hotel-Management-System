<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/customer/update.php";

$customer= $_SESSION['customerupdate'];

$id=$customer->getcustID();
$name = $customer->getcustName();
$dob = $customer->getcustDOB();
$gender = $customer->getcustGender();
$cnic = $customer->getcustCNIC();
$contact = $customer->getcustContact();
$address = $customer->getcustAddress();
$email = $customer->getcustEmail();
$password = password_hash($customer->getcustPassword(),PASSWORD_BCRYPT);
$ccno = $customer->getcustCCNO();
$ccexpiry = $customer->getcustCCExpiry();

$sql = "UPDATE customer SET custName='$name', custDOB='$dob', 
custGender='$gender', custCNIC='$cnic',custContact='$contact',
custAddress='$address',custEmail='$email', 
custPassword='$password',custCCNO='$ccno', 
custCCExpiry='$ccexpiry' where custID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Customer Data Updated Successfully";
    header("location: ../../../admin/customers.php?message=$msg");

} else {
    $msg="Error updating record: " . $mysqli->error;
    header("location: ../../../admin/customers.php?message=$msg");
}

?>