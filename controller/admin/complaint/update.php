<?php
session_start();
require_once "../../../classes/complaint.php";

$id = $date = $detail = $custid = $remarks = "";

if (isset($_POST['id']) && isset($_POST['custid']) && isset($_POST['date'])&& isset($_POST['detail'])
    && isset($_POST['remarks'])) {
    $id = $_POST['id'];
    $date = $_POST["date"];
    $detail = $_POST["detail"];
    $custid = $_POST['custid'];
    $remarks= $_POST['remarks'];

}


$complaint = new complaint($id, $date, $detail,$custid,$remarks);


$_SESSION['compupdate'] = $complaint;







