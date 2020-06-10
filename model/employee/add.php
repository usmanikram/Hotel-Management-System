<?php
require_once "../../controller/employee/add.php";
require_once "../../config/config.php";

$employee= $_SESSION['employee'];




$sql = "INSERT INTO employee (empID,empName, empDOB, empGender, empCNIC,empAddress, empDOJ, 
empDesignation,empSalary,empContact, empEmail, empPassword,deptID, serviceID) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";



if($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("ssssssssssssss",$param_id, $param_name, $param_dob,
        $param_gender, $param_cnic ,$param_address,$param_doj,
        $param_designation,$param_salary,$param_contact,$param_email,$param_password,$param_department
        ,$param_service);

    $param_id=$employee->getempID();
    $param_name = $employee->getempName();
    $param_dob = $employee->getempDOB();
    $param_gender = $employee->getempGender();
    $param_cnic = $employee->getempCNIC();
    $param_address = $employee->getempAddress();
    $param_doj = $employee->getempDOJ();
    $param_designation = $employee->getempDesignation();
    $param_salary = $employee->getempSalary();
    $param_contact = $employee->getempContact();
    $param_email = $employee->getempEmail();
    $param_password = $employee->getempPassword();
    $param_department = $employee->geteserviceId();
    $param_service = $employee->geteserviceId();

    // Attempt to execute the prepared statement
    if($stmt->execute()){
        $message= "Employee Added Successfully";
        header("location: ../../admin/employees.php?message=$message");
        exit();
    } else{
        $message= "Something went wrong. Please try again later.";
        header("location: ../../admin/employees.php?message=$message");
    }



    // Close statement
    $stmt->close();
}
// Close connection
$mysqli->close();
?>



