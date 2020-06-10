<?php

class department
{
//Data Members
    private $deptID;
    private $deptName;
    private $deptDetail;
// Member Functions
// Constructor
    function __construct($deptID=NULL,$deptName=NULL,$deptDetail=NULL)
    {
        $this->setdeptID($deptID);
        $this->setdeptName($deptName);
        $this->setdeptDetail($deptDetail);
    }

//Setter
    function setdeptID($deptID){$this->deptID=$deptID;}
    function setdeptName($deptName){$this->deptName=$deptName;}
    function setdeptDetail($deptDetail){$this->deptDetail=$deptDetail;}
//Getter
    function getdeptID(){return $this->deptID;}
    function getdeptName(){return $this->deptName;}
    function getdeptDetail(){return $this->deptDetail;}
}
?>
