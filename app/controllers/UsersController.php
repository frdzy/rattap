<?php
require_once('user/lib/config.php');
require_once('helper.php');

class UsersController extends BaseController {
  public function getIndex() {
    echo "Hi there! - users/index";
  }

  public function getCreate() {
    $name = $this->getParam('name');
    $phone = $this->getParam('phone');
    $latitude = $this->getParam('latitude');
    $longitude = $this->getParam('longitude');

    $_SESSION['my_id'] = create_user($name, $phone);
    $_SESSION['my_name'] = $name;
    $_SESSION['my_phone'] = $phone;
    $_SESSION['my_latitude'] = $latitude;
    $_SESSION['my_longitude'] = $longitude;

    error_log('[USRSCTRL] creating user with name '.$name.
      ' and number '.$phone);

    // Returns true/false depending on success result
    echo json_encode($_SESSION['uid'] > 0);
  }
}
