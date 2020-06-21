<?php
session_start();
require_once "../../../classes/feedback.php";
$custid=$_SESSION['customerid'];
$date=$detail=$rating="";

if(isset($_POST['date']) && isset($_POST['detail']) && isset($_POST['rating']))
{
    $date=$_POST['date'];
    $detail=$_POST['detail'];
    $rating=$_POST['rating'];
}

$feedback = new feedback(NULL,$date,$detail,$rating,$custid);

$_SESSION['feedback']=$feedback;
?>
