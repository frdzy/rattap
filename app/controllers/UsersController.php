<?php
class UsersController extends BaseController {
  public function getIndex() {
    echo "Hi there! - users/index";
  }

  public function getCreate() {
    $name = $this->getParam('name');

    if (empty($name)) {
      $this->setStatus("Please enter a name");
      $this->redirect("");
      exit;
    }

    if (strlen($name) > 30) {
      $this->setStatus("Please enter a shorter name");
      $this->redirect("");
      exit;
    }

    // Pre-validation
    $name = htmlspecialchars($name);

    $_SESSION['my_id'] = UserHelper::createUser($this->conn, $name, "");
    
    $this->redirect("groups/index");
  }

  public function getEdit() {
    $data = array("group_id" => htmlspecialchars($this->getParam('group_id')));
    $this->renderView("users/edit", $data);
  }

  public function getUpdate() {
    $id = $_SESSION['my_id'];
    $phone = $this->getParam('phone');
    $phone = htmlspecialchars($phone);
    $phone = str_replace("-", "", $phone);

    UserHelper::updateUser($this->conn, $id, $phone);

    execute_controller("groups", "show");
  }

  public function getLogout() {
    unset($_SESSION['my_id']);
    $this->redirect("");
  }
}
