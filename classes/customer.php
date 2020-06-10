<?php

class customer
{
//Data Members
    private $custID;
    private $custName;
    private $custDOB;
    private $custGender;
    private $custCNIC;
    private $custContact;
    private $custAddress;
    private $custEmail;
    private $custPassword;
    private $custCCNO;
    private $custCCExpiry;
// Member Functions
// Default Parameterized Constructor
    function __construct($custID=NULL,$custName=NULL,$custDOB=NULL,$custGender=NULL,$custCNIC=NULL,
                         $custContact=NULL, $custAddress=NULL,$custEmail=NULL,$custPassword=NULL,
                         $custCCNO=NULL,$custCCExpiry=NULL)
    {
        $this->setcustID($custID);
        $this->setcustName($custName);
        $this->setcustDOB($custDOB);
        $this->setcustGender($custGender);
        $this->setcustCNIC($custCNIC);
        $this->setcustContact($custContact);
        $this->setcustAddress($custAddress);
        $this->setcustEmail($custEmail);
        $this->setcustPassword($custPassword);
        $this->setcustCCNO($custCCNO);
        $this->setcustCCExpiry($custCCExpiry);
    }
//Setter
    function setcustID($custID){$this->custID=$custID;}
    function setcustName($custName){$this->custName=$custName;}
    function setcustDOB($custDOB){$this->custDOB=$custDOB;}
    function setcustGender($custGender){$this->custGender=$custGender;}
    function setcustCNIC($custCNIC){$this->custCNIC=$custCNIC;}
    function setcustContact($custContact){$this->custContact=$custContact;}
    function setcustAddress($custAddress){$this->custAddress=$custAddress;}
    function setcustEmail($custEmail){$this->custEmail=$custEmail;}
    function setcustPassword($custPassword){$this->custPassword=$custPassword;}
    function setcustCCNO($custCCNO){$this->custCCNO=$custCCNO;}
    function setcustCCExpiry($custCCExpiry){$this->custCCExpiry=$custCCExpiry;}

//Getter
    function getcustID(){return $this->custID;}
    function getcustName(){return $this->custName;}
    function getcustDOB(){return $this->custDOB;}
    function getcustGender(){return $this->custGender;}
    function getcustCNIC(){return $this->custCNIC;}
    function getcustContact(){return $this->custContact;}
    function getcustAddress(){return $this->custAddress;}
    function getcustEmail(){return $this->custEmail;}
    function getcustPassword(){return $this->custPassword;}
    function getcustCCNO(){return $this->custCCNO;}
    function getcustCCExpiry(){return $this->custCCExpiry;}

}

?>
