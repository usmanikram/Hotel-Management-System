<?php
require_once "../config/config.php";
require_once "../classes/employee.php";

$id=$_GET["id"];


$sql= "Select * from employee where empID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $employee = new employee($row['empID'],$row['empName'],$row['empDOB'],$row['empGender'],$row['empCNIC'],$row['empAddress'],
            $row['empDOJ'],$row['empDesignation'],$row['empSalary'],$row['empContact'],
            $row['empEmail'],$row['empPassword'],$row['deptID']);

    }
}

$_SESSION['employeeview'] =$employee;

?>