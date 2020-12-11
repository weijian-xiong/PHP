<?php

include_once 'model/Attendance.php';

Class AttendanceRepository {

    private $db;

    public function __construct($dbConnection) {

        $this->db = $dbConnection;
    }

    public function getAttendanceByWeek($weekNo) {
        $attendanceList = array();
        $count = 0;
        $sql = "SELECT weekNo, studentID, atten FROM attendances WHERE weekNo =$weekNo ORDER BY studentID";
        $attendances = $this->db->query($sql);
        $attendance = $attendances->fetch();
        while ($attendance) {
            $attendanceList[$count++] = new Attendance($attendance['weekNo'], $attendance['studentID'], $attendance['atten']);
            $attendance = $attendances->fetch();
        }
        return $attendanceList;
    }

    public function addAttendance($attendance) {

        $sql = "INSERT INTO attendances (weekNo, studentID, atten) VALUES ("
                . "'$attendance->weekNo', "
                . "$attendance->studentID, "
                . "'$attendance->atten')";
        $insertCount = $this->db->exec($sql);
        if ($insertCount > 0) {
            return "Attendance for StudentID : $attendance->studentID is added.";
        }
    }

    public function updateAttendance($atten) {
        $sql = "UPDATE attendances SET "
                . "atten = '$atten->atten' "
                . "WHERE weekNo = $atten->weekNo AND studentID= $atten->studentID";
        $updateCount = $this->db->exec($sql);
        if ($updateCount > 0) {
            return "Attendance for Student: $atten->studentID and week: $atten->weekNo is updated.";
        }
    }

    public function deleteAttendanceByID($studentID) {
        $sql = "DELETE FROM attendances WHERE studentID = $studentID";

        $deleteCount = $this->db->exec($sql);
        return $deleteCount;
    }

}
?>

