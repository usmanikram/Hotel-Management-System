<?php
session_start();
require_once "../../../classes/room.php";

$detail=$type=$status=$image="";
if(isset($_POST['details']) && isset($_POST['type'])&& isset($_POST['status'])
    && isset($_POST['image'])) {
    $detail = $_POST['details'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $image = $_POST['image'];
}


$room= new room(NULL,$detail,$type,$status,$image);

$_SESSION['room'] = $room;


?>

