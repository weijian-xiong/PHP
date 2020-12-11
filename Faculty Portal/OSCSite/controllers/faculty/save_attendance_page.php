<?php

include_once 'model/Attendance.php';
include_once 'model/AttendanceRepository.php';
include_once 'model/Student.php';
include_once 'model/StudentRepository.php';

$weekNo = $_SESSION['weekNo'];
$action = filter_input(INPUT_POST, 'stu_att');
$attDB = new AttendanceRepository($db);
$studentDB = new StudentRepository($db);
$newAtten = "";

switch($action) {
    case 'update':
        $stuID = filter_input(INPUT_POST, 'studentID');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $attVal = filter_input(INPUT_POST, 'att_val');
        $att_insert = filter_input(INPUT_POST, 'att_insert');
        if(empty($attVal) || empty($firstName) || empty($lastName)){
            $error_msg = "Fields cannot be empty";
        } else {
       
            $student = new Student($stuID, $firstName, $lastName);
            $stu_status = $studentDB->updateStudent($student);
            
            $attendance = new Attendance($weekNo, $stuID, $attVal);
            if($att_insert) {
                $att_status = $attDB->addAttendance($attendance);
            } else {
                $att_status = $attDB->updateAttendance($attendance);
            }
        }
        break;
    case 'add':
        $newfirstName = filter_input(INPUT_POST, 'newfirstName');
        $newlastName = filter_input(INPUT_POST, 'newlastName');
        $newAtten = filter_input(INPUT_POST, 'new_att_val');

        if(empty($newAtten) || empty($newlastName) || empty($newfirstName)) {
            $error_msg = 'Fields cannot be empty for new Data';
        } else {
   
            $stu = new Student(null, $newfirstName,$newlastName);
           
            $stuID = $studentDB->addStudent($stu);
            
            if($stuID > 0) {
                $stu_status = "Student ID: $stuID added.";
                $att = new Attendance($weekNo, $stuID, $newAtten);
                $att_status = $attDB->addAttendance($att);

                $newfirstName = "";
                $newlastName = "";
                $newAtten = "";
            }
            
        }
        break;
    case 'delete':
        $stuID = filter_input(INPUT_POST, 'studentID');
        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $attVal = filter_input(INPUT_POST, 'att_val');
        $att_insert = filter_input(INPUT_POST, 'att_insert');
        $del_status = $attDB->deleteAttendanceByID($stuID);
        if($del_status > 0) {
            $att_status = "Student $stuID's attendance record is deleted.";
            $del_status = $studentDB->deleteStudent($stuID);
        }
        if ($del_status > 0) {
            $stu_status = "Student $stuID's record is deleted.";
        }
        break;
}

$attList = array();
$count = 0;
$studenList = $studentDB->getStudents();
$attendanceList = $attDB->getAttendanceByWeek($weekNo);
foreach($studenList as $stu) {
    $att = new Attendance($weekNo, $stu->studentID, "", $stu->firstName, $stu->lastName);

    foreach($attendanceList as $attendance) {
        if($attendance->studentID == $stu->studentID) {
            $att->setAtten($attendance->atten);
        }
    }
    $attList[$count++] = $att; 
}

$page->view = "views/attendance_page.php";
