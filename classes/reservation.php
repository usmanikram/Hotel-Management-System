<?php

class reservation
{
//Data Members
    private $resID;
    private $customerID;
    private $roomID;
    private $resStartDate;
    private $resEndDate;


// Member Functions
// Default Parameterized Constructor
    function __construct($resID=NULL,$customerID=NULL,$roomID=NULL,$resStartDate=NULL,$resEndDate=NULL)
    {
        $this->setresID($resID);
        $this->setcustomerID($customerID);
        $this->setroomID($roomID);
        $this->setresStartDate($resStartDate);
        $this->setresEndDate($resEndDate);
    }

//Setter
    function setresID($resID){$this->resID=$resID;}
    function setcustomerID($customerID){$this->customerID=$customerID;}
    function setroomID($roomID){$this->roomID=$roomID;}
    function setresStartDate($resStartDate){$this->resStartDate=$resStartDate;}
    function setresEndDate($resEndDate){$this->resEndDate=$resEndDate;}
//Getter
    function getresID(){return $this->resID;}
    function getcustomerID(){return $this->customerID;}
    function getroomID(){return $this->roomID;}
    function getresStartDate(){return $this->resStartDate;}
    function getresEndDate(){return $this->resEndDate;}

}
?>
