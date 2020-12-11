<?php

include_once 'model/Student.php';
include_once 'model/StudentRepository.php';
include_once 'model/Attendance.php';
include_once 'model/AttendanceRepository.php';

$studentDB = new StudentRepository($db);
$attDB = new AttendanceRepository($db);
$weekNo = $_SESSION['weekNo'];
$studenList = $studentDB->getStudents();
$attendanceList = $attDB->getAttendanceByWeek($weekNo);
$newattVal = "";
$attList = array();
$count = 0;

foreach ($studenList as $stu) {
    $att = new Attendance($weekNo, $stu->studentID, "", $stu->firstName, $stu->lastName);
    foreach ($attendanceList as $attendance) {
        if ($attendance->studentID == $stu->studentID) {
            $att->setAtten($attendance->atten);
        }
    }
    $attList[$count++] = $att;
}

$page->view = "views/attendance_page.php";
