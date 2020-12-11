<?php

include_once 'model/Assignments.php';
include_once 'model/AssignmentRepository.php';

$weekNo = $_SESSION['weekNo'];
$assignmentDB = new AssignmentRepository($db);
$assignment = $assignmentDB->getAssignmentByWeek($weekNo);

if(empty($assignment)) {
    $assign_exist = FALSE;
} else {
    $assign_exist = TRUE;
}

$page->view = 'views/assignment_page.php';