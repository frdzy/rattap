<?
	//echo "here1";
	require_once('user/lib/userauth.class.php');
	//echo "here2";
	require_once('helper.php');
	//echo "here3";
	$con = get_db();
	$user->is('ADMIN,USER');
	$userid = $user->getProperty('id');
	$user = $user->getProperty('user');

	if(
	!isset($_REQUEST['userid']) ||
	!isset($_REQUEST['groupid'])){
		die("enter userid groupid ");
	}
	add_assoc($_REQUEST['userid'], $_REQUEST['groupid'], $con);	

?>
