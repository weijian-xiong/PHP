<?php

Class Student {

    public $studentID;
    public $firstName;
    public $lastName;

    public function __construct($studentID = null, $firstName, $lastName) {
        $this->studentID = $studentID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

}
