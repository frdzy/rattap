<div id="public-index" data-role="page">
  <div data-role="header">
    <h1>ratTap</h1>
  </div>
  <div data-role="content">  
    <?php echo status_bar(); ?>
    <form action="/users/create" method="POST">
      <input type="text" id="name" name="name" class="defaultText" title="Your Name..." />
      <input type="hidden" name="latitude" class="latitude" value="0" />
      <input type="hidden" name="longitude" class="longitude" value="0" />
      <input type="submit" value="ratTap!" />
    </form>
  </div>
</div>

