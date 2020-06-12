<?php
require_once "../../../controller/admin/customer/add.php";
require_once "../../../config/config.php";

$customer= $_SESSION['customer'];




$sql = "INSERT INTO customer (custID,custName, custDOB, custGender, custCNIC,custContact,
custAddress,custEmail, custPassword,custCCNO, custCCExpiry) VALUES (?,?,?,?,?,?,?,?,?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssssssssss",$param_id, $param_name, $param_dob,
        $param_gender, $param_cnic ,$param_contact,$param_address,$param_email,$param_password,$param_ccno
        ,$param_ccexpiry);

    $param_id=$customer->getcustID();
    $param_name = $customer->getcustName();
    $param_dob = $customer->getcustDOB();
    $param_gender = $customer->getcustGender();
    $param_cnic = $customer->getcustCNIC();
    $param_contact = $customer->getcustContact();
    $param_address = $customer->getcustAddress();
    $param_email = $customer->getcustEmail();
    $param_password = password_hash($customer->getcustPassword(),PASSWORD_BCRYPT);
    $param_ccno = $customer->getcustCCNO();
    $param_ccexpiry = $customer->getcustCCExpiry();

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Customer Added Successfully";
        header("location: ../../../admin/customers.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../admin/customers.php?message=$message");
    }



    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();
?>



