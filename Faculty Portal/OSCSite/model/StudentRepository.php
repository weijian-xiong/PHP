<?php

include_once 'model/Student.php';

Class StudentRepository {

    private $db;

    public function __construct($dbConnection) {

        $this->db = $dbConnection;
    }

    public function getStudents() {
        $studentList = array();
        $count = 0;
        $sql = "SELECT studentID, firstName, lastName FROM students";
        $students = $this->db->query($sql);
        $student = $students->fetch();
        while ($student) {
            $studentList[$count++] = new Student($student['studentID'], $student['firstName'], $student['lastName']);
            $student = $students->fetch();
        }

        return $studentList;
    }

    public function addStudent($stu) {
        $sql = "INSERT INTO students (firstName, lastName) VALUES ("
                . "'$stu->firstName', '$stu->lastName')";
        $this->db->exec($sql);
        $last_id = $this->db->lastInsertID();
        return $last_id;
    }

    public function updateStudent($stu) {
        $sql = "UPDATE students SET "
                . "firstName = '$stu->firstName'"
                . ", lastName = '$stu->lastName'"
                . "WHERE studentID = $stu->studentID";
        $updateCount = $this->db->exec($sql);
        if ($updateCount > 0) {
            return "Student for $stu->studentID is updated.";
        }
    }

    public function deleteStudent($studentID) {
        $sql = "DELETE FROM students WHERE studentID = $studentID";
        $deleteCount = $this->db->exec($sql);
        return $deleteCount;
    }

}


