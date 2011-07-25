<?php

function execute_controller($controller_name, $action_name) {
  switch ($controller_name) {
    case 'groups':
      load_file('controllers/GroupsController.php');
      $controller = new GroupsController();
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
}

// Get controller and action
if (isset($_SERVER['PATH_INFO'])) {
  $request = trim($_SERVER['PATH_INFO'], '/');
} else {
  $request = "";
}
$params = explode('/', $request);

if (count($params) == 0 || $params[0] == "") {
  $params[0] = "public";
}
if (count($params) == 1) {
  $params[1] = "index";
}

$controller_name = $params[0];
$action_name = $params[1];

execute_controller($controller_name, $action_name);
