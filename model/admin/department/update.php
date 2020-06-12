<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/department/update.php";

$department= $_SESSION['departmentupdate'];

$id=$department->getdeptID();
$name = $department->getdeptName();
$details = $department->getdeptDetail();

$sql = "UPDATE department SET deptName='$name', deptDetails='$details'
 where deptID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Department Data Updated Successfully";
    header("location: ../../../admin/departments.php?message=$msg");

} else {
    $msg="Error updating record: " . $mysqli->error;
    header("location: ../../../admin/departments.php?message=$msg");
}

?>