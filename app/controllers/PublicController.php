<?php

class PublicController extends BaseController {
  public function getIndex() {
    if ($this->getUser() !== null) {
      $this->redirect("groups/index");
    }
    $this->renderView("public/index");
  }
}
