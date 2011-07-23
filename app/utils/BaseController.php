<?php

// Contains base controller functions
abstract class BaseController {
  function execute($action_name) {
    $func_name = "get" . ucfirst($action_name);
    if (method_exists($this, $func_name)) {
      call_user_func(array($this, $func_name));
    } else {
      error_404();
    }
  }
}
