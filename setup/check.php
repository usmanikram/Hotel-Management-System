<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:../error.php');
    exit;
}

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
adminEmail varchar(50) Primary Key,
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
serviceName varchar(20),
serviceDetails varchar(200),
servicePrice varchar(15)
)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = "INSERT INTO `service`
(`serviceID`, `serviceName`, `serviceDetails`, `servicePrice`) VALUES 
(NULL,'Swimming','For 1 Day',1000),
(NULL,'Gym','For 1 Day',1000),
(NULL,'Breakfast','For 1 Day',500),
(NULL,'Lunch','For 1 Day',1000),
(NULL,'Dinner','For 1 Day',1500),
(NULL,'Laundry','Per Shirt',300),
(NULL,'Room Cleaning','1 time',1000)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }



    $sql = "Create Table department 
(
deptID int AUTO_INCREMENT Primary Key,
deptName varchar(50),
deptDetails varchar(200)
)";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = "INSERT INTO `department`
(`deptID`, `deptName`, `deptDetails`) 
VALUES 
(NULL,'Front Office','This department performs various functions like reservation, reception, registration, room assignment, and settlement of bills etc.'),
(NULL,'Housekeeping','The housekeeping department is responsible for the cleanliness, maintenance, and aesthetic upkeep of rooms, public areas, back areas etc.'),
(NULL,'Kitchen','All the food and beverages that are served to the hotel guest is prepared in the kitchen etc.'),
(NULL,'Engineering and Maintenance','The engineering department is responsible for repairing and maintaining the plant and machinery, water treatment and distribution, boilers and water heating etc.'),
(NULL,'Security','he security department of a hotel is responsible for the overall security etc.'),
(NULL,'HR','Human Resource department is responsible for the acquisition, utilisation, training, and development of the human resources of the hotel etc.'),
(NULL,'Marketing','The major role of the marketing department is to bring in business')";

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
empAddress varchar(100),
empDOJ date,
empDesignation varchar(30),
empSalary varchar(10),
empContact varchar(11),
empEmail varchar(30),
empPassword varchar(100),
deptID int
)";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = "INSERT INTO `employee`
(`empID`, `empName`, `empDOB`, `empGender`, `empCNIC`, `empAddress`, `empDOJ`, `empDesignation`, `empSalary`, `empContact`, `empEmail`, `empPassword`, `deptID`) 
VALUES 
(NULL,'Kamran Ali','1985-04-07','Male','352021553367','Askari 1, Lahore','2020-04-07','Security Incharge','60000','03210000000','kamaran@gmail.com','kamaran123','5'),
(NULL,'Kashif Yunus','1990-06-06','Male','352021444647','Samnabad,Lahore','2020-04-07','Chef','30000','03000000000','kashif@gmail.com','kashif123','3'),
(NULL,'Gohar Ali','1995-07-05','Male','352552345467','Wapda Town,Lahore','2020-04-07','HR Manager','40000','03220000000','gohar@gmail.com','gohar123','6'),
(NULL,'Hafeez Sheikh','1991-08-04','Male','354421234567','Sui Gas Society,Lahore','2020-04-07','Receptionist','25000','03240000000','hafeez@gmal.com','hafeez123','1'),
(NULL,'Zain Aslam','1996-09-03','Male','353331234567','Ichra, Lahore','2020-04-07','Housekeeper','20000','03090000000','zain@gmail.com','zain123','2'),
(NULL,'Umair Ali','2000-10-02','Male','352221234567','Mulism Town,Lahore','2020-04-07','Plumber','20000','03450000000','umair@gmail.com','umair123','4'),
(NULL,'Arslan Butt','1985-01-01','Male','351111234567','Township,Lahore','2020-04-07','Marketing Manager','30000','03110000000','arslan@gmail.com','arslan123','7')
";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }



    $sql = " 
    Create Table customer 
    (
    custID int AUTO_INCREMENT Primary Key, 
    custName varchar(30), 
    custDOB date, 
    custGender varchar(10), 
    custCNIC varchar(13), 
    custContact varchar(11), 
    custAddress varchar(100), 
    custEmail varchar(20), 
    custPassword varchar(100), 
    custCCNO varchar(20), 
    custCCExpiry date 
    ) ";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = " 
   INSERT INTO `customer`
