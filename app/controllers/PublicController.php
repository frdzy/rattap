<?php

class PublicController extends BaseController {
  public function getIndex() {
    if ($this->getUser() !== null) {
      header( 'Location: /groups/index' ) ;
      die;
    }
    $this->renderView("public/index");
  }
}
