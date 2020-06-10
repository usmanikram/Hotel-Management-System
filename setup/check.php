<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../error.php');
    exit;
}
?>
<?php

$dbhostname = $dbusername = $dbpassword = $dbname = "";

if(isset($_POST['hostname']) && isset($_POST['username']) && isset($_POST['password'])
&& isset($_POST['name']))
{
    $dbhostname= $_POST['hostname'];
    $dbusername=$_POST['username'];
    $dbpassword=$_POST['password'];
    $dbname=$_POST['name'];

}

define('DB_SERVER', $dbhostname);
define('DB_USERNAME', $dbusername);
define('DB_PASSWORD', $dbpassword);
define('DB_NAME', $dbname);
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_error) {
    $message=$mysqli->connect_error;
    header("location: index.php?message=$message");
}
else {

    $configfile = fopen("../config/config.php", "x+");


    $txt = "<?php
    define('DB_SERVER', '$dbhostname');
    define('DB_USERNAME', '$dbusername');
    define('DB_PASSWORD', '$dbpassword');
    define('DB_NAME','$dbname'); 
    "."$"."mysqli"."= new "."mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME)".";".
        "if("."$"."mysqli === false"."){".
        "die("."'ERROR: Could not connect.'"." . $"."mysqli->connect_error);".
        "}"."
    ?>";

    fwrite($configfile, $txt);
    fclose($configfile);

    $sql = "Create Table admin 
(
adminName varchar(20),
adminEmail varchar(50),
adminPassword varchar(100)
)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }
    $sql = "Create Table service 
(
serviceID int AUTO_INCREMENT Primary Key,
serviceName varchar(15),
serviceDetails varchar(50),
servicePrice varchar(15)
)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = "Create Table department 
(
deptID int AUTO_INCREMENT Primary Key,
deptName varchar(15),
deptDetails varchar(50)
)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = " Create Table employee
    (
empID int AUTO_INCREMENT Primary Key,
empName varchar(30),
empDOB date,
empGender varchar(10),
empCNIC varchar(13),
empAddress varchar(30),
empDOJ date,
empDesignation varchar(15),
empSalary varchar(10),
empContact varchar(11),
empEmail varchar(20),
empPassword varchar(20),
deptID int,
serviceID int
)";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $msg= "Database Connection Successful.Tables Created.";
    header("Location: setup2.php?message=$msg");




}
?>