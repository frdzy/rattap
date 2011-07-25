<?php

// Contains base controller functions
abstract class BaseController {
  protected $conn;

  private $user = null;

  function preExecute() {
  }

  function getParam($name, $default = null) {
    if (isset($_REQUEST[$name])) {
      return $_REQUEST[$name];
    } else {
      return $default;
    }
  }

  function execute($action_name) {
    $this->conn = get_pdo_connection();
    $this->preExecute();
    $func_name = "get" . ucfirst($action_name);
    if (method_exists($this, $func_name)) {
      call_user_func(array($this, $func_name));
    } else {
      error_404();
    }
    $this->conn = null;
  }

  function getUser() {
    if (!$this->user) {
      if (!isset($_SESSION['my_id'])) {
        return null;
      }
      $id = $_SESSION['my_id'];

      // Load user
      $this->user = UserHelper::getUser($this->conn, $id);
    }
    return $this->user;
  }

  function setStatus($status) {
    $_SESSION['status'] = $status;
  }

  function redirect($url) {
    header('Location: /' . $url);
    exit;
  }

  function renderView($view_name, array $data = array()) {
    // Check if we're AJAX
    $view_path = APP_ROOT . "views/" . $view_name . ".php";
    // Extract variables in data
    extract($data, EXTR_SKIP);
    ob_start();
    require($view_path);
    $view_content = ob_get_contents();
    ob_end_clean();
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      echo $view_content;
    } else {
      global $content;
      $content = $view_content;
      require(APP_ROOT . "views/layout/layout.php");
    }
  }
}
