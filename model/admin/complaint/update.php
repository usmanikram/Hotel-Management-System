<?php
require_once "../../../config/config.php";
require_once "../../../controller/admin/complaint/update.php";

$complaint= $_SESSION['compupdate'];

$id=$complaint->getcompID();
$remarks=$complaint->getremarks();

$sql = "UPDATE complaint SET remarks='$remarks'
 where compID='$id'";



if ($mysqli->query($sql) === TRUE) {
    $msg="Complaint Updated Successfully";
    header("location: ../../../admin/complaints.php?message=$msg");

} else {
    $msg="Error updating record: " . $mysqli->error;
    header("location: ../../../admin/complaints.php?message=$msg");
}

?>