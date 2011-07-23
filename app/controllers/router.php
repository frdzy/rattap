<?php

$request = $_SERVER['QUERY_STRING'];
$parsed = explode('&', $request);
$page = array_shift($parsed);
$getVars = array();
foreach ($parsed as $argument) {
  list($variable, $value) = split('=', $argument);
  $getVars[$variable] = $value;
}

//this is a test , and we will be removing it later
error_log("The page your requested is ".$page);
error_log('<br/>');
$vars = print_r($getVars, TRUE);
error_log("The following GET vars were passed to the page:<pre>".$vars."</pre>");
