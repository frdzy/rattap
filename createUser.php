<?
	//echo "here1";
	require_once('user/lib/userauth.class.php');
	//echo "here2";
	require_once('helper.php');
	//echo "here3";
	$con = get_db();

	if(
	!isset($_REQUEST['username']) ||
	!isset($_REQUEST['pass'])){
		die("enter username and pass ");
	}
	
	$username = $_REQUEST['username'];
	$pass  = $_REQUEST['pass'];
	create_user($username, $pass, $con);	

?>
