<?php

class UserHelper {
  public static function getUser($conn, $user_id) {
    $sql = "SELECT * FROM userauth WHERE userid = ?";
    $sth = $conn->prepare($sql);
    $sth->execute(array($user_id));
    return $sth->fetch();
  }
}
