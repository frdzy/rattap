    <div data-role="page">
      <div data-role="header">
        <h1><?php echo $group['groupname'] ?></h1>
      </div>
      <div data-role="content">  
        <a href="/users/edit" data-rel="dialog">Edit Phone Number</a>
        <ul data-role="listview" data-inset="true" data-theme"c" data-divider-theme="b">
          <?php foreach ($members as $member) { ?>
<?php $phone = $member['password'];
$phone = (strpos($phone, "BLANK") !== false) ? "No number yet" : $phone;
?>
          <li><?php echo $member['username'] ?></li>
          <li><?php echo $phone ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
