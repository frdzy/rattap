<div id="groups-show" class="ui-page" data-role="page">
  <div data-role="header">
    <a href="/groups/index" rel="external" data-icon="grid">Show All</a>
    <h1><?php echo htmlspecialchars($group['groupname']) ?></h1>
  </div>
  <div data-role="content">
  <a href="/users/edit?group_id=<?php echo htmlspecialchars($group['groupid']) ?>" data-rel="dialog">Edit Your Phone Number</a>
 <ul data-inset="true" data-theme"c" data-divider-theme="b" class="groupMemberList"></ul>
    <script type="text/javascript">
      $(function() {
        groupsShowPage.groupId = <?php echo htmlspecialchars($group['groupid'])?>;
      });
    </script>
  </div>
</div>
