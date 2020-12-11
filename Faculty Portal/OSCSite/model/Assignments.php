<?php

Class Assignments {

    public $weekNo;
    public $question;
    public $total_mark;
    public $due_data;

    public function __construct($weekNo, $question, $total_mark, $due_data) {
        $this->weekNo = $weekNo;
        $this->question = $question;
        $this->total_mark = $total_mark;
        $this->due_data = $due_data;
    }

    public function setQuestion($ques) {
        $this->question = $ques;
    }

    public function setMarks($marks) {
        $this->total_mark = $marks;
    }

    public function setDate($duedate) {
        $this->due_data = $duedate;
    }

}
