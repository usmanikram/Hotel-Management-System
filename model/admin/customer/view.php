<?php
require_once "../config/config.php";
require_once "../classes/customer.php";

$id=$_GET["id"];


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

session_start();

$_SESSION['custview'] =$customer;

?>