<?php
require_once('helper.php');
$con = get_db();

$arr = get_group_members_by_groupid(3, $con);

echo json_encode($arr);

?>
