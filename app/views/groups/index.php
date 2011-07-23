    <div data-role="page">
      <div data-role="header">
        <h1>ratTap</h1>
      </div>
      <div data-role="content">  
        <ul data-role="listview" data-inset="true" data-theme"c" data-divider-theme="b" id="nearbyGroupList">
        </ul>
        <form onSubmit="addCoord(); return true;" id="create" action="/groups/create" method="POST">
          <input type="hidden" name="lat" id="lat" />
          <input type="hidden" name="long" id="long" />
          <input type="submit" value="Create" id="rattapbutton" />
        </form>
        <script type="text/javascript">
          $(document).ready(function() {
            window.setTimeout("getNearbyGroups()", 2000);
          })
        </script>
      </div>
    </div>
