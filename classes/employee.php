<?php

class employee
{
//Data Members
    private $empID;
    private $empName;
    private $empDOB;
    private $empGender;
    private $empCNIC;
    private $empAddress;
    private $empDOJ;
    private $empDesignation;
    private $empSalary;
    private $empContact;
    private $empEmail;
    private $empPassword;
    private $edepartmentId;



// Member Functions
// Constructor
    function __construct($empID=NULL,$empName=NULL,$empDOB=NULL,$empGender=NULL,$empCNIC=NULL,$empAddress=NULL,$empDOJ=NULL,
                         $empDesignation=NULL, $empSalary=NULL,$empContact=NULL,
                        $empEmail=NULL,$empPassword=NULL,$edepartmentId=NULL)
    {
        $this->setempID($empID);
        $this->setempName($empName);
        $this->setempDOB($empDOB);
        $this->setempGender($empGender);
        $this->setempCNIC($empCNIC);
        $this->setempAddress($empAddress);
        $this->setempDOJ($empDOJ);
        $this->setempDesignation($empDesignation);
        $this->setempSalary($empSalary);
        $this->setempContact($empContact);
        $this->setempEmail($empEmail);
        $this->setempPassword($empPassword);
        $this->setedepartmentId($edepartmentId);

    }

//Setter
    function setempID($empID){$this->empID=$empID;}
    function setempName($empName){$this->empName=$empName;}
    function setempDOB($empDOB){$this->empDOB=$empDOB;}
    function setempGender($empGender){$this->empGender=$empGender;}
    function setempCNIC($empCNIC){$this->empCNIC=$empCNIC;}
    function setempAddress($empAddress){$this->empAddress=$empAddress;}
    function setempDOJ($empDOJ){$this->empDOJ=$empDOJ;}
    function setempDesignation($empDesignation){$this->empDesignation=$empDesignation;}
    function setempSalary($empSalary){$this->empSalary=$empSalary;}
    function setempContact($empContact){$this->empContact=$empContact;}
    function setempEmail($empEmail){$this->empEmail=$empEmail;}
    function setempPassword($empPassword){$this->empPassword=$empPassword;}
    function setedepartmentId($edepartmentId){$this->edepartmentId=$edepartmentId;}

//Getter
    function getempID(){return $this->empID;}
    function getempName(){return $this->empName;}
    function getempDOB(){return $this->empDOB;}
    function getempGender(){return $this->empGender;}
    function getempCNIC(){return $this->empCNIC;}
    function getempAddress(){return $this->empAddress;}
    function getempDOJ(){return $this->empDOJ;}
    function getempDesignation(){return $this->empDesignation;}
    function getempSalary(){return $this->empSalary;}
    function getempContact(){return $this->empContact;}
    function getempEmail(){return $this->empEmail;}
    function getempPassword(){return $this->empPassword;}
    function getedepartmentId(){return $this->edepartmentId;}

}

?>
