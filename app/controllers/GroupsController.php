<?php

class GroupsController extends BaseController {

  public function preExecute() {
    if ($this->getUser() == null) {
      header( 'Location: /' ) ;
      exit;
    }
  }

  public function getIndex() {
    $long = 0.0 + $this->getParam('long', 0);
    $lat = 0.0 + $this->getParam('lat', 0);
    $data = array('long' => $long, 'lat' => $lat);
    return $this->renderView("groups/index", $data);
  }

  public function getNearby() {
    $long = 0.0 + $this->getParam('longitude', 0);
    $lat = 0.0 + $this->getParam('latitude', 0);
    $groups = GroupHelper::getNearbyGroups($this->conn, $long, $lat);

    echo json_encode($groups);
  }

  public function getCreate() {
    $user = $this->getUser();
    $long = 0.0 + $this->getParam('long', 0);
    $lat = 0.0 + $this->getParam('lat', 0);
    if (empty($long) || empty($lat) || !is_numeric($long) || !is_numeric($lat)) {
      $this->setStatus("Need a valid longitude and lattiude");
      $this->redirect("groups/index");
    }

    $id = GroupHelper::createGroup($this->conn, $user, $long, $lat);
    $_REQUEST['group_id'] = $id;

    execute_controller("groups","join");
    $this->redirect("groups/join?group_id=" . $id);
  }

  public function getJoin() {
    $user = $this->getUser();
    $group_id = $this->getParam('group_id');
    if (empty($group_id) || !is_numeric($group_id)) {
      $this->setStatus("Need a valid group ID");
      $this->redirect("groups/index");
    }
    if (!GroupHelper::didUserJoin($this->conn, $group_id, $user)) {
      GroupHelper::joinGroup($this->conn, $group_id, $user);
    }
    $this->redirect("groups/show?group_id=" . $group_id);
  }

  public function getShow() {
    $group_id = $this->getParam('group_id');
    if (empty($group_id) || !is_numeric($group_id)) {
      $this->setStatus("Need a valid group ID");
      $this->redirect("groups/index");
    }
    $group = GroupHelper::getGroup($this->conn, $group_id);
    if ($group == null) {
      error_404();
    }
    $members = GroupHelper::getMembers($this->conn, $group_id);
    $data = array(
      "group" => $group,
      "members" => $members,
    );
    $this->renderView("groups/show", $data);
  }

  public function getGetMembers() {
    $group_id = $this->getParam('group_id');
    if (empty($group_id) || !is_numeric($group_id)) {
      echo "Need valid Group ID";
      exit;
    }
    $members = GroupHelper::getMembers($this->conn, $group_id);
    echo json_encode($members);
  }
}
