<?php

include_once 'model/Handout.php';
include_once 'model/HandoutRepository.php';

$weekNo = $_SESSION['weekNo'];
$handoutDB = new HandoutRepository($db);
$handout = $handoutDB->getHandoutByWeek($weekNo);
$handout_exist = False;

if (!empty($handout)) {
    $handout_exist = True;
}
$page->view = "views/handout_page.php";
