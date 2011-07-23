<?php

// Get controller and action
$request = trim($_SERVER['PATH_INFO'], '/');
$params = explode('/', $request);

if (count($params) == 0) {
  $params[0] = "public";
}
if (count($params) == 1) {
  $params[1] = "index";
}

$controller_name = $params[0];
$action_name = $params[1];

switch ($controller_name) {
  case 'groups':
    load_file('controllers/GroupsController.php');
    $controller = new UsersController();
    break;
  case 'users':
    load_file('controllers/UsersController.php');
    $controller = new UsersController();
    break;
  case 'public':
    load_file('controllers/PublicController.php');
    $controller = new PublicController();
    break;
  default:
    error_404();
}

$controller->execute($action_name);

