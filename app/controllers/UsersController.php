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

    $_SESSION['my_id'] = UserHelper::createUser($this->conn, $name, "");
    $_SESSION['user_lat'] = $this->getParam("latitude", 0);
    $_SESSION['user_long'] = $this->getParam("longitude", 0);
    
    $this->redirect("groups/index");
  }

  public function getEdit() {
    $data = array("group_id" => $this->getParam('group_id'));
    $this->renderView("users/edit", $data);
  }

  public function getUpdate() {
    $id = $_SESSION['my_id'];
    $phone = $this->getParam('phone');
    $phone = str_replace("-", "", $phone);

    UserHelper::updateUser($this->conn, $id, $phone);

    execute_controller("groups", "show");
  }

  public function getLogout() {
    unset($_SESSION['my_id']);
    $this->redirect("");
  }
}
