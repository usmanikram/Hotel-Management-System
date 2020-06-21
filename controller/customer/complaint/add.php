<?php
session_start();
require_once "../../../classes/complaint.php";
$custid=$_SESSION['customerid'];
$date=$detail="";

if(isset($_POST['date']) && isset($_POST['detail']))
{
    $date=$_POST['date'];
    $detail=$_POST['detail'];
}

$complaint = new complaint(NULL,$date,$detail,$custid,'Not Yet Assigned');

$_SESSION['complaint']=$complaint;
?>
