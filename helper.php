<?
require_once('user/lib/config.php');

function get_group_members_by_groupid($groupid, $con){
	$sql = "select DISTINCT(a.username), a.password from userauth as a join group_user_assoc as g on a.userid = g.userid where g.groupid = ".$groupid;
        $res = asserted_query($sql, "get_group_members_by_groupid failed.", $con);
	return mysql_fetch_array($res);
}

function get_group_members_by_groupname($groupname, $con = null){
	$sql = "select DISTINCT(a.username), a.password from userauth as a join group_user_assoc as g on a.userid = g.userid join groups g2 on g2.groupid = g.groupid where g2.groupname = '".$groupname."'";
        $res = asserted_query($sql, "get_group_members_by_groupname failed.", $con);
	return mysql_fetch_array($res);
}

function approve_user($userid, $con = null){
        $sql = "update group_user_assoc set approved = 1 where userid = $userid";
	echo $sql;

        $res = asserted_query($sql, "user not approved", $con);
	
}

function create_user($username, $pass, $con){
  	$con=get_db();
	$sql = "insert into userauth(username, password, active,userlevel) values('$username', '$pass', 1, 3)";

        return asserted_query($sql, "user not created", $con);
}

function create_group($userid, $username, $long, $lat, $con){
	$sql = "insert into groups(groupcreatorid, groupname, longtitude, latitude) values($userid, '".mysql_real_escape_string($username."'s")."', ".$long.", ".$lat.")";
        echo $sql;

        return asserted_query($sql, "group not created", $con);
}

function add_assoc($userid, $groupid, $con){

        $sql = "insert into group_user_assoc(userid, groupid) values(".$userid.", ".$groupid.")";
        echo $sql;

        return asserted_query($sql, "group_assoc not created", $con);
}

function get_db(){
	$db = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	if ( !$db ) {
		die("DB Connection Error: ". mysql_error());
	}
	$k = mysql_select_db(DB_NAME,$db);
	if(!$k){
		echo "selam:" . json_encode($k) . " but DB_NAME:" . DB_NAME;
	}
	return $db;
}

function asserted_query($query, $err, $con){
	$res = mysql_query($query, $con);
	if (!$res) {
		die("mysql query error! query:" . $query . " error:" . mysql_error() . " admin's note:" . $err . " at " . date("Y-m-d H:i:s"));
	}
	return $res;
}

//$con = get_db();
//$res = asserted_query("select * from userauth", "error happened.", $con);
//echo json_encode(mysql_fetch_array($res));

?>
