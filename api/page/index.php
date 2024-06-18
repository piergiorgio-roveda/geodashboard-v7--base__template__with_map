<?php

// session_start(); // Start the session to access session variables

// error_reporting(E_ALL);
// ini_set('display_errors', 'on');
// ini_set('memory_limit', '200M');

header('Content-type: application/json');

require('../../env.php');

// echo "APP_VERSION: ".APP_VERSION;

$postData = file_get_contents("php://input");
$ds = json_decode($postData,true);
$o = array();
// $ds['user_key'] = $_SESSION['secreteKey'];
header("Access-Control-Allow-Origin: *");

require(FLAT_FOLDER__API.'functions.php');
require('./'.$ds['name'].'.php');

$o = _init($ds);

echo (json_encode($o, JSON_PRETTY_PRINT));
exit;