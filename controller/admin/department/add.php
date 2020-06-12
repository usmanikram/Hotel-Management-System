<?php
session_start();
require_once "../../../classes/department.php";

$name=$detail="";
if(isset($_POST['deptname']) && isset($_POST['deptdetails'])) {
    $name = $_POST['deptname'];
    $detail = $_POST['deptdetails'];
}

$department = new department(NULL, $name, $detail);

$_SESSION['dept'] = $department;


?>

<?php
