<!DOCTYPE html> 
<?php

define('SERVER_ROOT', '/home/fred/web/');
define('SITE_ROOT', 'http://fred.rattap.com');

require_once(SERVER_ROOT . '/app/controllers/' . 'router.php');

/*
$url = $_SERVER('PATH_INFO');

switch($url) {
  case 'home':
    include 'app/controllers/Home.php';
    break;
  case 'groups':
    include 'app/controllers/Groups.php';
    break;
}
*/
?>

<html> 
	<head> 
	<title>Page Title</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.js"></script>
</head> 
<body> 

<div data-role="page">

	<div data-role="header">
		<h1>Page Title</h1>
	</div><!-- /header -->

	<div data-role="content">	
		<p>Page content goes here.</p>		
	</div><!-- /content -->

	<div data-role="footer">
		<h4>Page Footer</h4>
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>

