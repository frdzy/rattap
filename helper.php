<?
require_once('user/lib/config.php');

echo DB_HOST;
echo DB_USER;
echo "<br>";
echo DB_PASS;
echo DB_NAME;

function create_user($username, $pass, $con){
	$sql = "insert into userauth(username, password, active,userlevel) values('$username', '$pass', 1, 3)";
        echo $sql;

        $res = asserted_query($sql, "user not created", $con);
}

function create_group($userid, $username, $long, $lat, $con){
	$sql = "insert into groups(groupcreatorid, groupname, longtitude, latitude) values($userid, '".mysql_real_escape_string($username."'s")."', ".$long.", ".$lat.")";
        echo $sql;

        $res = asserted_query($sql, "group not created", $con);
}

function add_assoc($userid, $groupid, $con){

        $sql = "insert into group_user_assoc(userid, groupid) values(".$userid.", ".$groupid.")";
        echo $sql;

        $res = asserted_query($sql, "group_assoc not created", $con);
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
