<?php

session_start();
require_once "../../../classes/room.php";

$id = $details = $type =$status=$image= "";

if (isset($_POST['id']) && isset($_POST['details']) && isset($_POST['type'])
    && isset($_POST['status'])&& isset($_POST['image'])) {
    $id = $_POST['id'];
    $details = $_POST["details"];
    $type = $_POST["type"];
    $status= $_POST['status'];
    $image= $_POST['image'];
}


$room = new room($id, $details, $type,$status,$image);


$_SESSION['roomupdate'] = $room;







