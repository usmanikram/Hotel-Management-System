<?php

session_start();
require_once "../../../classes/department.php";

$id = $name = $details = "";

if (isset($_POST['deptid']) && isset($_POST['deptname']) && isset($_POST['deptdetails'])) {
    $id = $_POST['deptid'];
    $name = $_POST["deptname"];
    $details = $_POST["deptdetails"];
}


$department = new department($id, $name, $details);


$_SESSION['departmentupdate'] = $department;







