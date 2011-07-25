<div id="groups-index" class="ui-page" data-role="page">
  <div data-role="header">
    <a rel="external" href="/users/logout" data-icon="arrow-l">Log Out</a>
    <h1>ratTap</h1>
  </div>
  <div data-role="content">  
    <?php echo status_bar(); ?>
    <ul data-inset="true" data-theme"c" data-divider-theme="b" class="nearbyGroupList">
    </ul>
    <form id="create-group-form" action="/groups/create" method="POST">
      <input type="hidden" name="lat" class="latitude" />
      <input type="hidden" name="long" class="longitude" />
      <input type="submit" value="Create Group" id="rattapbutton" />
    </form>
  </div>
</div>
