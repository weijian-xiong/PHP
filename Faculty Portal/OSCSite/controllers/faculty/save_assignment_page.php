<?php

include_once 'model/Assignments.php';
include_once 'model/AssignmentRepository.php';

$weekNo = $_SESSION['weekNo'];
$assign_error = '';
$question = filter_input(INPUT_POST, 'question');
$total_marks = filter_input(INPUT_POST, 'marks', FILTER_VALIDATE_INT);
$due_date = filter_input(INPUT_POST, 'due_date');
$assign_exist = filter_input(INPUT_POST, 'assign_exist');

if (empty($question)) {
    $assign_error = 'Question cannot be empty, please enter.';
} else if (empty($total_marks)) {
    $assign_error = 'Marks cannot be empty, please enter.';
} else if ($total_marks <= 0) {
    $assign_error = 'Marks has to be greater than 0, please enter again.';
} else if (strtotime($due_date) === FALSE) {
    $assign_error = 'Incorrect date, please enter again.';
} else {
    list($year, $month, $day) = explode('-', $due_date);
    if (!checkdate($month, $day, $year)) {
        $assign_error = 'Incorrect date, please enter again.';
    }
}


if (empty($assign_error)) {
    $assignDB = new AssignmentRepository($db);
    $assignment = new Assignments($weekNo, $question, $total_marks, $due_date);
    if ($assign_exist) {
        $insertCount = $assignDB->updateAssignments($assignment);
    } else {
        $insertCount = $assignDB->addAssignments($assignment);
    }
    $assign_exist = TRUE;
}


$page->view = 'views/assignment_page.php';
