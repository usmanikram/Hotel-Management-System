<?php

class bill
{
//Data Members
    private $billID;
    private $billDate;
    private $custID;
    private $resID;
    private $billAmount;
    private $billMethod;
    private $billRemarks;
// Member Functions
// Constructor
    function __construct($billID=NULL,$billDate=NULL,$custID=NULL,$resID=NULL,
                        $billAmount=NULL,$billMethod=NULL,$billRemarks=NULL)
    {
        $this->setbillID($billID);
        $this->setbillDate($billDate);
        $this->setcustID($custID);
        $this->setresID($resID);
        $this->setbillAmount($billAmount);
        $this->setbillMethod($billMethod);
        $this->setbillRemarks($billRemarks);
    }

//Setter
    function setbillID($billID){$this->billID=$billID;}
    function setbillDate($billDate){$this->billDate=$billDate;}
    function setcustID($custID){$this->custID=$custID;}
    function setresID($resID){$this->resID=$resID;}
    function setbillAmount($billAmount){$this->billAmount=$billAmount;}
    function setbillMethod($billMethod){$this->billMethod=$billMethod;}
    function setbillRemarks($billRemarks){$this->billRemarks=$billRemarks;}

//Getter
    function getbillID (){return $this->billID;}
    function getbillDate(){return $this->billDate;}
    function getcustID(){return $this->custID;}
    function getresID(){return $this->resID;}
    function getbillAmount(){return $this->billAmount;}
    function getbillMethod(){return $this->billMethod;}
    function getbillRemarks(){return $this->billRemarks;}
}
?>
