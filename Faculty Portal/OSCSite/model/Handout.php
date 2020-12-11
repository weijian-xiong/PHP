<?php

Class Handout {

    public $weekNo;
    public $content;

    public function __construct($weekNo, $content) {
        $this->weekNo = $weekNo;
        $this->content = $content;
    }

}
