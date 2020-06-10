<?php
require_once "../../controller/department/add.php";
require_once "../../config/config.php";

$department = $_SESSION['dept'];

$param_id=$department->getdeptID();
$param_name = $department->getdeptName();
$param_details = $department->getdeptDetail();

$sql = "INSERT INTO department (deptID,deptName,deptDetails) VALUES (?,?,?)";


if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sss",$param_id,$param_name, $param_details);

    $param_id=$department->getdeptID();
    $param_name = $department->getdeptName();
    $param_details = $department->getdeptDetail();


    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Department Added Successfully";
        header("location: ../../admin/departments.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../admin/departments.php?message=$message");
    }


    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();

?>



