<?php

class GroupHelper {
  public static function createGroup($conn, $user, $long, $lat) {
    $group_name = $user['username'] . "'s Group";
    $sql = "INSERT INTO groups(groupcreatorid, groupname, longtitude, latitude) values(?, ?, ?, ?)";
    $sth = $conn->prepare($sql);
    $sth->execute(array($user['id'], $group_name, $long, $lat));
  }

  public static function joinGroup($conn, $group_id, $user) {
    $sql = "INSERT INTO group_user_assoc(groupid, userid) values(?, ?)";
    $sth = $conn->prepare($sql);
    $sth->execute(array($group_id, $user['id']));
  }

  public static function getNearbyGroups($conn, $long, $lat) {
    $variance = 0.001;
    $sql = "SELECT * FROM groups WHERE longitude BETWEEN ? AND ? AND latitude BETWEEN ? AND ?";
    $sth = $conn->prepare($sql);
    $sth->execute(array($long - $variance, $long + $variance, $lat - $variance, $lat + $variance));
    return $sth->fetchAll();
  }
}