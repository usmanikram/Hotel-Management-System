<?php
require_once "../../../classes/employee.php";

$id=$name=$dob=$gender=$cnic=$address=$doj=$designation=$salary=$contact=
$email=$password=$departmentid=$serviceid="";

if(isset($_POST['id'])&&isset($_POST['name']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['cnic'])
    && isset($_POST['address']) && isset($_POST['doj']) && isset($_POST["designation"]) &&
    isset($_POST["salary"]) && isset($_POST["contact"]) && isset($_POST["email"]) &&
    isset($_POST["password"]) && isset($_POST["department"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $cnic = $_POST["cnic"];
    $address = $_POST["address"];
    $doj = $_POST["doj"];
    $designation = $_POST["designation"];
    $salary = $_POST["salary"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $departmentid = $_POST['department'];
}


$employee = new employee($id,$name,$dob,$gender,$cnic,$address,$doj,$designation
    ,$salary,$contact,$email,$password,$departmentid);

session_start();


$_SESSION['employeeupdate'] = $employee;




?>


