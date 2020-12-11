<?php

if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET') {
    $pages = filter_input(INPUT_GET, 'action');
} else {
    $pages = filter_input(INPUT_POST, 'action');
    $weekNo = filter_input(INPUT_POST, 'weekNo');
    $save_Attendance = filter_input(INPUT_POST, 'save_attendance');
}

if (empty($pages)) {
    $pages = 'show_faculty_home_page';
}

if (empty($weekNo)) {
    $weekNo = 1;
}
if (($pages == 'show_faculty_home_page') && (isset($_POST['submit_week']) || empty($_SESSION['weekNo']))) {
    $_SESSION['weekNo'] = $weekNo;
}

$page->nav = 'views/nav.php';
include_once "controllers/faculty/$pages.php";
