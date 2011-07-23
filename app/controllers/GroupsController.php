<?php

class GroupsController extends BaseController {

  public function preExecute() {
    if ($this->getUser() == null) {
      echo "Please login first";
      exit;
    }
  }

  public function getIndex() {
    $data = array();
    return $this->renderView("groups/index", $data);
  }

  public function getNearby() {
    $long = $this->getParam('long');
    $lat = $this->getParam('lat');
    $groups = GroupHelper::getNearbyGroups($this->conn, $long, $lat);

    echo json_encode($groups);
  }

  public function getCreate() {
    $user = $this->getUser();
    $long = $this->getParam('long');
    $lat = $this->getParam('lat');

    $id = GroupHelper::createGroup($this->conn, $user, $long, $lat);
    echo json_encode(array("group_id" => $id));
  }

  public function getJoin() {
    $user = $this->getUser();
    $group_id = $this->getParam('group_id');
    if (empty($group_id)) {
      echo "bad stuff";
      exit;
    }
    GroupHelper::joinGroup($this->conn, $group_id, $user);
    return json_encode(array("success" => 1));
  }

  public function getShow() {
    $group_id = $this->getParam('group_id');
    if (empty($group_id)) {
      echo "bad stuff";
      exit;
    }
    $group = GroupHelper::getGroup($this->conn, $group_id);
    $data = array(
      "group" => $group,
    );
    $this->renderView("groups/show", $data);
  }
}
