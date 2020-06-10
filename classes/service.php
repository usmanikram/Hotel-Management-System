<?php

class service
{
//Data Members
    private $serviceID;
    private $serviceName;
    private $serviceDetail;
    private $servicePrice;
// Member Functions
// Constructor
    function  __construct($serviceID=NULL,$serviceName=NULL,$serviceDetail=NULL,$servicePrice=NULL)
    {
        $this->setserviceID($serviceID);
        $this->setserviceName($serviceName);
        $this->setserviceDetail($serviceDetail);
        $this->setservicePrice($servicePrice);
    }

//Setter
    function setserviceID($serviceID){$this->serviceID=$serviceID;}
    function setserviceName($serviceName){$this->serviceName=$serviceName;}
    function setserviceDetail($serviceDetail){$this->serviceDetail=$serviceDetail;}
    function setservicePrice($servicePrice){$this->servicePrice=$servicePrice;}

//Getter
    function getserviceID(){return $this->serviceID;}
    function getserviceName(){return $this->serviceName;}
    function getserviceDetail(){return$this->serviceDetail;}
    function getservicePrice(){return$this->servicePrice;}
}
?>
