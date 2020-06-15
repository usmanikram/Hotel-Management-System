<?php
session_start();
require_once "../../../classes/bill.php";

$customerid=$reservationid=$details=$amount=$method=$remarks="";

if(isset($_POST['custid']) && isset($_POST['resID']) && isset($_POST['amount'])
    && isset($_POST['method'])&& isset($_POST['remarks']))
{
    $customerid=$_POST['custid'];
    $reservationid=$_POST['resID'];
    $amount=$_POST['amount'];
    $method=$_POST['method'];
    $remarks=$_POST['remarks'];

}

$bill = new bill(NULL,date("Y-m-d"),$customerid,$reservationid,$amount,$method
,$remarks);

$_SESSION['bill'] = $bill;

?>

