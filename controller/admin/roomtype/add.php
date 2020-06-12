<?php
session_start();
require_once "../../../classes/roomtype.php";

$name=$detail=$price=$capacity="";
if(isset($_POST['name']) && isset($_POST['details'])&& isset($_POST['price'])
    && isset($_POST['capacity'])) {
    $name = $_POST['name'];
    $detail = $_POST['details'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
}

$roomtype = new roomType(NULL, $name, $detail,$price,$capacity);

$_SESSION['rtype'] = $roomtype;


?>

<?php
