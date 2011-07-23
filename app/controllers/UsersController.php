<?php
require_once('user/lib/config.php');
require_once('helper.php');

class UsersController extends BaseController {
  public function getIndex() {
    echo "Hi there! - users/index";
  }

  public function getCreate() {
    $name = $this->getParam('name');
    $phone = "BLANK_" . rand(0, 100000);

    if (empty($name)) {
      echo "Enter a name";
      exit;
    }

    $_SESSION['my_id'] = UserHelper::createUser($this->conn, $name, $phone);
    
    execute_controller("groups", "index");
  }

  public function getEdit() {
    $data = array("group_id" => $this->getParam('group_id'));
    $this->renderView("users/edit", $data);
  }

  public function getUpdate() {
    $id = $_SESSION['my_id'];
    $phone = $this->getParam('phone');

    UserHelper::updateUser($this->conn, $id, $phone);

    execute_controller("groups", "show");
  }
}
