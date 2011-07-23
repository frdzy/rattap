<?php

class PublicController extends BaseController {
  public function getIndex() {
    $this->renderView("public/index");
  }
}
