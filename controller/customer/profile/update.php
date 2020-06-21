<?php
session_start();
require_once "../../../classes/customer.php";

$id=$name=$dob=$gender=$cnic=$contact=$address=
$email=$password=$ccno=$ccexpiry="";

if(isset($_POST['id']) &&isset($_POST['name']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['cnic'])
    && isset($_POST["contact"]) && isset($_POST['address'])  && isset($_POST["email"]) &&
    isset($_POST["password"]) && isset($_POST["ccno"]) && isset($_POST["ccexpiry"])) {
    $id=$_POST['id'];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ccno = $_POST["ccno"];
    $ccexpiry = $_POST["ccexpiry"];
}



$customer = new customer($id,$name,$dob,$gender,$cnic,$contact,$address,
    $email,$password,$ccno,$ccexpiry);




$_SESSION['customerupdate'] = $customer;




?>


