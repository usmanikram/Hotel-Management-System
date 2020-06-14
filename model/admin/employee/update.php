<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/employee/update.php";

$employee= $_SESSION['employeeupdate'];

$id=$employee->getempID();
$name = $employee->getempName();
$dob = $employee->getempDOB();
$gender = $employee->getempGender();
$cnic = $employee->getempCNIC();
$address = $employee->getempAddress();
$doj = $employee->getempDOJ();
$designation = $employee->getempDesignation();
$salary = $employee->getempSalary();
$contact = $employee->getempContact();
$email = $employee->getempEmail();
$password = password_hash($employee->getempPassword(),PASSWORD_BCRYPT);
$dept = $employee->getedepartmentId();


$sql = "UPDATE employee SET empName='$name', empDOB='$dob', 
empGender='$gender', empCNIC='$cnic',empAddress='$address',empDOJ='$doj',
empDesignation='$designation',empSalary='$salary',empContact='$contact',empEmail='$email', 
empPassword='$password',deptID='$dept' where empID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Employee Updated Successfully";
    header("location: ../../../admin/employees.php?message=$msg");

} else {
    $msg="Error updating employee: " . $mysqli->error;
    header("location: ../../../admin/employees.php?message=$msg");
}

?>