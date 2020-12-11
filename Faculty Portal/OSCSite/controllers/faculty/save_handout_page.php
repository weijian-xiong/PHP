<?php

include_once 'model/Handout.php';
include_once 'model/HandoutRepository.php';

$weekNo = $_SESSION['weekNo'];
$handout_content = filter_input(INPUT_POST, 'handout_content');
$handout_exist = filter_input(INPUT_POST, 'handout_exist');
$handout_error = '';
if(empty($handout_content)) {
    $handout_error = 'Handout Content cannot be empty.!';
} else {
    
    $handoutDB = new HandoutRepository($db);
    $handout = new Handout($weekNo, $handout_content);
    if($handout_exist) {
        $insertCount = $handoutDB->update_handout($handout);
    } else {
        $insertCount = $handoutDB->add_handout($handout);
    }
    $handout_exist= TRUE;
}

$page->view = "views/handout_page.php";