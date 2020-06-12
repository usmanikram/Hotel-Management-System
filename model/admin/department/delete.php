<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM department WHERE deptID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Department Deleted Successfully";
    header("Location: ../../../admin/departments.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/departments.php?message=$msg");
}

?>
