<?php

class GroupsController extends BaseController {

  public function preExecute() {
    if ($this->getUser() == null) {
      echo "Please login first";
      exit;
    }
  }

  public function getIndex() {
    $long = $this->getParam('long');
    $lat = $this->getParam('lat');
    error_log('AYCARAMBA',$long,$lat);
    $data = array('long' => $long, 'lat' => $lat);
    return $this->renderView("groups/index", $data);
  }

  public function getNearby() {
    $long = $this->getParam('longitude');
    $lat = $this->getParam('latitude');
    $groups = GroupHelper::getNearbyGroups($this->conn, $long, $lat);

    echo json_encode($groups);
  }

  public function getCreate() {
    $user = $this->getUser();
    $long = $this->getParam('long');
    $lat = $this->getParam('lat');

    $id = GroupHelper::createGroup($this->conn, $user, $long, $lat);
    $_REQUEST['group_id'] = $id;

    execute_controller("groups","join");
  }

  public function getJoin() {
    $user = $this->getUser();
    $group_id = $this->getParam('group_id');
    if (empty($group_id)) {
      echo "bad stuff";
      exit;
    }
    GroupHelper::joinGroup($this->conn, $group_id, $user);
    execute_controller("groups","show");
  }

  public function getShow() {
    $group_id = $this->getParam('group_id');
    if (empty($group_id)) {
      echo "bad stuff";
      exit;
    }
    $group = GroupHelper::getGroup($this->conn, $group_id);
    $members = GroupHelper::getMembers($this->conn, $group_id);
    $data = array(
      "group" => $group,
      "members" => $members,
    );
    $this->renderView("groups/show", $data);
  }

  public function getGetmembers() {
    $group_id = $this->getParam('group_id');
    if (empty($group_id)) {
      echo "naughty stuff";
      exit;
    }
    $members = GroupHelper::getMembers($this->conn, $group_id);
    echo json_encode($members);
  }
}
