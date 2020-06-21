<?php
session_start();
require_once "../config/config.php";
require_once "../classes/customer.php";

$id=$_SESSION['customerid'];


$sql= "Select * from customer where custID=$id";
$result=$mysqli->query($sql);

if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $customer = new customer($row['custID'],$row['custName'],$row['custDOB'],$row['custGender'],$row['custCNIC'],$row['custContact'],
            $row['custAddress'],
            $row['custEmail'],$row['custPassword'],$row['custCCNO'],$row['custCCExpiry']);

    }
}


$_SESSION['custview'] =$customer;

?>