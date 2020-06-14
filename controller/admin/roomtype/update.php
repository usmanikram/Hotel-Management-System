<?php

session_start();
require_once "../../../classes/roomtype.php";

$id = $name = $details =$price=$capacity= "";

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['details'])
    && isset($_POST['price'])&& isset($_POST['capacity'])) {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $details = $_POST["details"];
    $price= $_POST['price'];
    $capacity= $_POST['capacity'];
}


$roomtype = new roomType($id, $name, $details,$price,$capacity);


$_SESSION['roomtypeupdate'] = $roomtype;







