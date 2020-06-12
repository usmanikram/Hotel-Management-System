<?php
require_once "../config/config.php";
require_once "../classes/department.php";

$id=$_GET["id"];


$sql= "Select * from department where deptID=$id";
$result=$mysqli->query($sql);


if($result=$mysqli->query($sql)) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();


        $department = new department($row['deptID'],$row['deptName'],$row['deptDetails']);

    }
}

session_start();

$_SESSION['deptview'] =$department;

?>