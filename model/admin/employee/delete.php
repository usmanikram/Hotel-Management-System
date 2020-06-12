<?php
require_once ("../../../config/config.php");

$id= $_GET['id'];


$sql = "DELETE FROM employee WHERE empID=$id";

if ($mysqli->query($sql) === TRUE) {

    $msg="Employee Deleted Successfully";
    header("Location: ../../../admin/employees.php?message=$msg");

} else {
    $msg="Error Deleting " . $mysqli->error;
    header("Location: ../../../admin/employees.php?message=$msg");
}

?>
