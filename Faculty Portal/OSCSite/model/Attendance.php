<?php

Class Attendance {

    public $studentID;
    public $weekNo;
    public $atten;
    public $firstName;
    public $lastName;

    public function __construct($weekNo, $studentID, $atten, $fName = null, $lName = null) {
        $this->studentID = $studentID;
        $this->weekNo = $weekNo;
        $this->atten = $atten;
        $this->firstName = $fName;
        $this->lastName = $lName;
    }

    public function setAtten($attend) {
        $this->atten = $attend;
    }

}
