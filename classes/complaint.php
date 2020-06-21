<?php

class complaint
{
//Data Members
    private $compID;
    private $compDate;
    private $compDetail;
    private $custID;
    private $remarks;
// Member Functions
// Constructor
    function __construct($compID=NULL,$compDate=NULL,$compDetail=NULL,$custID=NULL,$remarks=NULL)
    {
        $this->setcompID($compID);
        $this->setcompDate($compDate);
        $this->setcompDetails($compDetail);
        $this->setcustID($custID);
        $this->setremarks($remarks);
    }

//Setter
    function setcompID($compID){$this->compID=$compID;}
    function setcompDate($compDate){$this->compDate=$compDate;}
    function setcompDetails($compDetail){$this->compDetail=$compDetail;}
    function setcustID($custID){$this->custID=$custID;}
    function setremarks($remarks){$this->remarks=$remarks;}

//Getter
    function getcompID(){return $this->compID;}
    function getcompDate(){return $this->compDate;}
    function getcompDetail(){return $this->compDetail;}
    function getcustID(){return $this->custID;}
    function getremarks(){return $this->remarks;}
}

?>
