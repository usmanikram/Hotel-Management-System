<?php

class room
{
// Data Members
    private $roomID;
    private $roomDetails;
    private $roomType;
    private $roomStatus;
    private $roomImage;

//Member Functions
//Default Constructor
    function __construct($roomID=NULL,$roomDetails=NULL,$roomType=NULL,$roomStatus=NULL
    ,$roomImage=NULL)
    {
        $this->setroomID($roomID);
        $this->setroomDetails($roomDetails);
        $this->setroomType($roomType);
        $this->setroomStatus($roomStatus);
        $this->setroomImage($roomImage);

    }
//Setter
    function setroomID($roomID) {$this->roomID=$roomID;}
    function setroomDetails($roomDetails) {$this->roomDetails=$roomDetails;}
    function setroomType($roomType) {$this->roomType=$roomType;}
    function setroomStatus($roomStatus) {$this->roomStatus=$roomStatus;}
    function setroomImage($roomImage) {$this->roomImage=$roomImage;}
//Getter
    function getroomID() {return $this->roomID;}
    function getroomDetails() {return $this->roomDetails;}
    function getroomType() {return $this->roomType;}
    function getroomStatus() {return $this->roomStatus;}
    function getroomImage() {return $this->roomImage;}
}
?>
