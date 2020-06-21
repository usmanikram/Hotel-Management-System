<?php

class feedback
{
//Data Members
    private $fbID;
    private $fbDate;
    private $fbDetail;
    private $rating;
    private $custID;

// Member Functions
// Constructor
    function __construct($fbID=NULL,$fbDate=NULL,$fbType=NULL,$fbDetail=NULL,$rating=NULL,$custID=NULL)
    {
        $this->setfbID($fbID);
        $this->setfbDate($fbDate);
        $this->setfbDetail($fbDetail);
        $this->setrating($rating);
        $this->setcustID($custID);
    }
//Setter
    function setfbID($fbID){$this->fbID=$fbID;}
    function setfbDate($fbDate){$this->fbDate=$fbDate;}
    function setfbDetail($fbDetail){$this->fbDetail=$fbDetail;}
    function setrating($rating){$this->rating=$rating;}
    function setcustID($custID){$this->custID=$custID;}
//Getter
    function getfbID(){return $this->fbID;}
    function getfbDate(){return $this->fbDate;}
    function getfbDetail(){return $this->fbDetail;}
    function getrating(){return $this->rating;}
    function getcustID(){return $this->custID;}
}
?>
