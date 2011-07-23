<?php

class PublicController extends BaseController {
  public function getIndex() {
    if ($this->getUser() !== null) {
      execute_controller("groups", "index");
    }
    $this->renderView("public/index");
  }
}
