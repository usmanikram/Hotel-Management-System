<?php
require_once "../../../controller/admin/bill/add.php";
require_once "../../../config/config.php";

$bill = $_SESSION['bill'];



$sql = "INSERT INTO bill (billID,billDate,custID,resID,amount,paymentMethod,remarks) 
VALUES (?,?,?,?,?,?,?)";

if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssssss",$param_id,$param_date, $param_custid,
        $param_resid,$param_amount,$param_method,$param_remarks);

    $param_id=$bill->getbillID();
    $param_date = $bill->getbillDate();
    $param_custid = $bill->getcustID();
    $param_resid = $bill->getresID();
    $param_amount = $bill->getbillAmount();
    $param_method = $bill->getbillMethod();
    $param_remarks = $bill->getbillRemarks();



    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Bill Added Successfully";
        header("location: ../../../admin/bills.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../../admin/bills.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



