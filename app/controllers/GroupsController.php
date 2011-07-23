<?php

class GroupsController extends BaseController {
  public function getIndex() {
    $data = array();
    return $this->renderView("groups/index", $data);
  }

  public function getShow() {
    $data = array();
    return $this->renderView("groups/show", $data);
  }
}
