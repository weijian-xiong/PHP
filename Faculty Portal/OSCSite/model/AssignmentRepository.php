<?php

include_once 'model/Assignments.php';

Class AssignmentRepository {

    private $db;

    public function __construct($dbConnection) {

        $this->db = $dbConnection;
    }

    public function getAssignmentByWeek($weekNo) {
        $sql = "SELECT * FROM assignments WHERE weekNo = $weekNo";
        $assignObj = $this->db->query($sql);
        $assignVal = $assignObj->fetch();
        if ($assignVal) {
            $assignment = new Assignments($weekNo, $assignVal['question'], $assignVal['total_marks'], $assignVal['due_date']);
            return $assignment;
        }
        return NULL;
    }

    public function addAssignments($assignment) {
        $sql = "INSERT INTO assignments (weekNo, question, total_marks, due_date) VALUES ("
                . "'$assignment->weekNo', "
                . "'$assignment->question', "
                . "'$assignment->total_mark', "
                . "'$assignment->due_data')";
        $insertCount = $this->db->exec($sql);
        if ($insertCount > 0) {
            return "Assignment for $assignment->weekNo was added.";
        } else {
            return "Assignment for $assignment->weekNo wasn't added.";
        }
    }

    public function updateAssignments($assign) {
        $sql = "UPDATE assignments SET "
                . "weekNo = '$assign->weekNo'"
                . ", question = '$assign->question'"
                . ", total_marks = '$assign->total_mark'"
                . ", due_date = '$assign->due_data' "
                . "WHERE weekNo = $assign->weekNo";
        $updateCount = $this->db->exec($sql);
        if ($updateCount > 0) {
            return "Assignment for $assign->weekNo was updated.";
        } else {
            return "Assignment for $assign->weekNo was not updated.";
        }
    }

}
