<?
	//echo "here1";
	require_once('user/lib/userauth.class.php');
	//echo "here2";
	require_once('helper.php');
	//echo "here3";
	$con = get_db();
	$user->is('ADMIN,USER');
	$userid = $user->getProperty('id');
	$username = $user->getProperty('user');

	if(
	!isset($_REQUEST['longtitude']) ||
	!isset($_REQUEST['latitude'])){
		die("enter long. lat. ");
	}
	
	$long = $_REQUEST['longtitude'];
	$lat  = $_REQUEST['latitude'];
	create_group($userid, $username, $long, $lat, $con)	

?>
