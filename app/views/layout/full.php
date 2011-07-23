<html>
  <head> 
    <title>ratTap - <?php echo $title ?></title> 
    <!-- jquery wooo yeah! -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.0b1/jquery.mobile-1.0b1.min.js"></script>
    <!-- our own brew -->
    <link rel="stylesheet" href="/stylesheets/rattap.css" />
    <script type="text/javascript" src="/javascript/rattap.js"></script>
  </head>
  <body>
    <div data-role="page">
      <div data-role="header">
        <h1>><?php echo $title ?></h1>
      </div>
      <div data-role="content">  
        <?php echo $content ?>
      </div>
    </div>
  </body>
</html>
