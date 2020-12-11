<?php

$dsn = 'mysql:host=localhost:3308;dbname=osc_db';
$username = 'admin';
$password = 'pass@word';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
    include('db_error.php');
    exit();
}