(`custID`, `custName`, `custDOB`, `custGender`, `custCNIC`, `custContact`, `custAddress`, `custEmail`, `custPassword`, `custCCNO`, `custCCExpiry`) 
VALUES 
(NULL,'Bilal Ahmad','1990-04-03','Male','3520212345678','03001234567','Wapda Town,Lahore','bilalahmad@gmail.com','bilal123','4844336390778660','2030-01-01'),
(NULL,'Ali Malik Ahmad','1985-01-05','Male','3500012345678','03011234567','DHA Phase 1,Lahore','alimalik@gmail.com','ali123','201924882802356','2030-09-09'),
(NULL,'Maura Wotton','1980-04-03','Female','1234567890','0300000007','DHA Phase 5,Lahore','mwotton3@rambler.ru','abcdef','3530489512401470','2030-09-05'),
(NULL,'Hafeez Ahmad','1995-04-03','Male','3520512345678','03431234567','DHA Phase 3,Lahore','hafeez@gmail.com','hafeez123','3534244118209447','2030-09-01'),
(NULL,'Javier Cowsby','2000-04-03','Male','3200012345678','03211234567','','jcowsby5@altervista.org','xyz123','3558219277254310','2030-09-10')
";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = " 
    Create Table roomtype (
    rtypeID int AUTO_INCREMENT Primary Key,
    rtypeName varchar(15),
    rtypeDetails varchar(200),
    rtypePrice varchar(10),
    rtypeCapacity int
    )";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = "INSERT INTO `roomtype`
(`rtypeID`, `rtypeName`, `rtypeDetails`, `rtypePrice`, `rtypeCapacity`) 
VALUES 
(NULL,'Single','Basic room for 1 Person','1000','1'),
(NULL,'Double','Basic room for 2 Persons','1500','2'),
(NULL,'Queen','Luxery room with a queen-sized bed for 2 Persons','3500','2'),
(NULL,'King','Luxery room with a king-sized bed for 2 Persons','3500','2'),
(NULL,'Twin','A room with two beds.','500','4'),
(NULL,'Double-Double','A room with two double king-sized beds','7000','4'),
(NULL,'Master Suite',' A parlour or living room connected to one or more bedrooms.','10000','4')
";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = "
    CREATE TABLE status (
    id int AUTO_INCREMENT Primary Key,
    name varchar(15)
    )";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = "
    INSERT INTO `status`(`id`, `name`) 
VALUES 
(NULL,'Active'),
(NULL,'Not Active')";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = " 
    Create Table room (
    roomID int AUTO_INCREMENT Primary Key,
    roomDetails varchar(200),
    roomType int,
    roomStatus varchar(15),
    roomImage varchar(100)
    )";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = " 
   INSERT INTO `room`
(`roomID`, `roomDetails`, `roomType`, `roomStatus`, `roomImage`) 
VALUES 
(NULL,'Basic room for 1 Person',1,1,'single.png'),
(NULL,'Basic room for 2 Persons',2,1,'double.jpg'),
(NULL,'Luxery room with a queen-sized bed for 2 Persons',3,1,'queen.jpg'),
(NULL,'Luxery room with a king-sized bed for 2 Persons',4,1,'king.jpg'),
(NULL,'A room with two beds.',5,1,'twin.jpg'),
(NULL,'A room with two double king-sized beds',6,1,'double-double.jpg'),
(NULL,' A parlour or living room connected to one or more bedrooms',7,1,'master.jpg'),
(NULL,'Basic room for 1 Person',1,2,'single.png'),
(NULL,' A parlour or living room connected to one or more bedrooms',7,2,'master.jpg')
";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = " 
    Create Table reservation (
    resID int AUTO_INCREMENT Primary Key,
    custID int,
    roomID int,
    resStartDate Date,
    resEndDate Date
)";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $sql = " 
   INSERT INTO `reservation`
(`resID`, `custID`, `roomID`, `resStartDate`, `resEndDate`)
VALUES 
(NULL,'2','3','2020-06-15','2020-06-18'),
(NULL,'1','1','2020-07-13','2020-07-18'),
(NULL,'3','2','2020-06-11','2020-06-20'),
(NULL,'4','5','2020-06-12','2020-06-29'),
(NULL,'5','4','2020-06-14','2020-06-15'),
(NULL,'10','7','2020-06-20','2020-06-21'),
(NULL,'7','6','2020-06-30','2020-07-15')
";


    if ($mysqli->query($sql) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = "Create Table bill 
(
billID int AUTO_INCREMENT Primary Key,
billDate date,
custID int,
resID int,
amount varchar(10),
paymentmethod varchar(15),
remarks varchar(150)
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