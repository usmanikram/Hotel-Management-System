<?php

class roomType
{
//Data Members
    private $rtypeID;
    private $rtypeName;
    private $rtypeDetails;
    private $rtypePrice;
    private $rtypeCapacity;

// Member Functions
//Constructor
    function __construct($rtypeID=NULL,$rtypeName=NULL,$rtypeDetails=NULL,$rtypePrice=NULL,$rtypeCapacity=NULL)
    {
        $this->setrtypeID($rtypeID);
        $this->setrtypeName($rtypeName);
        $this->setrtypeDetails($rtypeDetails);
        $this->setrtypePrice($rtypePrice);
        $this->setrtypeCapacity($rtypeCapacity);
    }
//Setter
    function setrtypeID($rtypeID){$this->rtypeID=$rtypeID;}
    function setrtypeName($rtypeName){$this->rtypeName=$rtypeName;}
    function setrtypeDetails($rtypeDetails){$this->rtypeDetails=$rtypeDetails;}
    function setrtypePrice($rtypePrice){$this->rtypePrice=$rtypePrice;}
    function setrtypeCapacity($rtypeCapacity){$this->rtypeCapacity=$rtypeCapacity;}
//Getters
    function getrtypeID(){return $this->rtypeID;}
    function getrtypeName(){return $this->rtypeName;}
    function getrtypeDetails(){return $this->rtypeDetails;}
    function getrtypePrice(){return $this->rtypePrice;}
    function getrtypeCapacity(){return $this->rtypeCapacity;}

}
?>
