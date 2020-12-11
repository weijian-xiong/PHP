<?php

include_once "model/Page.php";
include_once "db/db_connect.php";
$page = new Page();
$page->title = "Faculty Portal";
$page->header = 'Faculty Home Page';
$page->footer = '-----------------------------------------'
        . '------------------------------------------------'
        . '------------------------> Welcome to OSC site! <---------------'
        . '----------------------------------------------------'
        . '------------------------------------------------';

session_start();
$page->nav = 'views/nav.php';
include_once "controllers/faculty/index.php";
include_once "views/page.php";
