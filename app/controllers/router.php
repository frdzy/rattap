<?php

$request = $_SERVER['PATH_INFO'];
echo $request;
list($blank, $page, $func) = explode("/", $request);

switch ($page) {
  case 'users':
    require_once('app/controllers/users_controller.php');
    users_call($func);
    break;
  case 'public':
    require_once('app/controllers/public_controller.php');
    public_call($func);
    break;
  default:
    error_log("[CTRL] router.php: ". $page);
}
